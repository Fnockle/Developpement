<?php
session_start();
if(!isset($_SESSION['id_admin'])) header('Location: login.php');

include 'application/bdd_connection.php';

    if(empty($_POST)) {
        // Validation de la query string dans l'URL.



        // Récupération d'un article du blog.

        $query = $pdo-> prepare('SELECT * FROM `table_article` WHERE id_art=?');
        $query->execute([$_GET['id_art']]);
        $art = $query->fetch();

        $query = $pdo-> prepare('SELECT * FROM table_cat');
        $query->execute();
        $cats = $query->fetchAll();

        $query = $pdo-> prepare('SELECT * FROM table_author');
        $query->execute();
        $auts = $query->fetchAll();

        // Sélection et affichage du template PHTML.

        include_once 'edit_post.phtml';

    } else {
        // Edition d'un article du blog.
        $a = array_values($_POST);
        $query = $pdo -> prepare('UPDATE table_article SET `title` = ?, `content` = ?, `id_author` = ?, `id_cat` = ? WHERE id_art=?');
        $query->execute($a);


        // Retour au panneau d'administration.

        header('LOCATION: admin.php');
    }
