<?php
$host = 'localhost'; // Nom d'hôte de votre serveur MySQL
$dbname = 'gestion_etudiants'; // Nom de la base de données
$username = 'freddy'; // Nom d'utilisateur MySQL
$password = 'freddymahery'; // Mot de passe MySQL

try {
    // Connexion à la base de données en utilisant PDO
    $connc = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $connc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}

// Récupérer tous les utilisateur de la base de données
$stmti = $connc->query("SELECT * FROM utilisateurs");
$utilisateurs = $stmti->fetchAll(PDO::FETCH_ASSOC);
?>