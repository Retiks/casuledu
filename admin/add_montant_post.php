<?php
require '../session_admin.php';
require '../sql/sql.php';

if(isset($_POST['montant']) && isset($_GET['id']) && isset($_GET['montant'])) {
    $montant = $_POST['montant']+$_GET['montant'];
    $id = $_GET['id'];
    if(!empty($montant) && !empty($id)) {
        addMontant($montant, $id);
        header("Location: gestion_comptes.php");
    }
    else {
        header("Location: add_montant.php");
    }
}
else {
    header("Location: add_montant.php");
}
?>