/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'de' ]: { dictionary, getPluralForm } } = {"de":{"dictionary":{"Rich Text Editor":"Rich Text Editor","Edit block":"Absatz bearbeiten","Click to edit block":"Zum Bearbeiten des Blocks klicken","Drag to move":"Zum Verschieben ziehen","Next":"Nächste","Previous":"vorherige","Editor toolbar":"Editor Werkzeugleiste","Dropdown toolbar":"Dropdown-Liste Werkzeugleiste","Dropdown menu":"Dropdown-Menü","Black":"Schwarz","Dim grey":"Dunkelgrau","Grey":"Grau","Light grey":"Hellgrau","White":"Weiß","Red":"Rot","Orange":"Orange","Yellow":"Gelb","Light green":"Hellgrün","Green":"Grün","Aquamarine":"Aquamarinblau","Turquoise":"Türkis","Light blue":"Hellblau","Blue":"Blau","Purple":"Violett","Editor block content toolbar":"Editor Blockinhalt-Toolbar","Editor contextual toolbar":"Editor kontextuelle Toolbar","HEX":"HEX","No results found":"Keine Ergebnisse gefunden","No searchable items":"Keine durchsuchbaren Elemente","Editor dialog":"Editor-Dialog","Close":"Schließen","Help Contents. To close this dialog press ESC.":"Hilfe zum Inhalt. Drücken Sie die Esc-Taste, um dieses Dialogfenster zu schließen.","Below, you can find a list of keyboard shortcuts that can be used in the editor.":"Unten finden Sie eine Liste mit Tastenkombinationen, die im Editor benutzt werden können.","(may require <kbd>Fn</kbd>)":"(erfordert gegebenenfalls <kbd>Fn</kbd>)","Accessibility":"Bedienungshilfen","Accessibility help":"Hilfe zur Eingabe","Press %0 for help.":"Drücken Sie %0 für Hilfe.","Move focus in and out of an active dialog window":"Fokus auf ein aktives Dialogfenster richten oder aufheben","MENU_BAR_MENU_FILE":"Datei","MENU_BAR_MENU_EDIT":"Bearbeiten","MENU_BAR_MENU_VIEW":"Anzeigen","MENU_BAR_MENU_INSERT":"Einfügen","MENU_BAR_MENU_FORMAT":"Format","MENU_BAR_MENU_TOOLS":"Werkzeuge","MENU_BAR_MENU_HELP":"Hilfe","MENU_BAR_MENU_TEXT":"Text","MENU_BAR_MENU_FONT":"Schriftart","Editor menu bar":"Menüleiste des Editors","Please enter a valid color (e.g. \"ff0000\").":"Bitte geben Sie eine gültige Farbe ein (z. B. „ff0000“)."},getPluralForm(n){return (n != 1);}}};
e[ 'de' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'de' ].dictionary = Object.assign( e[ 'de' ].dictionary, dictionary );
e[ 'de' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );