<?php // classe de définition des coordonnées

class Point{

    // définition des abscisses & ordonnées
    private $x;
    private $y;

    public function __construct(){
        $this->x = 0;
        $this->y = 0;
    }

    // création de 2 méthodes "GETTER" pour récupérer les X, Y
    // mot clé RETURN
    public function getX(){
        return $this->x;
    }
    public function getY(){
        return $this->y;
    }
    /* méthodes définissant les coordonnées à partir desquelles la forme se remplira
     pour le triangle il y a de fortes chances que cette méthode soit appelée 3 fois plus tard dans l'application
    */

    // cette méthode est un peu comme un "SETTER"
    public function startFrom($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
}