<?php
// Auteur: ABD ESSAMAD CHADLI
// Objectif: Exos de base (variables, types, chaines)
// Date : 18/10/2026

require 'config.php'; 

echo "<h2>Exercice 1.1</h2>";
/* 
   Justif des varS:
   $x : valide
   $_x : valide (commence par underscore)
   $2x : non valide car commence par 1 chiffre
   $x-y : non, le "-" n est pas autorise dans les noms de vars
   $Prix_HT : valide (majuscules et _ autorisés)
   $prix ht : non, ya un espace
   $état : valide (les accents sont autorises)
*/
$x = 1; 
$_x = 2; 
$Prix_HT = 3; 
$état = 4; 

$a = "test1";
$A = "test2";
echo "\$a = $a et \$A = $A, ca montre que c est 2 variables differentes (sensible a la casse)<br>";

echo "<h2>Exercice 1.2</h2>";
echo "Etablissement : " . ETABLISSEMENT . "<br>";
echo "Notes : min=" . NOTE_MIN . ", max=" . NOTE_MAX . " et seuil=" . SEUIL . "<br>";
echo "test SEUIL : " . defined('SEUIL') . "<br>"; // affiche 1
// comme ca l affichage de INCONNUE soit plus clair :
echo "test INCONNUE : " . (defined('INCONNUE') ? 'oui' : 'non') . "<br>"; 

/* 
   Reponses aux qsts:
   - si on affiche une constante pas definie, php declenche une erreur.
   - diff entre les 2 : const s utilise a la racine et define() est une fct qu on peut mettre n importe ou
*/

echo "<h2>Exercice 1.3</h2>";
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + ($prix_ht * ($tva/100)); 
echo "Le prix TTC du produit est de $prix_ttc €.<br>";

echo "<h2>Exercice 1.4</h2>";
$test = 42;
$test = (string)$test;
var_dump($test); echo "<br>";

// la tous va donner false sauf "abc" qui va donner true.
var_dump((bool) 0, (bool) 0.0, (bool) "0", (bool) "", (bool) "abc", (bool) [], (bool) null);
echo "<br>";

// ici 3 (int), 12 (int), 1500 (float), 1 (int)
var_dump((int) 3.9, (int) "12abc", (float) "1.5e3", (int) true);
echo "<br>";

// le nbr 255 de plusieurs facons
$dec = 255;
$hex = 0xFF;
$oct = 0377;
$bin = 0b11111111;
echo "255 -> base10: $dec, base16: $hex, base8: $oct, base2: $bin <br>";

echo "<h2>Exercice 1.5</h2>";
$traitees = "égales à";
$ici = 2;

echo '1. Ahmed a dit : "J\'ai réussi"<br>';
echo "2. Voulez-vous supprimer C:\\*.*?<br>";
echo "3. Ceci n'affichera pas \\n de nouvelle ligne (le \\n doit apparaître tel quel)<br>";
echo '4. Les variables ne seront pas $traitees $ici (variables non interprétées)<br>';
echo "5. Les variables seront $traitees $ici (variables interprétées)<br><br>";

$msg = "*Bonjour les développeurs*";
$msg_trim = trim($msg, "*");

// boucle pr afficher ltr par ltr
for ($i=0; $i < strlen($msg_trim); $i++) {
    echo $msg_trim[$i] . "<br>";
}
?>