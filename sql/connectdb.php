<?php
function connect_db()
{
    $db = new PDO("mysql:host=mysql-casuledu.alwaysdata.net;dbname=casuledu_bdd", "casuledu", "8iqq4sky") or die('Could not Connect to Database');
    return $db;
}

