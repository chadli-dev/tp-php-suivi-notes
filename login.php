<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : Connexion avec session et cookie
// Date : 18/10/2026

session_start();

// si form soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['login'])) {
    $login = $_POST['login'];
    
    // sauvegarde en session
    $_SESSION['login'] = $login;
    
    // cookie Variante (tableau JSON avec login + date)
    $data_cookie = [
        "login" => $login, 
        "date_connexion" => date("Y-m-d H:i:s")
    ];
    // validite de 24h=86400 scnds
    setcookie("dernier_login", json_encode($data_cookie), time() + 86400, "/");

    // redirection
    header("Location: profil.php");
    exit;
}

// On lirt le cookie pr pre-remplir le champ
$login_pre_rempli = "";
if (isset($_COOKIE['dernier_login'])) {
    $tab_cookie = json_decode($_COOKIE['dernier_login'], true);
    if (is_array($tab_cookie) && isset($tab_cookie['login'])) {
        $login_pre_rempli = $tab_cookie['login'];
    }
}

// affichage
require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
?>

<h2>Connexion</h2>
<form method="POST" action="login.php">
    Login : <input type="text" name="login" value="<?= htmlspecialchars($login_pre_rempli) ?>"><br><br>
    <input type="submit" value="Se connecter">
</form>

<?php
/*
  Reponses Exo 6.2 :
  - Où est stockée une session ? rep: Sur le serveur 
  - Où est stocké un cookie ? rep: Chez le client .
  - Pourquoi setcookie() et header() doivent etre appelés avant l'affichage ? 
    rep: car ce sont des requêtes d'en-tête HTTP. Si on fait un 'echo' ou du HTML avant, PHP a deja envoyé l'en-tête, on peut plus le modifier.
*/

include 'includes/pied_inc.php';
?>