<?php
session_start(); // Démarrer la session

include './ConectionBD/config.php'; // Inclure le fichier de configuration de la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Vérifier si l'utilisateur existe dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmti = $connc->prepare($sql);
    $stmti->bindParam(':email', $email);
    $stmti->execute();
    $user = $stmti->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user['mdp'])) {
        // Si l'utilisateur est trouvé et que le mot de passe est correct
        $_SESSION['user'] = $user['email'];
        $_SESSION['admin'] = $user['nom']; // On stocke le nom de l'utilisateur dans la session
        header("Location: ./Authentification/acceuil.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <form method="POST" action="">
        <label>Email :</label>
        <input type="email" name="email" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="mdp" required><br><br>
        <button type="submit">Connexion</button>
        <button type="button" onclick="location.href='./Authentification/oubliePass.php'">Mot de passe oublié</button>
    </form>
</body>
</html>
