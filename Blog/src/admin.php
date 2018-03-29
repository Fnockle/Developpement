<?php

session_start();
if(!isset($_SESSION['id_admin'])) header('Location: login.php');

include 'application/bdd_connection.php';
$sqlAdmin = 'SELECT `title`, `content`, `name_author`, `name_cat`, `id_art`
FROM `table_article`
JOIN table_author
USING (id_author)
JOIN table_cat
USING (id_cat)';

$query = $pdo->prepare($sqlAdmin);
$query->execute();
$allArt = $query->fetchAll();

include_once 'admin.phtml';

?>