/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'sk' ]: { dictionary, getPluralForm } } = {"sk":{"dictionary":{"image widget":"widget obrázka","Wrap text":"Obtekanie textu","Break text":"Zalomenie textu","In line":"V riadku","Side image":"Bočný obrázok","Full size image":"Obrázok v plnej veľkosti","Left aligned image":"Zarovnať vľavo","Centered image":"Zarovnať na stred","Right aligned image":"Zarovnať vpravo","Change image text alternative":"Zmeňte alternatívny text obrázka","Text alternative":"Alternatívny text","Enter image caption":"Vložte popis obrázka","Insert image":"Vložiť obrázok","Replace image":"Nahradiť obrázok","Upload from computer":"Nahrať z počítača","Replace from computer":"Nahradiť z počítača","Upload image from computer":"Nahrať obrázok z počítača","Image from computer":"Obrázok z počítača","From computer":"Z počítača","Replace image from computer":"Nahradiť obrázok z počítača","Upload failed":"Nahrávanie zlyhalo","You have no image upload permissions.":"Nemáte žiadne povolenia na nahrávanie obrázkov.","Image toolbar":"Panel nástrojov obrázka","Resize image":"Zmeniť veľkosť obrázka","Resize image to %0":"Zmeniť veľkosť na %0","Resize image to the original size":"Zmeniť veľkosť na pôvodnú","Resize image (in %0)":"Zmeniť veľkosť obrázka (v %0)","Original":"Originál","Custom image size":"Vlastná veľkosť obrázka","Custom":"Vlastné","Image resize list":"Zoznam možností zmeny veľkosti","Insert image via URL":"Vložiť obrázok pomocou URL","Insert via URL":"Vložiť cez URL","Image via URL":"Obrázok cez URL","Via URL":"Cez URL","Update image URL":"Aktualizovať URL obrázka","Caption for the image":"Popis k obrázku","Caption for image: %0":"Popis k obrázku: %0","The value must not be empty.":"Hodnota nesmie byť prázdna.","The value should be a plain number.":"Hodnota by mala byť obyčajné číslo.","Uploading image":"Nahrávanie obrázka","Image upload complete":"Nahrávanie obrázka bolo dokončené","Error during image upload":"Chyba pri nahrávaní obrázka","Image":"Obrázok"},getPluralForm(n){return (n % 1 == 0 && n == 1 ? 0 : n % 1 == 0 && n >= 2 && n <= 4 ? 1 : n % 1 != 0 ? 2: 3);}}};
e[ 'sk' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'sk' ].dictionary = Object.assign( e[ 'sk' ].dictionary, dictionary );
e[ 'sk' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );