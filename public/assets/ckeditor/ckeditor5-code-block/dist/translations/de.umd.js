/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'de' ]: { dictionary, getPluralForm } } = {"de":{"dictionary":{"Insert code block":"Code-Block einfügen","Plain text":"Nur Text","Leaving %0 code snippet":"%0 Code-Ausschnitt verlassen","Entering %0 code snippet":"%0 Code-Ausschnitt eingeben","Entering code snippet":"Code-Ausschnit eingeben","Leaving code snippet":"Code-Ausschnit verlassen","Code block":"Codeblock"},getPluralForm(n){return (n != 1);}}};
e[ 'de' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'de' ].dictionary = Object.assign( e[ 'de' ].dictionary, dictionary );
e[ 'de' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );