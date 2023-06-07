<?php
session_start();
$_SESSION = array();
session_destroy();
session_start();
$_SESSION['successDeco'] = true;
header("Location: ../index.php");
?>