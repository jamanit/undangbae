/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
/**
 * @module editor-balloon/ballooneditoruiview
 */
import { EditorUIView, InlineEditableUIView, MenuBarView } from 'ckeditor5/src/ui.js';
/**
 * Contextual editor UI view. Uses the {@link module:ui/editableui/inline/inlineeditableuiview~InlineEditableUIView}.
 */
export default class BalloonEditorUIView extends EditorUIView {
    /**
     * Creates an instance of the balloon editor UI view.
     *
     * @param locale The {@link module:core/editor/editor~Editor#locale} instance.
     * @param editingView The editing view instance this view is related to.
     * @param editableElement The editable element. If not specified, it will be automatically created by
     * {@link module:ui/editableui/editableuiview~EditableUIView}. Otherwise, the given element will be used.
     * @param label When set, this value will be used as an accessible `aria-label` of the
     * {@link module:ui/editableui/editableuiview~EditableUIView editable view}.
     */
    constructor(locale, editingView, editableElement, label) {
        super(locale);
        this.editable = new InlineEditableUIView(locale, editingView, editableElement, {
            label
        });
        this.menuBarView = new MenuBarView(locale);
        this.menuBarView.extendTemplate({
            attributes: {
                class: [
                    'ck-reset_all',
                    'ck-rounded-corners'
                ],
                dir: locale.uiLanguageDirection
            }
        });
    }
    /**
     * @inheritDoc
     */
    render() {
        super.render();
        this.registerChild(this.editable);
        this.registerChild(this.menuBarView);
    }
}