<?php

class Triangle extends Shape {
  /** @type Point[] $points */

    /*
    la forme triangle a besoin de 3 paires de coordonnées x, y
    qu'on va stocker dans un tableau
    */

  private $points = [];
  public function __construct() {

      // Appel le constructeur de la classe parent, la classe Shape.
      parent::__construct();
      // on stocke les objets point dans un tableau
      $this ->  points = [new Point, new Point, new Point];

  }

  public function draw(SvgRenderer $renderer) {
      // Utilisation de l'objet renderer pour dessiner un triangle avec ses propriétés.
      $renderer->drawTriangle($this->points, $this->color, $this->opacity);
  }

  // setter coordinates method

  public function setCoordinates(...$coordinates){ // va mettre toutes les valeurs dans un tableau

    $this->points[0]->startFrom($coordinates[0], $coordinates[1]);
    $this->points[1]->startFrom($coordinates[2], $coordinates[3]);
    $this->points[2]->startFrom($coordinates[4], $coordinates[5]);


      // il faut arriver à affecter les valeurs venant de l'exterieur (depuis Class Program)
     // aux valeurs x et y de chaques points

  }
}
