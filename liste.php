<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Lecture du CSV (Partie 5)
// Date : 18/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

// je reutilise la fct mention
if (!function_exists('mention')) {
    function mention($note) {
        if ($note >= 16) return "Très bien";
        elseif ($note >= 14) return "Bien";
        elseif ($note >= 12) return "Assez bien";
        elseif ($note >= 10) return "Passable";
        else return "Ajourné";
    }
}

$chemin_csv = 'data/notes.csv';

if (!file_exists($chemin_csv)) {
    echo "<p style='color:red'>Erreur : Le fichier CSV existe pas frero. Faut saisir des notes avant.</p>";
    exit;
}

$file = fopen($chemin_csv, 'r');
if (!$file) {
    echo "Erreur d'ouverture du fichier.";
    exit;
}

echo "<h2>Liste des apprenants (depuis CSV)</h2>";
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<tr><th>Nom</th><th>Info</th><th>Maths</th><th>Moyenne</th><th>Mention</th></tr>";

$somme_classe = 0;
$nb_apprenants = 0;

while (($ligne = fgetcsv($file, 1000, ';')) !== false) {
    $nom = $ligne[0];
    $info = (float)$ligne[1];
    $math = (float)$ligne[2];
    
    $moyenne = ($info + $math) / 2;
    $somme_classe += $moyenne;
    $nb_apprenants++;

    echo "<tr>";
    echo "<td>$nom</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>$moyenne</td>";
    echo "<td>" . mention($moyenne) . "</td>";
    echo "</tr>";
}
echo "</table>";
fclose($file);

if ($nb_apprenants > 0) {
    $moy_generale = $somme_classe / $nb_apprenants;
    echo "<h3>Moyenne générale de la classe : " . number_format($moy_generale, 2) . "</h3>";
}

/*
  Reponse Exo 5.3 (fgetcsv vs fgets/explode) :
  - fgets() + explode() : methode bas niveau, c est pr un fichier tres simple, mais si dans le nom ya un point-virgule.
  - fgetcsv() : ca gere automatiquement les separateurs, les guillemets et les cas speciaux. C est bcp plus pratique.
*/

include 'includes/pied_inc.php';
?>