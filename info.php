<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Reception form en GET
// Date : 18/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

// on verif pour pas avoir d erreur si on accede a la page direct
if (isset($_GET['nom'], $_GET['prenom'], $_GET['sexe'])) {
    $nom = htmlspecialchars($_GET['nom']); // securite de base
    $prenom = htmlspecialchars($_GET['prenom']);
    
    $titre = ($_GET['sexe'] === 'M') ? "Monsieur" : "Madame";
    echo "<h3>Bonjour $titre $prenom $nom !</h3>";
} else {
    echo "Faut passer par le formulaire stp.";
}

/*
  Observation de l'URL :
  Quand on valide, l'URL devient : info.php?nom=xxx&prenom=yyy&sexe=M
  Les data sont visibles direct dans la barre d'adresse.
*/

include 'includes/pied_inc.php';
?>