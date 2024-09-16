<!DOCTYPE html>
<html>
<head>
    <title>reponse du ajout</title>
</head>
<body>
<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le bouton "Ajouter" a été soumis
    if (isset($_POST['ajouter'])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenoms = $_POST['prenoms'];
        $email = $_POST['email'];
        // $mdp = $_POST['mdp'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hachage du mot de passe


        // Préparer la requête SQL avec des placeholders pour la sécurité (PDO)
        $sql = "INSERT INTO utilisateurs (nom, prenoms, email, mdp) 
                VALUES (:nom, :prenoms, :email, :mdp)";

        // Préparer la requête avec PDO
        $stmti = $connc->prepare($sql);

        // Lier les valeurs aux placeholders pour éviter les injections SQL
        $stmti->bindParam(':nom', $nom);
        $stmti->bindParam(':prenoms', $prenoms);
        $stmti->bindParam(':email', $email);
        $stmti->bindParam(':mdp', $mdp);
       
        // Exécuter la requête
        if ($stmti->execute()) {
            // Rediriger ou afficher un message de succès
            echo "<h1>L'utilisateur a été ajouté avec succès.</h1>";
        } else {
            // Gérer les erreurs
            echo "<h1>Une erreur s'est produite lors de l'ajout de l'utilisateur.</h1>";
        }
    }
}
?>

<a href="../Authentification/acceuil.php">
    <button type="button">Retour</button>
</a><br><br>
<form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
</form>

</body>
</html>

