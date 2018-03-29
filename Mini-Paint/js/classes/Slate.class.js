// **********************************************************************************
// ********************************* Classe Slate ***********************************
// **********************************************************************************

  class Slate {
      constructor(pen){
      // Liste de propriétés:
      // 1) Récupération du <canvas> slate
      // 2) Récupération du contexte du canvas
       this.canvas = document.getElementById('slate');
       this.context = this.canvas.getContext("2d");
       this.leftClickedLocation = null; // Au début on ne sait pas où se trouve la souris donc NULL par défaut
       this.isDrawing = false; // Au début on ne dessine pas DONC BOOLEAN FALSE
       this.pen = pen;

      // 3) Booléen pour déterminer si le click gauche est enfoncé ou non


      // 4) Propriété qui contiendra la position de départ et de fin UNIQUEMENT du tracé


      // 5) Stockage de l'objet crayon

      // Installation des gestionnaires d'évènements de l'ardoise.
          /*
          mousedown
          mouseleave
          mousemove
          mouseup
          */

          this.canvas.addEventListener('mousedown', event => this.onMouseDown(event));
          this.canvas.addEventListener('mouseleave', event => this.isDrawing = false);
          this.canvas.addEventListener('mousemove', event => this.onMouseMove(event));
          this.canvas.addEventListener('mouseup', event => this.isDrawing = false);


          // Méthode de nettoyage de l'ardoise

          document.querySelector('#tool-clear-canvas').addEventListener('click', () => {

            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

          });


  }


// Gestionnaire d'évènement d'appui sur un bouton de la souris.
  // ==>
				// Enregistrement de la position actuelle de la souris.
				// changement état boolean déterminant si click gauche de la souris est enclenché ou non

        onMouseDown(event) {

          //console.log(event.clientX, event.clientY);
          //console.log(event);
          this.leftClickedLocation =  [event.offsetX,event.offsetY];
          this.isDrawing = true;

        }

        onMouseMove(event) {


         if (this.isDrawing) {

            this.context.lineWidth = this.pen.size;
            this.context.strokeStyle = this.pen.color;
            this.context.lineCap = "round";
            this.context.lineJoin = "round";
            this.context.beginPath();
            this.context.moveTo(...this.leftClickedLocation);
            this.context.lineTo(event.offsetX, event.offsetY);
            this.context.stroke();
            this.leftClickedLocation =  [event.offsetX,event.offsetY];
            //console.log(this.context);

          }


        }



}

// Méthode de récupération des coordonnées X,Y de la souris relative à l'ardoise
// ===>
      // Récupération des coordonnées de l'ardoise.
      // Création d'un objet contenant les coordonnées X,Y de la souris relative à l'ardoise.

// Gestionnaire d'évènement de sélection CONTINUE de la souris.

// Gestionnaire d'évènement de sortie de l'ardoise de la souris.

// Gestionnaire d'évènement de déplacement de la souris sur l'ardoise.
// ===>
      // Récupération de la position actuelle de la souris.
      // Est-ce qu'on peut dessiner sur l'adoise ?
      // ===>
          // Préparation de l'ardoise à l'exécution d'un dessin.
          // Début du dessin.
          // Dessine un trait entre les précédentes coordonnées de la souris et les nouvelles.

          // Fin du dessin.
          // Applique les changements dans le canvas.
          // Enregistrement de la nouvelle position de la souris.

// Gestionnaire d'évènement de relachement de sélection de la souris.
