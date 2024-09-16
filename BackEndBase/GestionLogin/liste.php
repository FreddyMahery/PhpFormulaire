<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestion des utilisateur</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>

    <h2>Liste des utilisateur</h2>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Action</th>
        </tr>

        <?php foreach ($utilisateurs as $utilisateur) { ?>
            <tr>
                <td><?php echo $utilisateur['nom']; ?></td>
                <td><?php echo $utilisateur['prenoms']; ?></td>
                <td>
                    <form method="GET" action="modifier.php">
                        <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">
                        <input type="submit" value="Modifier">
                    </form>
                    <form method="GET" action="details.php">
                        <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">
                        <input type="submit" value="Détails">
                    </form>
                    <form method="GET" action="supprimer.php">
                        <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">
                        <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                    </form>

                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <form action="../Authentification/acceuil.php">
        <button type="submit">Retoure</button>
    </form><br>
    <form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
    </form>

</body>

</html>