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
        $parcours = $_POST['parcours'];
        $sexe = $_POST['sexe'];
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];

        // Préparer la requête SQL avec des placeholders pour la sécurité (PDO)
        $sql = "INSERT INTO etudiants (nom, prenoms, parcours, sexe, date_naissance, adresse) 
                VALUES (:nom, :prenoms, :parcours, :sexe, :date_naissance, :adresse)";

        // Préparer la requête avec PDO
        $stmt = $conn->prepare($sql);

        // Lier les valeurs aux placeholders pour éviter les injections SQL
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenoms', $prenoms);
        $stmt->bindParam(':parcours', $parcours);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':adresse', $adresse);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger ou afficher un message de succès
            echo "<h1>L'étudiant a été ajouté avec succès.</h1>";
        } else {
            // Gérer les erreurs
            echo "<h1>Une erreur s'est produite lors de l'ajout de l'étudiant.</h1>";
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
