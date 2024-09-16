<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if (isset($_GET['id'])) {
    // Récupérer l'ID de l'étudiant à modifier
    $id = $_GET['id'];

    // Préparer une requête pour récupérer les informations de l'étudiant
    $stmt = $conn->prepare("SELECT * FROM etudiants WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'étudiant existe
    if (!$etudiant) {
        echo "Étudiant non trouvé!";
        exit();
    }
}

// Récupérer les parcours pour le champ de sélection
$parcours_stmt = $conn->query("SELECT * FROM parcours");
$parcours = $parcours_stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mettre à jour les informations de l'étudiant
    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $parcours = $_POST['parcours'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];

    // Requête de mise à jour
    $stmt = $conn->prepare("UPDATE etudiants SET 
        nom = :nom, 
        prenoms = :prenoms, 
        parcours = :parcours, 
        sexe = :sexe, 
        date_naissance = :date_naissance, 
        adresse = :adresse 
        WHERE id = :id");

    // Exécuter la requête avec les valeurs
    $stmt->execute([
        'nom' => $nom,
        'prenoms' => $prenoms,
        'parcours' => $parcours,
        'sexe' => $sexe,
        'date_naissance' => $date_naissance,
        'adresse' => $adresse,
        'id' => $id
    ]);

    // Rediriger après la mise à jour
    header("Location: liste.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'étudiant</title>
</head>
<body>

<h2>Modifier les informations de l'étudiant</h2>
<form method="POST" action="">

    <label>Nom:</label>
    <input type="text" name="nom" value="<?php echo $etudiant['nom']; ?>" required><br><br>

    <label>Prénoms:</label>
    <input type="text" name="prenoms" value="<?php echo $etudiant['prenoms']; ?>" required><br><br>

    <label>Parcours:</label>
    <select name="parcours" required>
        <?php foreach ($parcours as $row) { ?>
            <option value="<?php echo $row['nom_parcours']; ?>" <?php if ($row['nom_parcours'] == $etudiant['parcours']) echo "selected"; ?>>
                <?php echo $row['nom_parcours']; ?>
            </option>
        <?php } ?>
    </select><br><br>

    <label>Sexe:</label>
    <input type="radio" name="sexe" value="Homme" <?php if ($etudiant['sexe'] == 'Homme') echo "checked"; ?>> Homme
    <input type="radio" name="sexe" value="Femme" <?php if ($etudiant['sexe'] == 'Femme') echo "checked"; ?>> Femme<br><br>

    <label>Date de naissance:</label>
    <input type="date" name="date_naissance" value="<?php echo $etudiant['date_naissance']; ?>" required><br><br>

    <label>Adresse:</label>
    <input type="text" name="adresse" value="<?php echo $etudiant['adresse']; ?>" required><br><br>

    <input type="submit" value="Mise à jour">
    <a href="liste.php"><button type="button">Annuler</button></a>
</form><br>
<form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
</form>

</body>
</html>