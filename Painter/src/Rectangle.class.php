<?php

class Rectangle extends Shape {
	// props definitions

    protected $width;
    protected $height;

	public function __construct() {

		// Appelle le constructeur de la classe parent, la classe Shape.
        parent::__construct();

        $this -> width;
        $this -> height;

	}


    public function draw(SvgRenderer $renderer) {
        // Utilisation de l'objet renderer pour dessiner un triangle avec ses propriétés.
        $renderer->drawRectangle($this->location, $this->color, $this->opacity, $this->width, $this->height);
    }


	// size setter method
    public  function setSize($width, $height){

	    $this -> width = $width;
	    $this -> height = $height;

    }
}
