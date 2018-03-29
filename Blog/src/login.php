<?php include 'application/bdd_connection.php';
include_once 'const.php';

//requete table admin
if(count($_POST)>0){

    $query = $pdo ->prepare('SELECT * FROM table_admin_users WHERE login = ? AND password = SHA1(?)');
    $query->execute([$_POST['login'], SALT.$_POST['password']]);
    $login = $query ->fetch();


//si identifiants correspondent
    if (  is_array($login)) {

//alors

//session_start
//SESSION['id'] = ce que tu recupères de la requete select

        session_start();
        $_SESSION['id_admin'] = $login['id_admin'];






//redirection page admin

        header('Location: admin.php');



    }

}

include_once 'login.phtml';

?>

