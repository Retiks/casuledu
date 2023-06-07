<?php
include '../sql/sql.php';
include '../crypt/crypt.php';
include '../crypt/key.php';
include '../session.php';
require('../nav_bar.php');
session_start();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Profile</title>
</head>

<body id="create_comptes">
    <main>
        <h1>Crée un Compte</h1>
        <form action="create_compte_post.php" method="POST">
            <label for="account">Type de compte :</label><br>
            <select id="account" name="account">
                <option value="choice">--Veuillez choisir un type de compte--</option>
                <option value="epargne">Épargne</option>
                <option value="cheque">Chèque</option>
            </select>
            <p></p>
            <input type="submit" value="Crée">
        </form>
    </main>
</body>

</html>