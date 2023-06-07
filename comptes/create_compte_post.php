<?php
require '../sql/sql.php';
session_start();

if(isset($_POST['account'])) {
    $type_account = $_POST['account'];
    $otherUser = $_POST['userForAccount'];
    if(!empty($type_account)) {
        if($type_account != "choice") {
            if ($type_account == 'epargne') $type_account = 'savings';
            else $type_account = 'checking';
            createAccount($_SESSION['id'], $type_account);
            header("Location: comptes.php");
        }
        else {
            header("Location: create_compte.php");
        }
    }
    else {
        header("Location: create_compte.php");
    }
}
else {
    header("Location: create_compte.php");
}
?>