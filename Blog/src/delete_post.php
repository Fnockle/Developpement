<?php  // Validation de la query string dans l'URL.
session_start();
if(!isset($_SESSION['id_admin'])) header('Location: login.php');

include 'application/bdd_connection.php';

    // Suppression d'un article du blog.
$s = str_repeat('?,', count($_POST['id_art']));
//var_dump(substr($s, 0 , strlen($s) -1));


    $delete = 'DELETE FROM table_article WHERE id_art IN('.substr($s, 0 , strlen($s) -1).')';

    $query = $pdo->prepare($delete);
    $query->execute($_POST['id_art']);

    // Redirection vers le panneau d'administration.

header('Location: admin.php');
