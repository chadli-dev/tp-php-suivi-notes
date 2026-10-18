<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Serialisation et JSON (Exo 5.4)
// Date : 18/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Exercice 5.4 : JSON et Sérialisation</h2>";

// tableau assoc
$resultats = [
    ["nom" => "Karim", "notes" => [12, 14], "moyenne" => 13],
    ["nom" => "Sara", "notes" => [18, 16], "moyenne" => 17]
];

// ecriture en JSON dans le fichier
$json_data = json_encode($resultats);
file_put_contents('data/notes.json', $json_data);
echo "<p>Fichier notes.json crée avec succes !</p>";

// relecture
$contenu_json = file_get_contents('data/notes.json');
$tableau_decode = json_decode($contenu_json, true); // true pr avoir un tableau, sinon ca fait un objet PHP

echo "<strong>Lecture depuis json :</strong><pre>";
print_r($tableau_decode);
echo "</pre>";

// Comparaison
$serialise = serialize($resultats);
echo "<strong>Apercu avec serialize() de PHP :</strong><br>";
echo "<code>$serialise</code><br><br>";

/*
  Question : JSON vs Serialize, lequel est exploitable en JS ?
  Rep : C'est le JSON . JS sait le lire nativement avec JSON.parse().
  Le serialize() c est un format specifique a PHP, le front-end le comprend pas.
*/

include 'includes/pied_inc.php';
?>