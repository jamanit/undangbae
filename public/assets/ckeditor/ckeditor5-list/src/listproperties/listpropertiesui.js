/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
/**
 * @module list/listproperties/listpropertiesui
 */
import { icons, Plugin } from 'ckeditor5/src/core.js';
import { ButtonView, SplitButtonView, createDropdown, focusChildOnDropdownOpen, MenuBarMenuView } from 'ckeditor5/src/ui.js';
import ListPropertiesView from './ui/listpropertiesview.js';
import { getNormalizedConfig } from './utils/config.js';
import listStyleDiscIcon from '../../theme/icons/liststyledisc.svg';
import listStyleCircleIcon from '../../theme/icons/liststylecircle.svg';
import listStyleSquareIcon from '../../theme/icons/liststylesquare.svg';
import listStyleDecimalIcon from '../../theme/icons/liststyledecimal.svg';
import listStyleDecimalWithLeadingZeroIcon from '../../theme/icons/liststyledecimalleadingzero.svg';
import listStyleLowerRomanIcon from '../../theme/icons/liststylelowerroman.svg';
import listStyleUpperRomanIcon from '../../theme/icons/liststyleupperroman.svg';
import listStyleLowerLatinIcon from '../../theme/icons/liststylelowerlatin.svg';
import listStyleUpperLatinIcon from '../../theme/icons/liststyleupperlatin.svg';
import '../../theme/liststyles.css';
/**
 * The list properties UI plugin. It introduces the extended `'bulletedList'` and `'numberedList'` toolbar
 * buttons that allow users to control such aspects of list as the marker, start index or order.
 *
 * **Note**: Buttons introduced by this plugin override implementations from the {@link module:list/list/listui~ListUI}
 * (because they share the same names).
 */
export default class ListPropertiesUI extends Plugin {
    /**
     * @inheritDoc
     */
    static get pluginName() {
        return 'ListPropertiesUI';
    }
    init() {
        const editor = this.editor;
        const t = editor.locale.t;
        const propertiesConfig = editor.config.get('list.properties');
        const normalizedConfig = getNormalizedConfig(propertiesConfig);
        const stylesListTypes = normalizedConfig.styles.listTypes;
        // Note: When this plugin does not register the "bulletedList" dropdown due to properties configuration,
        // a simple button will be still registered under the same name by ListUI as a fallback. This should happen
        // in most editor configuration because the List plugin automatically requires ListUI.
        if (stylesListTypes.includes('bulleted')) {
            const styleDefinitions = [
                {
                    label: t('Toggle the disc list style'),
                    tooltip: t('Disc'),
                    type: 'disc',
                    icon: listStyleDiscIcon
                },
                {
                    label: t('Toggle the circle list style'),
                    tooltip: t('Circle'),
                    type: 'circle',
                    icon: listStyleCircleIcon
                },
                {
                    label: t('Toggle the square list style'),
                    tooltip: t('Square'),
                    type: 'square',
                    icon: listStyleSquareIcon
                }
            ];
            const buttonLabel = t('Bulleted List');
            const styleGridAriaLabel = t('Bulleted list styles toolbar');
            const commandName = 'bulletedList';
            editor.ui.componentFactory.add(commandName, getDropdownViewCreator({
                editor,
                normalizedConfig,
                parentCommandName: commandName,
                buttonLabel,
                buttonIcon: icons.bulletedList,
                styleGridAriaLabel,
                styleDefinitions
            }));
            // Add the menu bar item for bulleted list.
            editor.ui.componentFactory.add(`menuBar:${commandName}`, getMenuBarStylesMenuCreator({
                editor,
                normalizedConfig,
                parentCommandName: commandName,
                buttonLabel,
                styleGridAriaLabel,
                styleDefinitions
            }));
        }
        // Note: When this plugin does not register the "numberedList" dropdown due to properties configuration,
        // a simple button will be still registered under the same name by ListUI as a fallback. This should happen
        // in most editor configuration because the List plugin automatically requires ListUI.
        if (stylesListTypes.includes('numbered') || propertiesConfig.startIndex || propertiesConfig.reversed) {
            const styleDefinitions = [
                {
                    label: t('Toggle the decimal list style'),
                    tooltip: t('Decimal'),
                    type: 'decimal',
                    icon: listStyleDecimalIcon
                },
                {
                    label: t('Toggle the decimal with leading zero list style'),
                    tooltip: t('Decimal with leading zero'),
                    type: 'decimal-leading-zero',
                    icon: listStyleDecimalWithLeadingZeroIcon
                },
                {
                    label: t('Toggle the lower–roman list style'),
                    tooltip: t('Lower–roman'),
                    type: 'lower-roman',
                    icon: listStyleLowerRomanIcon
                },
                {
                    label: t('Toggle the upper–roman list style'),
                    tooltip: t('Upper-roman'),
                    type: 'upper-roman',
                    icon: listStyleUpperRomanIcon
                },
                {
                    label: t('Toggle the lower–latin list style'),
                    tooltip: t('Lower-latin'),
                    type: 'lower-latin',
                    icon: listStyleLowerLatinIcon
                },
                {
                    label: t('Toggle the upper–latin list style'),
                    tooltip: t('Upper-latin'),
                    type: 'upper-latin',
                    icon: listStyleUpperLatinIcon
                }
            ];
            const buttonLabel = t('Numbered List');
            const styleGridAriaLabel = t('Numbered list styles toolbar');
            const commandName = 'numberedList';
            editor.ui.componentFactory.add(commandName, getDropdownViewCreator({
                editor,
                normalizedConfig,
                parentCommandName: commandName,
                buttonLabel,
                buttonIcon: icons.numberedList,
                styleGridAriaLabel,
                styleDefinitions
            }));
            // Menu bar menu does not display list start index or reverse UI. If there are no styles enabled,
            // the menu makes no sense and should be omitted.
            if (stylesListTypes.includes('numbered')) {
                editor.ui.componentFactory.add(`menuBar:${commandName}`, getMenuBarStylesMenuCreator({
                    editor,
                    normalizedConfig,
                    parentCommandName: commandName,
                    buttonLabel,
                    styleGridAriaLabel,
                    styleDefinitions
                }));
            }
        }
    }
}
/**
 * A helper that returns a function that creates a split button with a toolbar in the dropdown,
 * which in turn contains buttons allowing users to change list styles in the context of the current selection.
 *
 * @param options.editor
 * @param options.normalizedConfig List properties configuration.
 * @param options.parentCommandName The name of the higher-order editor command associated with
 * the set of particular list styles (e.g. "bulletedList" for "disc", "circle", and "square" styles).
 * @param options.buttonLabel Label of the main part of the split button.
 * @param options.buttonIcon The SVG string of an icon for the main part of the split button.
 * @param options.styleGridAriaLabel The ARIA label for the styles grid in the split button dropdown.
 * @param options.styleDefinitions Definitions of the style buttons.
 * @returns A function that can be passed straight into {@link module:ui/componentfactory~ComponentFactory#add}.
 */
