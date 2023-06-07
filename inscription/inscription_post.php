<?php
include '../sql/sql.php';
include '../crypt/crypt.php';
include '../crypt/key.php';
session_start();

if(!empty($_POST['adresse']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['dateNaiss']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['sexe'])){
    $nom=htmlspecialchars($_POST['firstname']);
    $prenom=htmlspecialchars($_POST['name']); 
    $dateNaiss=htmlspecialchars($_POST['dateNaiss']); 
    $mail=htmlspecialchars($_POST['email']); 
    $password=htmlspecialchars($_POST['password']); 
    $passwordVerif=htmlspecialchars($_POST['passwordVerif']);
    $adresse=htmlspecialchars($_POST['adresse']); 
    $telephone=htmlspecialchars($_POST['telephone']);
    $sexe=htmlspecialchars($_POST['sexe']);


    if(!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$#", $password)) {
        $_SESSION['errorPass1'] = true;
        header("Location: inscription.php");
    }

    else if(!preg_match("#^0[1-9]\d{8}$#", $telephone)) {
        $_SESSION['errorPhone'] = true;
        header("Location: inscription.php");
    }

    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $_SESSION['errorEmail'] = true;
        header("Location: inscription.php");
    }

    else if($password != $passwordVerif) {
        $_SESSION['errorPass2'] = true;
        header("Location: inscription.php");
    }
        
    else {
        $nomEncrypt=encrypt($nom, getKeyCrypt());
        $prenomEncrypt=encrypt($prenom, getKeyCrypt());
        $adresseEncrypt=encrypt($adresse, getKeyCrypt());
        $telephoneEncrypt=encrypt($telephone, getKeyCrypt());
        $sexeEncrypt=encrypt($sexe, getKeyCrypt());
        inscription($nomEncrypt, $prenomEncrypt, $dateNaiss, $mail, $password, $adresseEncrypt, $telephoneEncrypt, $sexeEncrypt);
        $_SESSION['successInscri'] = true;
        header("Location: ../connexion/connexion.php");
    }
}
else {
    header("Location: inscription.php");
}
