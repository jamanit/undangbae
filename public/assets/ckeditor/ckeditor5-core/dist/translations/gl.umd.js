/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'gl' ]: { dictionary, getPluralForm } } = {"gl":{"dictionary":{"Cancel":"Cancelar","Clear":"Limpar","Remove color":"Retirar a cor","Restore default":"Restaurar valores predeterminados","Save":"Gardar","Show more items":"Amosar máis elementos","%0 of %1":"%0 de %1","Cannot upload file:":"Non é posíbel enviar o ficheiro:","Rich Text Editor. Editing area: %0":"Editor de texto mellorado. Área de edición: %0","Insert with file manager":"Inserir co xestor de ficheiros","Replace with file manager":"Substituír co xestor de ficheiros","Insert image with file manager":"Inserir imaxe co xestor de ficheiros","Replace image with file manager":"Substituír imaxe co xestor de ficheiros","File":"Ficheiro","With file manager":"Co xestor de ficheiros","Toggle caption off":"Desactivar os subtítulos","Toggle caption on":"Activar os subtítulos","Content editing keystrokes":"Teclas de atallo de edición de contido","These keyboard shortcuts allow for quick access to content editing features.":"Estes atallos de teclado permiten un acceso rápido ás funcións de edición de contido.","User interface and content navigation keystrokes":"Interface de usuario e teclas de atallo de navegación de contido","Use the following keystrokes for more efficient navigation in the CKEditor 5 user interface.":"Use as seguintes teclas de atallo para unha navegación máis eficiente na interface de usuario de CKEditor 5.","Close contextual balloons, dropdowns, and dialogs":"Pechar os bocadillos contextuais, menús despregábeis e diálogos","Open the accessibility help dialog":"Abrir o diálogo de axuda de accesibilidade","Move focus between form fields (inputs, buttons, etc.)":"Mover o foco entre os campos do formulario (entradas, botóns, etc.)","Move focus to the menu bar, navigate between menu bars":"Mover o foco á barra de menú, navegar entre as barras de menús","Move focus to the toolbar, navigate between toolbars":"Mover o foco á barra de ferramentas, navegar entre as barras de ferramentas","Navigate through the toolbar or menu bar":"Navegar pola barra de ferramentas ou barra de menú","Execute the currently focused button. Executing buttons that interact with the editor content moves the focus back to the content.":"Executar o botón enfocado actualmente. Ao executar botóns que interactúan co contido do editor, o foco volve ao contido.","Accept":"Aceptar"},getPluralForm(n){return (n != 1);}}};
e[ 'gl' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'gl' ].dictionary = Object.assign( e[ 'gl' ].dictionary, dictionary );
e[ 'gl' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );