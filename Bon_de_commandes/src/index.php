<?php
include_once 'inc/sql.php';
include_once 'inc/const.php';

$sql = 'SELECT orderNumber, orderDate, shippedDate, status FROM orders LIMIT '.($_POST['pagination'] ?? 0).','.LIMIT_PER_PAGE;
//var_dump($sql);
//isset($_POST['pagination']) ? $_POST['pagination'] :0 ;
$query = $pdo->prepare($sql);
$query->execute();
$orders = $query->fetchAll();

//var_dump($orders);

$sql = 'SELECT COUNT(orderNumber) AS totalOrder FROM orders';

$query = $pdo->prepare($sql);
$query->execute();
$pagesOrder = $query->fetch();


// must be the last instruction of the file
include_once 'templates/index.phtml';
