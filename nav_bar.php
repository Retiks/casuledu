<?php 
session_start();
?>
<nav>
    <ul>
        <a href="../index.php">Accueil</a>
        <?php if($_SESSION['id'] != null): ?>
            <a href="../profile/profile.php">Profile</a>
            <a href="../comptes/comptes.php">Comptes</a>
            <?php if($_SESSION['admin']): ?>
                <a href="../admin/admin.php">Admin</a>
            <?php endif ?>
            <a href="../deconnexion.php">Deconnexion</a>
        <?php endif ?>
        <?php if($_SESSION['id'] == null): ?>
            <a href="../connexion/connexion.php">Connexion</a>
            <a href="../inscription/inscription.php">Inscription</a>
        <?php endif ?>
    </ul>
</nav>