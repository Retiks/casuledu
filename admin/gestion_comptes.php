<?php
require '../session_admin.php';
require '../sql/sql.php';
require '../crypt/crypt.php';
require '../crypt/key.php';
require '../nav_bar.php';
$allAccount = getAllAccounts();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Gestion Comptes</title>
</head>

<body id="admin_comptes">
<main>
    <button onclick="window.location='../admin/admin.php'">Retour</button>
    <h1>Les Comptes</h1>
    <div id="comptes">
            <?php
            foreach ($allAccount as $value ) { ?>
                <div class="compte">
                    <h1><?php echo decrypt($value['first_name'], getKeyCrypt()).' '.decrypt($value['last_name'], getKeyCrypt()); ?></h1>
                    <?php if ($value['type'] == 'savings') { $valeurType = 'Épargne'; } elseif ($value['type'] == 'checking') { $valeurType = 'Chèque'; } ?>
                    <h2>Type : <?php echo $valeurType ?></h2>
                    <h2>Montant : <?php echo $value['balance'] ?> €</h2>
                    <button onclick="window.location='../admin/add_montant.php?id=<?php echo $value['0'] ?>&montant=<?php echo $value['balance'] ?>'">Ajout Montant</button>
                </div>
            <?php } ?>
    </div>
<!--    <button id="createAccount" onclick="window.location='../comptes/create_compte.php'">Crée un compte</button>-->
</main>
</body>

</html>
