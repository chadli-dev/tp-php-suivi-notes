<?php
// Auteur : ABD ESSAMAD CHADLI
// Objectif : script de deconnexion
// Date : 18/10/2026

session_start();
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>