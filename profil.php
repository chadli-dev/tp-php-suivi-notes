<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Page profil + Dates
// Date : 18/10/2026

session_start();

// dir vers le login si pas loggé
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$pseudo = htmlspecialchars($_SESSION['login']);
echo "<h2>Bienvenue $pseudo sur ton profil !</h2>";
echo '<p><a href="deconnexion.php">Se déconnecter (Logout)</a></p>';
echo "<hr>";

echo "<h3>Test DateTime et checkdate (Exo 6.3)</h3>";

// Calcul des jrs restantes
$date_fin = new DateTime("2027-06-30"); //date fin de semestre
$date_ajd = new DateTime();
$difference = $date_ajd->diff($date_fin);

echo "<p> il te reste encore <strong>" . $difference->days . "</strong> jours avant la fin du semestre (30 Juin 2027).</p>";

// Test de checkdate (par exp si le 29 fevrier 2026 existe)
$jour = 29; 
$mois = 2; 
$annee = 2026;
if (checkdate($mois, $jour, $annee)) {
    echo "<p>La date $jour/$mois/$annee est valide.</p>";
} else {
    echo "<p>Attention : La date $jour/$mois/$annee n'existe pas ! </p>";
}

include 'includes/pied_inc.php';
?>