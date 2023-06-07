<?php
session_start();
if(!$_SESSION['id']) header("Location: ../connexion/connexion.php");
?>