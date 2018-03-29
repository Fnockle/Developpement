<?php //var_dump($_GET);
include_once 'inc/sql.php';

$sqlContact = 'SELECT customerName, CONCAT(`contactLastName`, \' \', `contactFirstName`) AS contactName, addressLine1, city 
FROM customers INNER JOIN orders ON customers.customerNumber = orders.customerNumber WHERE orderNumber=?';

$query = $pdo->prepare($sqlContact);
$query->execute([$_GET['orderNumber']]);
$customerDetails = $query->fetch();

//var_dump($customerDetails);

$sqlOrder = 'SELECT productName, buyPrice, quantityOrdered, ROUND(quantityOrdered * priceEach,2) AS priceTotal
From products JOIN orderdetails USING(`productCode`) WHERE orderNumber=? ORDER BY productName';

$query = $pdo->prepare($sqlOrder);
$query->execute([$_GET['orderNumber']]);
$orderDetails = $query->fetchAll();

// must be the last instruction of the file
include_once 'templates/order-form.phtml';
