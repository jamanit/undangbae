/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'da' ]: { dictionary, getPluralForm } } = {"da":{"dictionary":{"Open file manager":"Open filhåndtering","Cannot determine a category for the uploaded file.":"Kan ikke bestemme en kategori for den uploadede fil.","Cannot access default workspace.":"Kan ikke opnå adgang til standard arbejdsområde.","You have no image editing permissions.":"Du har ikke tilladelser til at redigere billeder.","Edit image":"Rediger billede","Processing the edited image.":"Behandler det redigerede billede.","Server failed to process the image.":"Det lykkedes ikke for serveren at behandle billedet.","Failed to determine category of edited image.":"Det lykkedes ikke at bestemme kategorien for det redigerede billede."},getPluralForm(n){return (n != 1);}}};
e[ 'da' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'da' ].dictionary = Object.assign( e[ 'da' ].dictionary, dictionary );
e[ 'da' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );