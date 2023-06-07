<?php

function requeteInscription() {
    $requete = "INSERT INTO clients (last_name, first_name, dateNaiss, email, password, address, phone, registration_date, sexe) 
    VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
    return $requete;
}

function requeteConnexion() {
    $requete = "SELECT count(*), id, admin FROM clients WHERE email = ? AND password = ?";
    return $requete;
}

function requeteGetHashPassword() {
    $requete = "SELECT SHA2(CONCAT('ce444a5ae47c6c2ce727685e94dec90fbb7ee0821200a907aa48530a', ?), 224)";
    return $requete;
}

function requeteGetInfoClient() {
    $requete = "SELECT * FROM clients WHERE id = ?";
    return $requete;
}

function requeteUpdateProfPass($bool) {
    if($bool) {
        $requete = "UPDATE clients SET last_name=:nom, first_name=:prenom, address=:adresse, phone=:telephone, email=:email, 
        sexe=:sexe, dateNaiss=:date_naissance, password=SHA2(CONCAT('ce444a5ae47c6c2ce727685e94dec90fbb7ee0821200a907aa48530a', :mot_de_passe), 224) WHERE id=:id";
    }
    else {
        $requete = "UPDATE clients SET last_name=?, first_name=?, address=?, phone=?, email=?, 
        sexe=?, dateNaiss=? WHERE id=?";
    }
    return $requete;
}

function requeteGetAllAccounts() {
    $requete = "SELECT *, clients.first_name, clients.last_name FROM accounts INNER JOIN clients ON accounts.id_client = clients.id";
    return $requete;
}

function requeteGetAllAccountsByUser() {
    $requete = "SELECT * FROM accounts INNER JOIN clients c on accounts.id_client = c.id WHERE accounts.id_client = ? AND accounts.status = 'active'";
    return $requete;
}

function requeteAddMontant() {
    $requete = "UPDATE `accounts` SET `balance`= ? WHERE accounts.id = ?";
    return $requete;
}

function requeteCreateAccount() {
    $requete = "INSERT INTO `accounts`(`type`, `id_client`) VALUES (?, ?)";
    return $requete;
}

function requeteGetLastAccount() {
    $requete = "SELECT id FROM accounts ORDER BY id DESC LIMIT 1";
    return $requete;
}

function requeteGetAllUserNotMe() {
    $requete = "SELECT * FROM clients WHERE id NOT LIKE ?";
    return $requete;
}