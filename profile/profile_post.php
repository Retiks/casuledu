<?php
include '../sql/sql.php';
include '../crypt/crypt.php';
include '../crypt/key.php';
session_start();
$nom = encrypt($_POST['nom'], getKeyCrypt());
$prenom = encrypt($_POST['prenom'], getKeyCrypt());
$adresse = encrypt($_POST['adresse'], getKeyCrypt());
$telephone = encrypt($_POST['telephone'], getKeyCrypt());
$email = $_POST['email'];
$sexe = encrypt($_POST['sexe'], getKeyCrypt());
$date_naissance = encrypt($_POST['date_naissance'], getKeyCrypt());

if(!empty($_POST['password'])) {
    $mot_de_passe = $_POST['password'];
    $mot_de_passe_verif = $_POST['confirm_password'];
    if($mot_de_passe == $mot_de_passe_verif) {
        updateProfilPass($nom, $prenom, $adresse, $telephone, $email, $sexe, $date_naissance, $mot_de_passe, $_SESSION['id']);
        $_SESSION['updateProfileSucces'] = true;
        header('Location: profile.php');
    }else {
        $_SESSION['updateProfileFail'] = true;
        header('Location: profile.php');
    }
}else {
    updateProfilNoPass($nom, $prenom, $adresse, $telephone, $email, $sexe, $date_naissance, $_SESSION['id']);
    $_SESSION['updateProfileSucces'] = true;
    header('Location: profile.php');
}
?>