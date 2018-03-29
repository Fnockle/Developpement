<?php $sql = ['mysql:host=127.0.0.1;dbname=classicmodels;port=3306', 'login', 'password'];
$pdo = new PDO(...$sql);
// http://php.net/manual/en/pdostatement.fetch.php
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
$pdo->exec('SET NAMES UTF8');
