<?php

class SvgRenderer {
  // Tableau de chaînes de caractères de balises SVG.
    private $results;

  // Tableau d'objets géométriques de la classe Shape ou de ses dérivés (= ses enfants).

    private $shapes;

    public function __construct() {
        $this->results = [];
        $this->shapes  = [];
    }

    public function addShape(Shape $shape) {
        // Ajout d'un objet géométrique au tableau d'objets.
        $this->shapes []= $shape;
    }

  // Méthode Ajout d'un objet géométrique au tableau d'objets.

  // draw circle method
	// ===>
      // Création de variables intermédiaires.
      // Ajout d'une balise SVG <circle>

    public function drawCircle(Point $point, $color, $opacity, $radiusX){


        $x = $point->getX();
        $y = $point->getY();

        $this->results []= '<circle cx="'.$x.'" cy="'.$y.'" r="'.$radiusX.'" fill="'.$color.'" opacity="'.$opacity.'" />';



    }

  // draw Ellipse method
	// ===>
      // Création de variables intermédiaires.
      // Ajout d'une balise SVG <ellipse>

    public function drawEllipse(Point $point, $color, $opacity, $radiusX, $radiusY){


        $x = $point->getX();
        $y = $point->getY();

        $this->results []= '<ellipse cx="'.$x.'" cy="'.$y.'" rx="'.$radiusX.'" ry="'.$radiusY.'" fill="'.$color.'" opacity="'.$opacity.'" />';



    }





  // draw rectangle method
	// ===>
    // Création de variables intermédiaires.
    // Ajout d'une balise SVG <rect>

    public function drawRectangle(Point $point, $color, $opacity, $width, $height) {
        //var_dump($point->getX());
        //var_dump($point->getY());

        $x = $point->getX();
        $y = $point->getY();

        $this->results []= '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$color.'" opacity="'.$opacity.'" />';
    }

  // draw triangle method


    public function drawTriangle(array $points, $color, $opacity) {
        /** @type Point[] $points */

        // Création de variables intermédiaires.
        /*for($i = -1; ++$i< count($points);) {
            $a [] = $points[$i]->getX();
            $a [] =  $points[$i]->getY();
        }
        */
        $pointsSvg = '';
        foreach ($points as $point) {
            $pointsSvg .= $point->getX().','.$point->getY().',';
        }

        // Ajout d'une balise SVG <polygon>
        $this->results []= '<polygon points="'.substr($pointsSvg,0, strlen($pointsSvg) -1).'" fill="'.$color.'" opacity="'.$opacity.'" />';
    }


    public function getResult() {
        // Ajout d'un conteneur SVG et concaténation de toutes les chaînes de balises SVG.
        $svgContainer  = '<svg height="600" width="800">';
        $svgContainer .= implode($this->results);
        $svgContainer .= '</svg>';

        return $svgContainer;
    }

    public function run() {
        // Boucle sur le tableau d'objets géométriques.
        //var_dump($this);
        $i = 0;
        foreach($this->shapes as $shape) :
            $i++;

            $shape->draw($this);
        endforeach;
    }

}
