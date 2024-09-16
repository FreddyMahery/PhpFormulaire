<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ajouter un Admin</h2>
<form method="POST" action="../GestionLogin/ajout.php">
    <label>Nom:</label>
    <input type="text" name="nom" required><br><br>

    <label>Prénoms:</label>
    <input type="text" name="prenoms" required><br><br>

    <label>email:</label>
    <input type="email" name="email" required><br><br>


    <label>Mots de passe:</label>
    <input type="password" name="mdp" required><br><br>

    <input type="submit" name="ajouter" value="Ajouter">
</form> <br>
<form action="../GestionLogin/liste.php">
    <button type="submit">Liste des utilisateur</button>
</form><br>



</body>
</html>