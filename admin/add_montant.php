<?php
require '../nav_bar.php';
?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Ajout Montant</title>
</head>

<body id="admin_addmontant">
<main>
    <button onclick="window.location='../admin/gestion_comptes.php'">Retour</button>
    <h1>Montant à ajouter</h1>
    <form action="add_montant_post.php?id=<?php echo $_GET['id'] ?>&montant=<?php echo $_GET['montant'] ?>" method="POST">
        <label for="account">Montant à ajouter :</label><br>
        <input type="number" name="montant">
        <p></p>
        <input type="submit" value="Ajouter">
    </form>
</main>
</body>

</html>
