<?php include 'application/bdd_connection.php';

// Ajout d'un commentaire à un article du blog.

$a = array_values($_POST);
//$shifted = array_shift($a);
var_dump($a);
//var_dump($shifted);
$newCom = 'INSERT INTO `table_comment` (`id_art`, `pseudo`, `content_com`, `date_comment` ) VALUES (?, ?, ?, NOW())';


$query = $pdo->prepare($newCom);
$NewCom = $query->execute($a);


// Retour à l'article détaillé une fois que le nouveau commentaire a été ajouté.

header('Location: show_post.php?id_art='.$_POST['id_art']);