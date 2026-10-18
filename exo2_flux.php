<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Les conditions et les boucles (partie 2)
// Date : 18/10/2026

require 'config.php';

echo "<h2>Exercice 2.1 : if / elseif / else</h2>";

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

$tests_notes = [17, 14.5, 12, 10, 8];
foreach ($tests_notes as $n) {
    echo "Pour la note $n : " . mention($n) . "<br>";
}

echo "<h2>Exercice 2.2 : switch</h2>";
$mois = date("m");

switch ($mois) {
    case "01": echo "Janvier"; break;
    case "02": echo "Février"; break;
    case "03": echo "Mars"; break;
    case "04": echo "Avril"; break;
    case "05": echo "Mai"; break;
    case "06": echo "Juin"; break;
    case "07": echo "Juillet"; break;
    case "08": echo "Août"; break;
    case "09": echo "Septembre"; break;
    case "10": echo "Octobre"; break;
    case "11": echo "Novembre"; break;
    case "12": echo "Décembre"; break;
    default: echo "Erreur, mois inconnu"; break;
}
echo "<br>";

/* 
  reponse de qst switch : le code va continuer a s executer dans les "case" en dessous meme si la condition est fausse, jusqu a trouver un break ou la fin du switch.
*/

echo "<h2>Exercice 2.3 : Boucles</h2>";

echo "<strong>1. Triangle :</strong><br>";
for ($ligne = 1; $ligne <= 6; $ligne++) {
    for ($etoile = 1; $etoile <= $ligne; $etoile++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";

echo "<strong>2. While de 0 a 20 :</strong><br>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}
echo "<br><br>";

echo "<strong>3. For et continue (nombres pairs) :</strong><br>";
for ($j = 0; $j <= 10; $j++) {
    if ($j % 2 != 0) {
        continue;
    }
    echo "$j ";
}
echo "<br><br>";

echo "<strong>4. break 2 :</strong><br>";
$valeur = 1;
while (true) {
    switch ($valeur) {
        case 5:
            echo "At 5 <br>";
            break;
        case 10:
            echo "At 10; quitting <br>";
            break 2;
    }
    $valeur++;
}
echo "<br>";

echo "<strong>5. do-while :</strong><br>";
$k = 0;
do {
    if ($k == 10) {
        echo "<b>$k</b> ";
    } else {
        echo "$k ";
    }
    $k += 2;
} while ($k <= 20);
echo "<br>";

/*
  Difference essentielle entre while et do-while : do-while va s executer au moins une fois meme si la condition est fausse dans le debut 
*/
?>