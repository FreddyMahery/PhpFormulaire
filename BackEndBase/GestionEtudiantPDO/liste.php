<?php
include '../ConectionBD/config.php';
include '../Testsession/testss.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestion des étudiants</title>
</head>

<body>

    <h2>Liste des étudiants</h2>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Action</th>
        </tr>

        <?php foreach ($etudiants as $etudiant) { ?>
            <tr>
                <td><?php echo $etudiant['nom']; ?></td>
                <td><?php echo $etudiant['prenoms']; ?></td>
                <!-- <td><?php echo $etudiant['parcours']; ?></td>
                <td><?php echo $etudiant['sexe']; ?></td>
                <td><?php echo $etudiant['date_naissance']; ?></td>
                <td><?php echo $etudiant['adresse']; ?></td> -->
                <td>
                    <form method="GET" action="modifier.php">
                        <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">
                        <input type="submit" value="Modifier">
                    </form>
                    <form method="GET" action="details.php">
                        <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">
                        <input type="submit" value="Détails">
                    </form>
                    <form method="GET" action="supprimer.php">
                        <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">
                        <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
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