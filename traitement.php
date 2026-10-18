<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Reception et validation form POST
// Date : 18/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check si ca existe et si c'est pas vide
    if (isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) && !empty($_POST['nom']) && $_POST['note_info'] !== "" && $_POST['note_math'] !== "") {
        
        $nom = htmlspecialchars($_POST['nom']);
        $n_info = (float)$_POST['note_info'];
        $n_math = (float)$_POST['note_math'];

        // verif des bornes
        if ($n_info >= NOTE_MIN && $n_info <= NOTE_MAX && $n_math >= NOTE_MIN && $n_math <= NOTE_MAX) {
            echo "<h3 style='color:green'>Succès ! Recap pour $nom :</h3>";
            echo "<ul>";
            echo "<li>Note en Informatique : $n_info / 20</li>";
            echo "<li>Note en Maths : $n_math / 20</li>";
            echo "</ul>";
        } else {
            echo "<p style='color:red'>Erreur : Les notes doivent etre entre " . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
        }

    } else {
        echo "<p style='color:red'>Erreur : Tous les champs sont obligatoires bg.</p>";
    }
}

/*
  Qsts:
  1- Pourquoi POST pr un mot de passe ? 
     car avec GET le mdp apparait en clair dans l'URL, n'importe qui derriere moi peut le lire, ou on peut le voir ds l historique web. En POST, c'est cache dans le body HTTP .
  
  2- Que contient $_REQUEST ? 
     C'est un super tableau global qui regroupe tout : $_GET, $_POST et $_COOKIE . 
*/

include 'includes/pied_inc.php';
?>