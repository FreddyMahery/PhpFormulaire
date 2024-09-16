<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';

if (isset($_GET['id'])) {
    // Récupérer l'ID de l'utilisateur à modifier
    $id = $_GET['id'];

    // Préparer une requête pour récupérer les informations de l'utiliteurs
    $stmti = $connc->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmti->execute(['id' => $id]);
    $utilisateur = $stmti->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe
    if (!$utilisateur) {
        echo "Utlisateur non trouvé!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mettre à jour les informations de l'utilisateur
    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Requête de mise à jour
    $stmti = $connc->prepare("UPDATE utilisateurs SET 
        nom = :nom, 
        prenoms = :prenoms, 
        email = :email, 
        mdp = :mdp 
        WHERE id = :id");

    // Exécuter la requête avec les valeurs
    $stmti->execute([
        'nom' => $nom,
        'prenoms' => $prenoms,
        'email' => $email,
        'mdp' => $mdp,
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
    <title>Modifier information de utilisateur</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>

<h2>Modifier les informations de l'utilisateur</h2>
<form method="POST" action="">

    <label>Nom:</label>
    <input type="text" name="nom" value="<?php echo $utilisateur['nom']; ?>" required><br><br>

    <label>Prénoms:</label>
    <input type="text" name="prenoms" value="<?php echo $utilisateur['prenoms']; ?>" required><br><br>

    <label>email:</label>
    <input type="email" name="email" value="<?php echo $utilisateur['email']; ?>" required><br><br>
    
    <label>Mots de passe:</label>
    <input type="password" name="mdp" value="<?php echo $utilisateur['mdp']; ?>" required><br><br>

    <input type="submit" value="Mise à jour">
    <a href="liste.php"><button type="button">Annuler</button></a>
</form><br>
<form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
</form>
</body>
</html>