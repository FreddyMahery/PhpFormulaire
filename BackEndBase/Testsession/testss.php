<?php
session_start(); // Démarrer la session

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}
?>