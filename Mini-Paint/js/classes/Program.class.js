// **********************************************************************************
// ********************************* Classe Program *********************************
// **********************************************************************************
//console.log(1);
  class Program {
    constructor(){
    //console.log(2);
    // chargements des autres classes de l'application
    // démarrage de l'application.
    // ===>
        // Installation des gestionnaires d'évènements des outils.
        // Installation des gestionnaires d'évènements de configuration du crayon.
        // Création d'un évènement spécifique à l'application.
        this.pen = new Pen;
        this.slate = new Slate(this.pen);
        this.palette = new ColorPalette;
        document.querySelectorAll('.pen-size').forEach(v =>{
          //console.log(5);
          v.addEventListener('click', () => this.onClickPenSize(v))
        } );

        document.querySelectorAll('.pen-color').forEach(v => v.addEventListener('click', () => this.onClickPenColor(v)));

        document.querySelector('#tool-color-picker').addEventListener('click', () => this.onClickPalette());

        document.querySelector('#color-palette').addEventListener('click', event =>{
          this.pen.rgb = this.palette.onClickColor(event);
        });


        /* INPUT RANGE */
        //console.log("document.querySelector('#largeur_pinceau').value",document.querySelector('#largeur_pinceau').value);
        document.querySelector('#largeur_pinceau').addEventListener('click', () => this.onRangeSize());
}


      /* INPUT RANGE */
    onRangeSize (event) {

      if(!isNaN(this.pen.size)){
        let html="";

        this.pen.size = document.querySelector('#largeur_pinceau').value;

        html += `<p>${this.pen.size} pixels</p>`
        //console.log(html);
        document.querySelector('#output').innerHTML = html;
      }

    }

// Gestionnaire d'évènement de clic sur l'outil de pipette.

    onClickPalette (event) {

      //$('#color-palette').fadeIn("slow");
      $('#color-palette').fadeToggle("slow");

    }

  /*  Program.prototype.onClickColor = function(event) {

      //$('#color-palette').fadeOut("slow");

      this.pen.color = this.palette.onClickColor();

    }*/

// Gestionnaire d'évènement de clic pour sélectionner une couleur de crayon prédéfinie.
// ===>
      // Récupération de la <div> qui a déclenché l'évènement.
      // Récupération de l'attribut HTML5 data-color.
      // Modification de la couleur du crayon.
      onClickPenColor(event) {
       // changer la couleur

       //console.log(event);
       this.pen.color = event.dataset.color;
       //console.log(this.pen);
      }

// Gestionnaire d'évènement de clic pour changer la taille du crayon.
// ===>
      // Récupération du <button> qui a déclenché l'évènement.
      // Récupération de l'attribut HTML5 data-size.
      // Modification de l'épaisseur du crayon.

      onClickPenSize(event) {
       // changer l'épaisseur du tracé

       //console.log(event);
       this.pen.size = event.dataset.size;
       //console.log(this.pen);
      }

}
// Gestionnaire d'évènement de changement de la couleur du crayon.
// ===>
    // Récupération de la couleur sur laquelle l'utilisateur a cliqué.
    // Changement de la couleur RGB du crayon.
    // Disapartion du canvas pipette
