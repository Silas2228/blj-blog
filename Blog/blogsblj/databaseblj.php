<?php
$dbuser = "d041e_listuder";

// ACHTUNG: DU MUST HIER NOCH DAS PASSWORT EINSETZEN. DU FINDEST ES AUF DISCORD IM INFO CHANNEL
$dbpass = "12345_Db!!!";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
$sqlQuery = $pdo->query("SELECT * FROM `blog_url`");
$urls = $sqlQuery->fetchAll();