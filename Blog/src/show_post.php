<?php // Validation de la query string dans l'URL.

    include 'application/bdd_connection.php';

    // Récupération d'un article du blog.

    $sqlArticles = 'SELECT * FROM `table_article`
          JOIN table_author
          USING (id_author)
          JOIN table_cat
          USING (id_cat)
          WHERE id_art=?';


    $query = $pdo->prepare($sqlArticles);
    $query->execute([$_GET['id_art']]);
    $Article = $query->fetch();



    // Récupération de tous les commentaires de l'article du blog.

    $allComments = 'SELECT * FROM `table_comment`
      JOIN table_article
      USING (id_art)
      WHERE id_art=?';


    $query = $pdo->prepare($allComments);
    $query->execute([$_GET['id_art']]);
    $Comments = $query->fetchAll();

    // Sélection et affichage du template PHTML.

    include_once 'show_post.phtml';