function getDropdownViewCreator({ editor, normalizedConfig, parentCommandName, buttonLabel, buttonIcon, styleGridAriaLabel, styleDefinitions }) {
    const parentCommand = editor.commands.get(parentCommandName);
    return (locale) => {
        const dropdownView = createDropdown(locale, SplitButtonView);
        const mainButtonView = dropdownView.buttonView;
        dropdownView.bind('isEnabled').to(parentCommand);
        dropdownView.class = 'ck-list-styles-dropdown';
        // Main button was clicked.
        mainButtonView.on('execute', () => {
            editor.execute(parentCommandName);
            editor.editing.view.focus();
        });
        mainButtonView.set({
            label: buttonLabel,
            icon: buttonIcon,
            tooltip: true,
            isToggleable: true
        });
        mainButtonView.bind('isOn').to(parentCommand, 'value', value => !!value);
        dropdownView.once('change:isOpen', () => {
            const listPropertiesView = createListPropertiesView({
                editor,
                normalizedConfig,
                dropdownView,
                parentCommandName,
                styleGridAriaLabel,
                styleDefinitions
            });
            dropdownView.panelView.children.add(listPropertiesView);
        });
        // Focus the editable after executing the command.
        // Overrides a default behaviour where the focus is moved to the dropdown button (#12125).
        dropdownView.on('execute', () => {
            editor.editing.view.focus();
        });
        return dropdownView;
    };
}
/**
 * A helper that returns a function (factory) that creates individual buttons used by users to change styles
 * of lists.
 *
 * @param options.editor
 * @param options.listStyleCommand The instance of the `ListStylesCommand` class.
 * @param options.parentCommandName The name of the higher-order command associated with a
 * particular list style (e.g. "bulletedList" is associated with "square" and "numberedList" is associated with "roman").
 * @returns A function that can be passed straight into {@link module:ui/componentfactory~ComponentFactory#add}.
 */
function getStyleButtonCreator({ editor, listStyleCommand, parentCommandName }) {
    const locale = editor.locale;
    const parentCommand = editor.commands.get(parentCommandName);
    return ({ label, type, icon, tooltip }) => {
        const button = new ButtonView(locale);
        button.set({ label, icon, tooltip });
        listStyleCommand.on('change:value', () => {
            button.isOn = listStyleCommand.value === type;
        });
        button.on('execute', () => {
            // If the content the selection is anchored to is a list, let's change its style.
            if (parentCommand.value) {
                // Remove the list when the current list style is the same as the one that would normally be applied.
                if (listStyleCommand.value === type) {
                    editor.execute(parentCommandName);
                }
                // If the current list style is not set in the model or the style is different than the
                // one to be applied, simply apply the new style.
                else if (listStyleCommand.value !== type) {
                    editor.execute('listStyle', { type });
                }
            }
            // Otherwise, leave the creation of the styled list to the `ListStyleCommand`.
            else {
                editor.model.change(() => {
                    editor.execute('listStyle', { type });
                });
            }
        });
        return button;
    };
}
/**
 * A helper that creates the properties view for the individual style dropdown.
 *
 * @param options.editor Editor instance.
 * @param options.normalizedConfig List properties configuration.
 * @param options.dropdownView Styles dropdown view that hosts the properties view.
 * @param options.parentCommandName The name of the higher-order editor command associated with
 * the set of particular list styles (e.g. "bulletedList" for "disc", "circle", and "square" styles).
 * @param options.styleDefinitions Definitions of the style buttons.
 * @param options.styleGridAriaLabel An assistive technologies label set on the grid of styles (if the grid is rendered).
 */
