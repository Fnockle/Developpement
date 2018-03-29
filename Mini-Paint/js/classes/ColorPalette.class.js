// **********************************************************************************
// ********************************* Classe ColorPalette ****************************
// **********************************************************************************

class ColorPalette {
  constructor(){
  // Récupération du <canvas>
  // Récupération du contexte du canvas
  this.canvas = document.getElementById('color-palette');
  this.context = this.canvas.getContext("2d");


  this.pickedColor = { red: 0, green: 0, blue: 0 };
  // Dessine la palette de couleurs possibles.

  this.build();

  this.canvas.addEventListener('click', event => this.onClickColor(event));
}

build() {
  // Méthode de construction graphique de la palette de couleurs
  // ===>
  let gradient = this.context.createLinearGradient(0, 0, this.canvas.width, 0);
    // Dégradé rouge -> vert -> bleu horizontal.
    gradient.addColorStop(0,    'rgb(255,   0,   0)');
    gradient.addColorStop(0.15, 'rgb(255,   0, 255)');
    gradient.addColorStop(0.32, 'rgb(0,     0, 255)');
    gradient.addColorStop(0.49, 'rgb(0,   255, 255)');
    gradient.addColorStop(0.66, 'rgb(0,   255,   0)');
    gradient.addColorStop(0.83, 'rgb(255, 255,   0)');
    gradient.addColorStop(1,    'rgb(255,   0,   0)');
    this.context.fillStyle = gradient;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
    gradient = this.context.createLinearGradient(0, 0, 0, this.canvas.height);
    // Dégradé blanc opaque -> transparent -> noir opaque vertical.
    gradient.addColorStop(0,   'rgba(255, 255, 255, 1)');
    gradient.addColorStop(0.5, 'rgba(255, 255, 255, 0)');
    gradient.addColorStop(0.5, 'rgba(0,     0,   0, 0)');
    gradient.addColorStop(1,   'rgba(0,     0,   0, 1)');
    this.context.fillStyle = gradient;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
}


// Méthode de récupération de la couleur sur laquelle l'utilisateur a cliqué

  onClickColor (event) {

    this.leftClickedLocation =  [event.offsetX,event.offsetY];

    return this.context.getImageData(...this.leftClickedLocation, this.canvas.width, this.canvas.height).data;

    //const [r,g,b] = this.context.getImageData(...this.leftClickedLocation, this.canvas.width, this.canvas.height).data;

    //console.log(r,g,b);

    //console.log(event);
  }

}
// Gestionnaire d'évènement de clic sur un pixel de couleur de la palette
// ===>
    // Récupération des coordonnées de la souris au moment du clic.

    /*
     * Création d'un tableau contenant les valeurs RGBA du pixel sur
     * lequel l'utilisateur a cliqué.
     */

    // Enregistrement des valeurs RGB.
