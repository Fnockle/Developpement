<?php

class Ellipse extends Shape {

	// prop radius
    protected $radiusX;
    protected $radiusY;

	public function __construct() {
		// Appelle le constructeur de la classe parent, la classe Shape.
        parent::__construct();

        $this -> radiusX;
        $this -> radiusY;

	}

	public function draw(SvgRenderer $renderer) {
		// Utilisation de l'objet renderer pour dessiner une ellipse avec ses propriétés.

        $renderer->drawEllipse($this->location, $this->color, $this->opacity, $this->radiusX, $this->radiusY);


	}

	// props setter method

    public function setSize($radiusX, $radiusY){

        $this -> radiusX = $radiusX;
        $this -> radiusY = $radiusY;


    }
}
