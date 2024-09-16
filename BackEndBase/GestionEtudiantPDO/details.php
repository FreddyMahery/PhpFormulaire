<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if (isset($_GET['id'])) {
    // Récupérer l'ID de l'étudiant depuis l'URL
    $id = $_GET['id'];

    // Préparer une requête pour récupérer les détails de l'étudiant
    $sql = "SELECT * FROM etudiants WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'étudiant existe
    if ($etudiant) {
        echo "<h2>Détails de l'étudiant</h2>";
        echo "<p><strong>Nom :</strong> " . htmlspecialchars($etudiant['nom']) . "</p>";
        echo "<p><strong>Prénoms :</strong> " . htmlspecialchars($etudiant['prenoms']) . "</p>";
        echo "<p><strong>Parcours :</strong> " . htmlspecialchars($etudiant['parcours']) . "</p>";
        echo "<p><strong>Sexe :</strong> " . htmlspecialchars($etudiant['sexe']) . "</p>";
        echo "<p><strong>Date de naissance :</strong> " . htmlspecialchars($etudiant['date_naissance']) . "</p>";
        echo "<p><strong>Adresse :</strong> " . htmlspecialchars($etudiant['adresse']) . "</p>";
    } else {
        echo "Aucun étudiant trouvé avec cet ID.";
    }
} else {
    echo "ID de l'étudiant manquant.";
}
?>

<!-- Bouton pour retourner à la liste -->
<a href="liste.php"><button>Retour</button></a><br><br>
<form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
</form>
