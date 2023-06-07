<?php
include 'requeteSQL.php';
include 'connectdb.php';


function close_db() {;
    return null;
}

function inscription($nom, $prenom, $dateNaiss, $mail, $password, $adresse, $telephone, $sexe) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteInscription());
    $str->bindParam(1, $nom);
    $str->bindParam(2, $prenom);
    $str->bindParam(3, $dateNaiss);
    $str->bindParam(4, $mail);
    $str->bindParam(5, $password);
    $str->bindParam(6, $adresse);
    $str->bindParam(7, $telephone);
    $str->bindParam(8, $sexe);
    $str->execute();
    $str = close_db();
}

function connexion($email, $password) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteConnexion());
    $str->bindParam(1, $email);
    $str->bindParam(2, $password);
    $str->execute();
    $table = $str->fetch();
    $str = close_db();
    return $table;
}

function getHashPassword($password) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetHashPassword());
    $str->bindParam(1, $password);
    $str->execute();
    $hashpassword = $str->fetch();
    $str = close_db();
    return $hashpassword;
}

function getInfoClient($id) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetInfoClient());
    $str->bindParam(1, $id);
    $str->execute();
    $table = $str->fetch();
    $str = close_db();
    return $table;
}

function updateProfilPass($nom, $prenom, $adresse, $telephone, $email, $sexe, $date_naissance, $mot_de_passe, $id) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteUpdateProfPass(true));
    $str->bindParam(':nom', $nom);
    $str->bindParam(':prenom', $prenom);
    $str->bindParam(':adresse', $adresse);
    $str->bindParam(':telephone', $telephone);
    $str->bindParam(':email', $email);
    $str->bindParam(':sexe', $sexe);
    $str->bindParam(':date_naissance', $date_naissance);
    $str->bindParam(':mot_de_passe', $mot_de_passe);
    $str->bindParam(':id', $id);
    $str->execute();
    $str = close_db();
}

function updateProfilNoPass($nom, $prenom, $adresse, $telephone, $email, $sexe, $date_naissance, $id) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteUpdateProfPass(false));
    $str->bindParam(1, $nom);
    $str->bindParam(2, $prenom);
    $str->bindParam(3, $adresse);
    $str->bindParam(4, $telephone);
    $str->bindParam(5, $email);
    $str->bindParam(6, $sexe);
    $str->bindParam(7, $date_naissance);
    $str->bindParam(8, $id);
    $str->execute();
    $str = close_db();
}

function getAllAccounts() {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetAllAccounts());
    $str->execute();
    return $str->fetchAll();
}

function getAllAccountsByUser($idClient) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetAllAccountsByUser());
    $str->bindParam(1, $idClient);
    $str->execute();
    return $str->fetchAll();
}

function addMontant($montant, $account_id) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteAddMontant());
    $str->bindParam(1, $montant);
    $str->bindParam(2, $account_id);
    $str->execute();
    $str = close_db();
}

function getLastAccount() {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetLastAccount());
    $str->execute();
    return $str->fetch();
}

function createAccount($id, $type)
{
    $bdd = connect_db();
    $str = $bdd->prepare(requeteCreateAccount());
    $str->bindParam(1, $type);
    $str->bindParam(2, $id);
    $str->execute();
    $str = close_db();
}

function createAccountWithOtherUser($idClient1, $idClient2) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteCreateAccountWithOtherUser());
    $str->bindParam(1, $idClient1);
    $str->bindParam(2, $idClient1);
    $str->execute();
    $str = close_db();
}

function getAllUserNotMe($id) {
    $bdd = connect_db();
    $str = $bdd->prepare(requeteGetAllUserNotMe());
    $str->bindParam(1, $id);
    $str->execute();
    return $str->fetchAll();
}