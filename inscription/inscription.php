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
    <title>Inscription</title>
</head>

<body id="inscription">
    <div id="container">
        <?php if ($_SESSION['errorPass1']) : ?>
            <div class="error-message">
                <p>Le Mot de passe doit contenir minimum 10 caractères, une majscule, une miniscule, un chiffre et un caractère spécial !</p>
            </div>
        <?php endif;
        if ($_SESSION['errorPhone']) : ?>
            <div class="error-message">
                <p>Le numéro de téléphone n'est pas conforme !</p>
            </div>
        <?php endif;
        if ($_SESSION['errorEmail']) : ?>
            <div class="error-message">
                <p>L'adresse e-mail n'est pas valide !</p>
            </div>
        <?php endif;
        if ($_SESSION['errorPass2']) : ?>
            <div class="error-message">
                <p>Les mots de passes ne sont pas identiques !</p>
            </div>
        <?php endif ?>
        <form action="inscription_post.php" method="post">
            <div id="titre">
                <h1>Inscription</h1>
            </div>
            <label for="firstname">Nom</label>
            <input type="text" name="firstname" id="firstname">
            <label for="name">Prénom</label>
            <input type="text" name="name" id="name">
            <label for="sexe">Sexe</label>
            <p></p>
            <div id="choixSexe">
                <label for="sexe">Homme</label>
                <input type="radio" name="sexe" id="sexeM" value="h" required>
                <label for="sexe">Femme</label>
                <input type="radio" name="sexe" id="sexeF" value="f" required>
            </div>
            <p></p>
            <label for="dateNaiss">Date de Naissance</label>
            <input type="date" name="dateNaiss" id="dateNaiss">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse">
            <label for="telephone">Téléphone</label>
            <input type="tel" name="telephone" id="telephone">
            <label for="password">Mot de Passe</label>
            <input type="password" name="password" id="password">
            <label for="passwordVerif">Vérification Mot de Passe</label>
            <input type="password" name="passwordVerif" id="passwordVerif">
            <input type="submit" value="S'Inscrire">
            <input type="button" value="Connexion" onclick="window.location='../connexion/connexion.php';">
        </form>
    </div>
</body>

</html>
<?php
unset($_SESSION['errorPass1']);
unset($_SESSION['errorPhone']);
unset($_SESSION['errorEmail']);
unset($_SESSION['errorPass2']);
?>