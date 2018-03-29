<?php

/* la classe programme va charger toutes les formes
un peu comme dans l'exo de l'ardoise magique

voici un exemple pour la forme TRIANGLE et les paramètres
qui seront "injectés" depuis Program

*/
const COLORS = ["#000000", "#ff0000", "blue", "green", "purple", "pink", "yellow", "brown", "gold"];

class Program {

    /*public function notARectangle($rand1, $rand2, $amp1, $amp2){

        if ($rand1 === $rand2){

            return $this->notARectangle($rand1, rand($amp1, $amp2), $amp1, $amp2);

        }

        return [$rand1, $rand2];

    }*/



    public function notARectangle($rand1, $rand2, $amp1, $amp2){

        //echo $rand1 .'==='. $rand2;

        if (($rand1 >= $rand2-20 && $rand1 <= $rand2) || ($rand1 <= $rand2 +20 && $rand1 >= $rand2)) {

            return $this->notARectangle($rand1, rand($amp1, $amp2), $amp1, $amp2);

        }

        return [$rand1, $rand2];

    }


  public function __construct(SvgRenderer $renderer) {


    // Création et initialisation d'un rectangle.
      $rectangle1 = new Rectangle();
      $rectangle1 -> setColor(COLORS[rand(0, count(COLORS)-1)]);
      $rectangle1 -> setLocation(rand(20, 500), rand(20, 500));
      //$rectangle1 -> setSize(rand(10, 200), rand(10, 200));
      $rectangle1 -> setSize(...$this->notARectangle(rand(10,300), rand(10,300),10,300));
      $rectangle1 -> setOpacity(1);


    // Création et initialisation d'une ellipse.
      $ellipse1 = new Ellipse();
      $ellipse1 -> setColor(COLORS[rand(0, count(COLORS)-1)]);
      $ellipse1 -> setLocation(rand(200, 400), rand(200, 400));
      //$ellipse1 -> setSize(rand(10, 100), rand(10, 100));
      $ellipse1 -> setSize(...$this->notARectangle(rand(10,300), rand(10,300),10,300));
      $ellipse1 -> setOpacity(0.8);

    // Création et initialisation d'un carré.
      $square1 = new Square();
      $square1 -> setColor(COLORS[rand(0, count(COLORS)-1)]);
      $square1 -> setLocation(rand(20, 500), rand(20, 500));
      $square1 -> setSize(rand(10,250));
      $square1 -> setOpacity(0.5);

    // Création et initialisation d'un cercle.
      $circle1 = new Circle();
      $circle1 -> setColor(COLORS[rand(0, count(COLORS)-1)]);
      //$circle1 -> setColor("green");
      $circle1 -> setLocation(rand(200, 400), rand(200, 400));
      $circle1 -> setSize(rand(10, 100));
      $circle1 -> setOpacity(0.8);

    // Création et initialisation d'un triangle.
      $triangle1 = new Triangle();
      $triangle1->setCoordinates(rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500), rand(0, 500));
      $triangle1->setColor(COLORS[rand(0, count(COLORS)-1)]);
      $triangle1->setOpacity(0.75);

    // Ajout des différents objets géométriques au moteur graphique.
      $renderer->addShape($rectangle1);
      $renderer->addShape($ellipse1);
      $renderer->addShape($square1);
      $renderer->addShape($circle1);
      $renderer->addShape($triangle1);
    // Exécution du moteur graphique.
    $renderer->run();
  }
}
