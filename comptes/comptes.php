<?php
include '../sql/sql.php';
include '../crypt/crypt.php';
include '../crypt/key.php';
include '../session.php';
require('../nav_bar.php');
session_start();
$infos = getInfoClient($_SESSION['id']);
$accounts = getAllAccountsByUser($_SESSION['id']);
$countAccount = count($accounts);
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Comptes</title>
</head>

<body id="comptes">
    <main>
        <h1>Mes Comptes</h1>
        <?php if ($countAccount == 0) : ?>
            <h1 id="noAccount">Vous n'avez pas de compte !</h1>
        <?php
        else : ?>
        <div id="comptess">
            <?php foreach ($accounts as $key => $value ) {
                if ($value['type'] == 'savings') $type_account = 'Épargne';
                else $type_account = 'Chèque'; ?>
                <div class="compte">
                    <h1>Compte n°<?php echo $key+1; ?></h1>
                    <h2>ID : <?php echo $value['0'] ?></h2>
                    <h2>Type : <?php echo $type_account ?></h2>
                    <h2>Montant : <?php echo $value['balance'] ?> €</h2>
                </div>
            <?php }
            endif;
        ?>
        </div>
        <button id="createAccount" onclick="window.location='../comptes/create_compte.php'">Crée un compte</button>
    </main>
</body>

</html>