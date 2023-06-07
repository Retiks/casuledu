<?php
include '../sql/sql.php';
session_start();

if(!empty($_POST['password']) && !empty($_POST['email'])){ 
    $email=htmlspecialchars($_POST['email']); 
    $password=htmlspecialchars($_POST['password']);
    $passwordHash = getHashPassword($password);

    $infoConnect = connexion($email, $passwordHash[0]);
    if($infoConnect[0] != 0) {
        $_SESSION['successConnect'] = true;
        $_SESSION['id'] = $infoConnect[1];
        $_SESSION['admin'] = $infoConnect[2];
        header("Location: ../index.php");
    }
    else {
        $_SESSION['errorConnect'] = true;
        header("Location: connexion.php");
    }
}
else {
    header("Location: connexion.php");
}
?>