<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    try {
        // Récupérer l'ID de l'étudiant à supprimer via GET
        $id = $_GET['id'];

        // Préparer la requête SQL avec un placeholder pour l'ID
        $sql = "DELETE FROM etudiants WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Lier la valeur de l'ID au placeholder
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger vers la page principale après suppression
            header("Location: liste.php");
            exit();
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'étudiant.";
        }
    } catch (PDOException $e) {
        // Afficher l'erreur en cas d'exception
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun ID spécifié pour la suppression.";
}
?>
