<?php
include '../Testsession/testss.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>

    <h2>Bienvenue, Admin : <?php echo htmlspecialchars($_SESSION['admin']); ?> (<?php echo htmlspecialchars($_SESSION['user']); ?>)</h2>
    <?php
        include '../GestionEtudiantPDO/etudiants.php';
    ?>
    <?php
        include '../GestionLogin/admin.php';
    ?>
    
    <form action="../Authentification/deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
    </form>

</body>
</html>
