<?php
require('../nav_bar.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Connexion</title>
</head>

<body id="connexion">
    <div id="container">
        <?php if ($_SESSION['successInscri']) : ?>
            <div class="success-message">
            <h2>Succès !</h2>
            <p>Vous vous êtes inscrit avec succès.</p>
        </div>
        <?php endif ?>
        <?php if ($_SESSION['errorConnect']) : ?>
            <div class="error-message">
                <p>Votre Mot de Passe ou votre Email est faux veuillez recommencer !</p>
            </div>
        <?php endif ?>
        <form action="connexion_post.php" method="post">
            <div id="titre">
                <h1>Connexion</h1>
            </div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
            <label for="password">Mot de Passe</label>
            <input type="password" name="password" id="password">
            <input type="checkbox" name="displayPass" id="displayPass"><label for="displayPass">Afficher le Mot de Passe</label>
            <input type="submit" value="Se Connecter">
            <input type="button" value="Inscription" onclick="window.location='../inscription/inscription.php';">
        </form>
    </div>
</body>

</html>

<?php
unset($_SESSION['errorConnect']);
unset($_SESSION['successInscri']);
?>