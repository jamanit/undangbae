/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'nb' ]: { dictionary, getPluralForm } } = {"nb":{"dictionary":{"Undo":"Angre","Redo":"Gjør om"},getPluralForm(n){return (n != 1);}}};
e[ 'nb' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'nb' ].dictionary = Object.assign( e[ 'nb' ].dictionary, dictionary );
e[ 'nb' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );