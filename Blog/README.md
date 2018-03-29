Création d'un blog avec espace administrateur, avec connexion, pour ajouter, éditer ou supprimer un ou plusieurs article.

La page d'accueil permet de voir le résumé des articles, avec une pagination.

On peut aussi ajouter des commentaires aux articles sans être connecté.


Pour cet exercice on ne devait pas faire de création de compte, il faut donc entrer ses données directement dans la base de donnée.

Les mots de passe sont "salé" et encodé en SHA1 (ne pas oublier de selectionner l'encodage lors de l'ajout du mot de passe dans la base de donnée).

#Installation :

* Importer la BDD avec le fichier "blog.sql" à la racine du dossier /Blog.
* Mettre son login et mot de passe dans le fichier de connection bdd_connection.php ainsi que le nom de la BDD (ici "blog") se trouvant dans le dossier /application.

 