function createListPropertiesView({ editor, normalizedConfig, dropdownView, parentCommandName, styleDefinitions, styleGridAriaLabel }) {
    const locale = editor.locale;
    const enabledProperties = {
        ...normalizedConfig,
        ...(parentCommandName != 'numberedList' ? {
            startIndex: false,
            reversed: false
        } : null)
    };
    const listType = parentCommandName.replace('List', '');
    let styleButtonViews = null;
    if (normalizedConfig.styles.listTypes.includes(listType)) {
        const listStyleCommand = editor.commands.get('listStyle');
        const styleButtonCreator = getStyleButtonCreator({
            editor,
            parentCommandName,
            listStyleCommand
        });
        // The command can be ListStyleCommand or DocumentListStyleCommand.
        const isStyleTypeSupported = getStyleTypeSupportChecker(listStyleCommand);
        styleButtonViews = styleDefinitions.filter(isStyleTypeSupported).map(styleButtonCreator);
    }
    const listPropertiesView = new ListPropertiesView(locale, {
        styleGridAriaLabel,
        enabledProperties,
        styleButtonViews
    });
    if (normalizedConfig.styles.listTypes.includes(listType)) {
        // Accessibility: focus the first active style when opening the dropdown.
        focusChildOnDropdownOpen(dropdownView, () => {
            return listPropertiesView.stylesView.children.find((child) => child.isOn);
        });
    }
    if (enabledProperties.startIndex) {
        const listStartCommand = editor.commands.get('listStart');
        listPropertiesView.startIndexFieldView.bind('isEnabled').to(listStartCommand);
        listPropertiesView.startIndexFieldView.fieldView.bind('value').to(listStartCommand);
        listPropertiesView.on('listStart', (evt, data) => editor.execute('listStart', data));
    }
    if (enabledProperties.reversed) {
        const listReversedCommand = editor.commands.get('listReversed');
        listPropertiesView.reversedSwitchButtonView.bind('isEnabled').to(listReversedCommand);
        listPropertiesView.reversedSwitchButtonView.bind('isOn').to(listReversedCommand, 'value', value => !!value);
        listPropertiesView.on('listReversed', () => {
            const isReversed = listReversedCommand.value;
            editor.execute('listReversed', { reversed: !isReversed });
        });
    }
    // Make sure applying styles closes the dropdown.
    listPropertiesView.delegate('execute').to(dropdownView);
    return listPropertiesView;
}
/**
 * A helper that creates the list style submenu for menu bar.
 *
 * @param editor Editor instance.
 * @param normalizedConfig List properties configuration.
 * @param parentCommandName Name of the list command.
 * @param buttonLabel Label of the menu button.
 * @param styleGridAriaLabel ARIA label of the styles grid.
 */
function getMenuBarStylesMenuCreator({ editor, normalizedConfig, parentCommandName, buttonLabel, styleGridAriaLabel, styleDefinitions }) {
    return (locale) => {
        const menuView = new MenuBarMenuView(locale);
        const listCommand = editor.commands.get(parentCommandName);
        const listStyleCommand = editor.commands.get('listStyle');
        const isStyleTypeSupported = getStyleTypeSupportChecker(listStyleCommand);
        const styleButtonCreator = getStyleButtonCreator({
            editor,
            parentCommandName,
            listStyleCommand
        });
        const styleButtonViews = styleDefinitions.filter(isStyleTypeSupported).map(styleButtonCreator);
        const listPropertiesView = new ListPropertiesView(locale, {
            styleGridAriaLabel,
            enabledProperties: {
                ...normalizedConfig,
                // Disable list start index and reversed in the menu bar.
                startIndex: false,
                reversed: false
            },
            styleButtonViews
        });
        listPropertiesView.delegate('execute').to(menuView);
        menuView.buttonView.set({
            label: buttonLabel,
            icon: icons[parentCommandName]
        });
        menuView.panelView.children.add(listPropertiesView);
        menuView.bind('isEnabled').to(listCommand, 'isEnabled');
        menuView.on('execute', () => {
            editor.editing.view.focus();
        });
        return menuView;
    };
}
function getStyleTypeSupportChecker(listStyleCommand) {
    if (typeof listStyleCommand.isStyleTypeSupported == 'function') {
        return (styleDefinition) => listStyleCommand.isStyleTypeSupported(styleDefinition.type);
    }
    else {
        return () => true;
    }
}