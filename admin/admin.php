<?php
require '../session_admin.php';
require '../nav_bar.php';
session_start();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Panel Admin</title>
</head>

<body id="admin">
<main>
    <h1>Panel Admin</h1>
    <button onclick="window.location='../admin/gestion_comptes.php'">Gestion Comptes</button>
</main>
</body>

</html>
