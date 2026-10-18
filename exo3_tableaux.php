<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Manipulation des tableaux (Partie 3)
// Date : 18/10/2026

require 'config.php'; 

// declaration de la fct mention() a nv
if (!function_exists('mention')) {
    function mention($note) {
        if ($note >= 16) return "Très bien";
        elseif ($note >= 14) return "Bien";
        elseif ($note >= 12) return "Assez bien";
        elseif ($note >= SEUIL) return "Passable";
        else return "Ajourné";
    }
}

echo "<h2>Exercice 3.1 : Création</h2>";

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["Développement Web", "Bases de données", "Réseaux"];

echo "<strong>Affichage avec foreach :</strong><br>";
foreach ($modules as $mod) {
    echo "- $mod <br>";
}

echo "<strong>Affichage par indice :</strong><br>";
echo "1er module : " . $modules[0] . "<br>";
echo "2eme module : " . $modules[1] . "<br>";
echo "3eme module : " . $modules[2] . "<br>";


echo "<h2>Exercice 3.2 : Affichage HTML</h2>";
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? "color: red;" : "";
    
    echo "<tr style='$style'>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}
echo "</table>";


echo "<h2>Exercice 3.3 : Statistiques</h2>";

$somme = 0;
$max = 0;
$min = 20;

foreach ($notes as $n) {
    $somme += $n;
    if ($n > $max) $max = $n;
    if ($n < $min) $min = $n;
}
$moyenne = $somme / count($notes);

echo "<strong>Calculs manuels avec boucle :</strong><br>";
echo "Somme = $somme, Moyenne = $moyenne, Max = $max, Min = $min <br><br>";

echo "<strong>Vérif avec les fonctions PHP :</strong><br>";
echo "Somme = " . array_sum($notes) . ", Moyenne = " . (array_sum($notes)/count($notes)) . ", Max = " . max($notes) . ", Min = " . min($notes) . "<br><br>";

// tabl des effectifes
$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 1;
    } else {
        $effectifs[$m]++;
    }
}
echo "<strong>Effectifs par mention :</strong><br>";
foreach ($effectifs as $ment => $nb) {
    echo "$ment : $nb apprenants <br>";
}


echo "<h2>Exercice 3.4 : Tri</h2>";

function afficher($tab) {
    foreach ($tab as $k => $v) {
        echo "$k => $v | ";
    }
    echo "<br>";
}

$tab_tri = $notes; // je copie pr pas casser l'original

echo "<strong>1. Noms croissants (ksort) :</strong><br>";
ksort($tab_tri); afficher($tab_tri);

echo "<strong>2. Notes décroissantes (arsort) :</strong><br>";
arsort($tab_tri); afficher($tab_tri);

echo "<strong>3. Noms décroissants (krsort) :</strong><br>";
krsort($tab_tri); afficher($tab_tri);

echo "<strong>4. Notes croissantes (asort) :</strong><br>";
asort($tab_tri); afficher($tab_tri);

/*
  reponse de qst de tri : on utilise sort() pour trier croissant et rsort() pr decroissant
*/


echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "Predict: \$a + \$b donne a (car a est a gauche, il ecrase pas ses propres cles existantes)<br>";
var_dump($a + $b); echo "<br>";

echo "Predict: \$a == \$b donne true (meme valeurs et cles, peu importe l'ordre)<br>";
var_dump($a == $b); echo "<br>";

echo "Predict: \$a === \$b donne false (meme valeurs mais pas dans le meme ordre, donc pas strictement identiques)<br>";
var_dump($a === $b); echo "<br>";

?>