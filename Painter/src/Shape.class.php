<?php
// classe abstraite de dessin
abstract class Shape{

    /*
    déclarations des propriétés communues à TOUTES LES FORMES
    il suffit de regarder les attributs html des balises svg
    */
    protected $color;  // fill si c'est + parlant pour vous
    protected $opacity;
    protected $location;

    // déclaration de la SEULE méthode commune à toutes les formes qui devra être implémenté dans toutes les classes filles
    abstract public function draw(SvgRenderer $renderer);

    // affectation de valeurs par défauts dans le constructeur
    public function __construct(){
        $this->color = 'black';
        $this->location = new Point;
        $this->opacity = 1;
    }

    // il faut 3 méthodes SETTER pour pouvoir changer la valeur des propriétés de la classe depuis l'extérieur de la classe
    public function setColor($color){

        $this -> color = $color;

    }

    public function setOpacity($opacity){

        $this -> opacity =  $opacity;

    }

    // subtilité pour la prop location car elle est elle même un OBJET!!

    public function setLocation($x, $y){

        $this -> location -> startFrom($x, $y);

    }
}
