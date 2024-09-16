<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un étudiant</title>
</head>
<body>

<h2>Ajouter un étudiant</h2>
<form method="POST" action="../GestionEtudiantPDO/ajout.php">
    <label>Nom:</label>
    <input type="text" name="nom" required><br><br>

    <label>Prénoms:</label>
    <input type="text" name="prenoms" required><br><br>

    <label>Parcours:</label>
    <select name="parcours" required>
        <?php
        // Récupérer les parcours pour le champ de sélection
        $stmt = $conn->query("SELECT nom_parcours FROM parcours");
        $parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($parcours as $row) {
            echo "<option value=\"" . $row['nom_parcours'] . "\">" . $row['nom_parcours'] . "</option>";
        }
        ?>
    </select><br><br>

    <label>Sexe:</label>
    <input type="radio" name="sexe" value="Homme" required> Homme
    <input type="radio" name="sexe" value="Femme" required> Femme<br><br>

    <label>Date de naissance:</label>
    <input type="date" name="date_naissance" required><br><br>

    <label>Adresse:</label>
    <input type="text" name="adresse" required><br><br>

    <input type="submit" name="ajouter" value="Ajouter">
</form> <br>
<form action="../GestionEtudiantPDO/liste.php">
    <button type="submit">Liste des étudiants</button>
</form><br>


</body>
</html>