<?php
require('nav_bar.php');
include 'sql/sql.php';
include 'crypt/crypt.php';
include 'crypt/key.php';
session_start();
$infoClient = getInfoClient($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>

<body id="accueil">
    <?php if ($_SESSION['successConnect']) : ?>
        <div class="success-message">
            <h2>Succès !</h2>
            <p>Vous vous êtes connecter avec succès.</p>
        </div>
    <?php endif ?>
    <?php if ($_SESSION['successDeco']) : ?>
        <div class="success-message">
            <h2>Succès !</h2>
            <p>Vous vous êtes déconnecter avec succès.</p>
        </div>
    <?php endif ?>
    <section class="main-titre">
        <div class="titre">
            <h5>Bienvenue</h5>
            <h1> sur CasulEdu !</h1>
            <h2><?php 
                $sexe=decrypt($infoClient['sexe'], getKeyCrypt());
                if($sexe=='h') echo 'Monsieur ';
                else if($sexe=='f') echo 'Madame '; 
                echo decrypt($infoClient['last_name'], getKeyCrypt())." ".decrypt($infoClient['first_name'], getKeyCrypt());
                ?></h2>
        </div>
    </section>
</body>

</html>
<?php
unset($_SESSION['successConnect']);
unset($_SESSION['successDeco']);
?>