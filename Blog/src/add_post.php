<?php
session_start();
if(!isset($_SESSION['id_admin'])) header('Location: login.php');


include 'application/bdd_connection.php';

    if(empty($_POST)) {
        // Récupération de tous les auteurs du blog.

        $authors = 'SELECT `id_author`, `name_author` FROM `table_author`';

        $query = $pdo->prepare($authors);
        $query->execute();
        $allAuthors = $query->fetchAll();

        // Récupération de toutes les catégories du blog.

        $categories = 'SELECT `id_cat`, `name_cat` FROM `table_cat`';

        $query = $pdo->prepare($categories);
        $query->execute();
        $allCategories = $query->fetchAll();

        // Sélection et affichage du template PHTML.

        include_once 'add_post.phtml';

    } else {
        // Ajout d'un article du blog.

        var_dump(array_values($_POST));

        $newArticle = 'INSERT INTO table_article (`title`, `content`, `id_author`, `id_cat`, `date_time`)
        VALUES (?, ?, ?, ?, NOW())';

        $query = $pdo->prepare($newArticle);
        $query->execute(array_values($_POST));



        // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.


       header('Location: index.php');


    }
