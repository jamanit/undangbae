/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'ro' ]: { dictionary, getPluralForm } } = {"ro":{"dictionary":{"Special characters":"Caractere speciale","Category":"Categorie","All":"Toate","Arrows":"Săgeți","Currency":"Monedă","Latin":"Latină","Mathematical":"Matematic","Text":"Text","leftwards simple arrow":"săgeată simplă spre stânga","rightwards simple arrow":"săgeată simplă spre dreapta","upwards simple arrow":"săgeată simplă în sus","downwards simple arrow":"săgeată simplă în jos","leftwards double arrow":"săgeată dublă spre stânga","rightwards double arrow":"săgeată dublă spre dreapta","upwards double arrow":"săgeată dublă în sus","downwards double arrow":"săgeată dublă în jos","leftwards dashed arrow":"săgeată la stânga cu linie întreruptă","rightwards dashed arrow":"săgeată la dreapta cu linie întreruptă","upwards dashed arrow":"săgeată în sus cu linie întreruptă","downwards dashed arrow":"săgeată în jos cu linie întreruptă","leftwards arrow to bar":"săgeată la stânga spre bară","rightwards arrow to bar":"săgeată la dreapta spre bară","upwards arrow to bar":"săgeată în sus spre bară","downwards arrow to bar":"săgeată în jos spre bară","up down arrow with base":"săgeată în sus și în jos cu linie de bază","back with leftwards arrow above":"înapoi cu săgeată spre stânga deasupra","end with leftwards arrow above":"sfârșit cu săgeată spre stânga deasupra","on with exclamation mark with left right arrow above":"„on” cu semn de exclamare și săgeată spre stânga deasupra","soon with rightwards arrow above":"„soon” cu săgeată spre dreapta deasupra","top with upwards arrow above":"„top” cu săgeată în sus deasupra","Dollar sign":"Simbolul dolarului","Euro sign":"Simbolul euro","Yen sign":"Simbolul yenului","Pound sign":"Simbolul lirei sterline","Cent sign":"Simbolul pentru cent","Euro-currency sign":"Simbolul monedei euro","Colon sign":"Două puncte","Cruzeiro sign":"Simbolul pentru cruzeiro","French franc sign":"Simbolul pentru francul francez","Lira sign":"Simbolul pentru liră","Currency sign":"Simbolul pentru valută","Bitcoin sign":"Simbolul pentru Bitcoin","Mill sign":"Simbolul pentru mill","Naira sign":"Simbolul pentru naira","Peseta sign":"Simbolul pentru peseta","Rupee sign":"Simbolul pentru rupie","Won sign":"Simbolul pentru won","New sheqel sign":"Simbolul pentru shekelul nou","Dong sign":"Simbolul pentru dong","Kip sign":"Simbolul pentru kip","Tugrik sign":"Simbolul pentru tugrik","Drachma sign":"Simbolul pentru drahmă","German penny sign":"Simbolul pentru pfenigul german","Peso sign":"Simbolul pentru peso","Guarani sign":"Simbolul pentru guarani","Austral sign":"Simbolul pentru austral","Hryvnia sign":"Simbolul pentru grivnă (hrivnă)","Cedi sign":"Simbolul pentru cedi","Livre tournois sign":"Simbolul pentru livra tournois","Spesmilo sign":"Simbolul pentru spesmilo","Tenge sign":"Simbolul pentru tenge","Indian rupee sign":"Simbolul pentru rupia indiană","Turkish lira sign":"Simbolul pentru lira turcească","Nordic mark sign":"Simbolul pentru marca nordică","Manat sign":"Simbolul pentru manat","Ruble sign":"Simbolul pentru rublă","Latin capital letter a with macron":"Litera A majusculă cu macron","Latin small letter a with macron":"Litera A minusculă cu macron","Latin capital letter a with breve":"Litera A majusculă cu breve („căciulă”)","Latin small letter a with breve":"Litera A minusculă cu breve („căciulă”)","Latin capital letter a with ogonek":"Litera A majusculă cu codiță (ogonek)","Latin small letter a with ogonek":"Litera A minusculă cu codiță (ogonek)","Latin capital letter c with acute":"Litera C majusculă cu accent ascuțit","Latin small letter c with acute":"Litera C minusculă cu accent ascuțit","Latin capital letter c with circumflex":"Litera C majusculă cu accent circumflex","Latin small letter c with circumflex":"Litera C minusculă cu accent circumflex","Latin capital letter c with dot above":"Litera C majusculă cu punct deasupra","Latin small letter c with dot above":"Litera C minusculă cu punct deasupra","Latin capital letter c with caron":"Litera C majusculă cu caron (circumflex inversat)","Latin small letter c with caron":"Litera C minusculă cu caron (circumflex inversat)","Latin capital letter d with caron":"Litera D majusculă cu caron (circumflex inversat)","Latin small letter d with caron":"Litera D minusculă cu caron (circumflex inversat)","Latin capital letter d with stroke":"Litera D barată majusculă","Latin small letter d with stroke":"Litera D barată minusculă","Latin capital letter e with macron":"Litera E majusculă cu macron","Latin small letter e with macron":"Litera E minusculă cu macron","Latin capital letter e with breve":"Litera E majusculă cu breve („căciulă”)","Latin small letter e with breve":"Litera E minusculă cu breve („căciulă”)","Latin capital letter e with dot above":"Litera E majusculă cu punct deasupra","Latin small letter e with dot above":"Litera E minusculă cu punct deasupra","Latin capital letter e with ogonek":"Litera E majusculă cu ogonek („codiță”)","Latin small letter e with ogonek":"Litera E minusculă cu ogonek („codiță”)","Latin capital letter e with caron":"Litera E majusculă cu caron (circumflex inversat)","Latin small letter e with caron":"Litera E minusculă cu caron (circumflex inversat)","Latin capital letter g with circumflex":"Litera G majusculă cu accent circumflex","Latin small letter g with circumflex":"Litera G minusculă cu accent circumflex","Latin capital letter g with breve":"Litera G majusculă cu breve („căciulă”)","Latin small letter g with breve":"Litera G minusculă cu breve („căciulă”)","Latin capital letter g with dot above":"Litera G majusculă cu punct deasupra","Latin small letter g with dot above":"Litera G minusculă cu punct deasupra","Latin capital letter g with cedilla":"Litera G majusculă cu sedilă","Latin small letter g with cedilla":"Litera G minusculă cu sedilă","Latin capital letter h with circumflex":"Litera H majusculă cu accent circumflex","Latin small letter h with circumflex":"Litera H minusculă cu accent circumflex","Latin capital letter h with stroke":"Litera H barată majusculă","Latin small letter h with stroke":"Litera H barată minusculă","Latin capital letter i with tilde":"Litera I majusculă cu tildă","Latin small letter i with tilde":"Litera I minusculă cu tildă","Latin capital letter i with macron":"Litera I majusculă cu macron","Latin small letter i with macron":"Litera I minusculă cu macron","Latin capital letter i with breve":"Litera I majusculă cu breve („căciulă”)","Latin small letter i with breve":"Litera I minusculă cu breve („căciulă”)","Latin capital letter i with ogonek":"Litera I majusculă cu ogonek („codiță”)","Latin small letter i with ogonek":"Litera I minusculă cu ogonek („codiță”)","Latin capital letter i with dot above":"Litera I majusculă cu punct deasupra","Latin small letter dotless i":"Litera I minusculă fără punct","Latin capital ligature ij":"Ligatură formată din literele majuscule IJ","Latin small ligature ij":"Ligatură formată din literele minuscule IJ","Latin capital letter j with circumflex":"Litera J majusculă cu accent circumflex","Latin small letter j with circumflex":"Litera J minusculă cu accent circumflex","Latin capital letter k with cedilla":"Litera K majusculă cu sedilă","Latin small letter k with cedilla":"Litera K minusculă cu sedilă","Latin small letter kra":"Litera KRA minusculă","Latin capital letter l with acute":"Litera L majusculă cu accent ascuțit","Latin small letter l with acute":"Litera L minusculă cu accent ascuțit","Latin capital letter l with cedilla":"Litera L majusculă cu sedilă","Latin small letter l with cedilla":"Litera L minusculă cu sedilă","Latin capital letter l with caron":"Litera L majusculă cu caron (circumflex inversat)","Latin small letter l with caron":"Litera L minusculă cu caron (circumflex inversat)","Latin capital letter l with middle dot":"Litera L majusculă cu punct median","Latin small letter l with middle dot":"Litera L minusculă cu punct median","Latin capital letter l with stroke":"Litera L majusculă cu bară oblică","Latin small letter l with stroke":"Litera L minusculă cu bară oblică","Latin capital letter n with acute":"Litera N majusculă cu accent ascuțit","Latin small letter n with acute":"Litera N minusculă cu accent ascuțit","Latin capital letter n with cedilla":"Litera N majusculă cu sedilă","Latin small letter n with cedilla":"Litera N minusculă cu sedilă","Latin capital letter n with caron":"Litera N majusculă cu caron (circumflex inversat)","Latin small letter n with caron":"Litera N minusculă cu caron (circumflex inversat)","Latin small letter n preceded by apostrophe":"Litera N minusculă cu apostrof în față","Latin capital letter eng":"Litera ENG majusculă","Latin small letter eng":"Litera ENG minusculă","Latin capital letter o with macron":"Litera O majusculă cu macron","Latin small letter o with macron":"Litera O minusculă cu macron","Latin capital letter o with breve":"Litera O majusculă cu breve („căciulă”)","Latin small letter o with breve":"Litera O minusculă cu breve („căciulă”)","Latin capital letter o with double acute":"Litera O majusculă cu dublu accent ascuțit","Latin small letter o with double acute":"Litera O minusculă cu dublu accent ascuțit","Latin capital ligature oe":"Ligatură formată din literele OE majuscule","Latin small ligature oe":"Ligatură formată din literele OE minuscule","Latin capital letter r with acute":"Litera R majusculă cu accent ascuțit","Latin small letter r with acute":"Litera R minusculă cu accent ascuțit","Latin capital letter r with cedilla":"Litera R majusculă cu sedilă","Latin small letter r with cedilla":"Litera R minusculă cu sedilă","Latin capital letter r with caron":"Litera R majusculă cu caron (circumflex inversat)","Latin small letter r with caron":"Litera R minusculă cu caron (circumflex inversat)","Latin capital letter s with acute":"Litera S majusculă cu accent ascuțit","Latin small letter s with acute":"Litera S minusculă cu accent ascuțit","Latin capital letter s with circumflex":"Litera S majusculă cu accent circumflex","Latin small letter s with circumflex":"Litera S minusculă cu accent circumflex","Latin capital letter s with cedilla":"Litera S majusculă cu sedilă","Latin small letter s with cedilla":"Litera S minusculă cu sedilă","Latin capital letter s with caron":"Litera S majusculă cu caron (circumflex inversat)","Latin small letter s with caron":"Litera S minusculă cu caron (circumflex inversat)","Latin capital letter t with cedilla":"Litera T majusculă cu sedilă","Latin small letter t with cedilla":"Litera T minusculă cu sedilă","Latin capital letter t with caron":"Litera T majusculă cu caron (circumflex inversat)","Latin small letter t with caron":"Litera T minusculă cu caron (circumflex inversat)","Latin capital letter t with stroke":"Litera T majusculă barată","Latin small letter t with stroke":"Litera T minusculă barată","Latin capital letter u with tilde":"Litera U majusculă cu tildă","Latin small letter u with tilde":"Litera U minusculă cu tildă","Latin capital letter u with macron":"Litera U majusculă cu macron","Latin small letter u with macron":"Litera U minusculă cu macron","Latin capital letter u with breve":"Litera U majusculă cu breve („căciulă”)","Latin small letter u with breve":"Litera U minusculă cu breve („căciulă”)","Latin capital letter u with ring above":"Litera majusculă U cu inel deasupra","Latin small letter u with ring above":"Litera minusculă U cu inel deasupra","Latin capital letter u with double acute":"Litera U majusculă cu dublu accent ascuțit","Latin small letter u with double acute":"Litera U minusculă cu dublu accent ascuțit","Latin capital letter u with ogonek":"Litera U majusculă cu ogonek („codiță”)","Latin small letter u with ogonek":"Litera U minusculă cu ogonek („codiță”)","Latin capital letter w with circumflex":"Litera W majusculă cu accent circumflex","Latin small letter w with circumflex":"Litera W minusculă cu accent circumflex","Latin capital letter y with circumflex":"Litera Y majusculă cu accent circumflex","Latin small letter y with circumflex":"Litera Y minusculă cu accent circumflex","Latin capital letter y with diaeresis":"Litera Y majusculă cu tremă","Latin capital letter z with acute":"Litera Z majusculă cu accent ascuțit","Latin small letter z with acute":"Litera Z minusculă cu accent ascuțit","Latin capital letter z with dot above":"Litera Z majusculă cu punct deasupra","Latin small letter z with dot above":"Litera Z minusculă cu punct deasupra","Latin capital letter z with caron":"Litera Z majusculă cu caron (circumflex inversat)","Latin small letter z with caron":"Litera Z minusculă cu caron (circumflex inversat)","Latin small letter long s":"Litera S lungă minusculă","Less-than sign":"Simbolul „mai mic decât”","Greater-than sign":"Simbolul „mai mare decât”","Less-than or equal to":"Simbolul „mai mic sau egal”","Greater-than or equal to":"Simbolul „mai mare sau egal”","En dash":"Linie de pauză (en dash)","Em dash":"Linie de dialog (em dash)","Macron":"Macron","Overline":"Linie deasupra","Degree sign":"Simbolul pentru grad","Minus sign":"Semnul minus","Plus-minus sign":"Semnul plus/minus","Division sign":"Semnul împărțirii","Fraction slash":"Bară de fracție (oblică)","Multiplication sign":"Semnul înmulțirii","Latin small letter f with hook":"Litera F minusculă cu cârlig","Integral":"Integrală","N-ary summation":"Sumă (simbol matematic)","Infinity":"Infinit","Square root":"Rădăcină pătrată","Tilde operator":"Operatorul tildă","Approximately equal to":"Aproximativ egal cu","Almost equal to":"Aproape egal cu","Not equal to":"Diferit de (nu este egal cu)","Identical to":"Identic cu","Element of":"Element al","Not an element of":"Nu este un element al","Contains as member":"Conține ca membru","N-ary product":"Produs cartezian (simbol matematic)","Logical and":"ȘI logic","Logical or":"SAU logic","Not sign":"Negare","Intersection":"Intersecție","Union":"Uniune","Partial differential":"Diferențială parțială","For all":"Pentru toți","There exists":"Există","Empty set":"Mulțimea vidă","Nabla":"Nabla","Asterisk operator":"Operatorul asterisc","Proportional to":"Proporțional cu","Angle":"Unghi","Vulgar fraction one quarter":"Un sfert (fracție în scrierea comună)","Vulgar fraction one half":"Jumătate (fracție în scrierea comună)","Vulgar fraction three quarters":"Trei sferturi (fracție în scrierea comună)","Single left-pointing angle quotation mark":"Ghilimele unghiulare simple cu vârful spre stânga","Single right-pointing angle quotation mark":"Ghilimele unghiulare simple cu vârful spre dreapta","Left-pointing double angle quotation mark":"Ghilimele unghiulare cu vârful spre stânga","Right-pointing double angle quotation mark":"Ghilimele unghiulare cu vârful spre dreapta","Left single quotation mark":"Semnul citării simplu stânga (în formă de 6)","Right single quotation mark":"Semnul citării simplu dreapta (în formă de 9)","Left double quotation mark":"Ghilimele sus în formă de 66","Right double quotation mark":"Ghilimele sus în formă de 99","Single low-9 quotation mark":"Ghilimele simple jos în formă de 9","Double low-9 quotation mark":"Ghilimele jos în formă de 99","Inverted exclamation mark":"Semnul exclamării inversat","Inverted question mark":"Semnul întrebării inversat","Two dot leader":"Două puncte orizontale pe linia de bază","Horizontal ellipsis":"Puncte de suspensie","Double dagger":"Dublă obelă (dagger)","Per mille sign":"Promilă","Per ten thousand sign":"La zece mii","Double exclamation mark":"Semnul exclamării dublu","Question exclamation mark":"Semnele întrebării și exclamării","Exclamation question mark":"Semnele exclamării și întrebării","Double question mark":"Doublu semnul întrebării","Copyright sign":"Simbolul pentru copyright","Registered sign":"Simbolul de marcă înregistrată","Trade mark sign":"Simbolul de marcă comercială","Section sign":"Simbolul pentru secțiune","Paragraph sign":"Simbolul pentru paragraf","Reversed paragraph sign":"Simbolul pentru paragraf, inversat"},getPluralForm(n){return (n==1?0:(((n%100>19)||((n%100==0)&&(n!=0)))?2:1));}}};
e[ 'ro' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'ro' ].dictionary = Object.assign( e[ 'ro' ].dictionary, dictionary );
e[ 'ro' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );