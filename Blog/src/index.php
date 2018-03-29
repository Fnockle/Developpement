<?php include 'application/bdd_connection.php';
include_once 'const.php';

    // Récupération de tous les articles du blog classés par ordre antéchronologique.

    $sqlArticles = 'SELECT * FROM `table_article`
      JOIN table_author
      USING (id_author)
      JOIN table_cat
      USING (id_cat)
      LIMIT '.($_POST['pagination'] ?? 0).','.LIMIT_PER_PAGE;


    $query = $pdo->prepare($sqlArticles);
    $query->execute();
    $Articles = $query->fetchAll();


    $sql = 'SELECT COUNT(id_art) AS totalArticle FROM table_article';

    $query = $pdo->prepare($sql);
    $query->execute();
    $pagesArt = $query->fetch();



// Sélection et affichage du template PHTML.

    include_once 'index.phtml';