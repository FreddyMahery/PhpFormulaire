<!DOCTYPE html>
<html>

<head>
    <title>Gestion des utilisateur</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>

<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if (isset($_GET['id'])) {
    // Récupérer l'ID de l'étudiant depuis l'URL
    $id = $_GET['id'];

    // Préparer une requête pour récupérer les détails de l'étudiant
    $sql = "SELECT * FROM utilisateurs WHERE id = :id";
    $stmti = $connc->prepare($sql);
    $stmti->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Exécuter la requête
    $stmti->execute();

    // Récupérer les résultats
    $utilisateur = $stmti->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur existe
    if ($utilisateur) {
        echo "<h2>Détails de l'utilisateur</h2>";
        echo "<p><strong>Nom :</strong> " . htmlspecialchars($utilisateur['nom']) . "</p>";
        echo "<p><strong>Prénoms :</strong> " . htmlspecialchars($utilisateur['prenoms']) . "</p>";
        echo "<p><strong>email :</strong> " . htmlspecialchars($utilisateur['email']) . "</p>";
        echo "<p><strong>Mots de passe:</strong> " . htmlspecialchars($utilisateur['mdp']) . "</p>";
    } else {
        echo "Aucun utilisateur trouvé avec cet ID.";
    }
} else {
    echo "ID de l'utilisateur manquant.";
}
?>

<!-- Bouton pour retourner à la liste -->
<a href="liste.php"><button>Retour</button></a><br><br>
<form action="../Authentification/deconnexion.php" method="post">
    <button type="submit">Déconnexion</button>
</form>
</body>

</html>