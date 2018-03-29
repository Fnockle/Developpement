// **********************************************************************************
// ********************************* Classe Pen *************************************
// **********************************************************************************


class Pen {
  constructor(){
      // propriété couleur du tracé
      // propriété épaisseur du tracé
      this.color = 'black';
      this.size = '2';

  }
  // Méthode de configuration de la couleur du crayon avec les trois composantes RGB

  set rgb(rgb) {

    console.log(rgb.join());
    this.color = `rgb(${rgb.slice(0,3).join()})`;

  }

}
//Méthode de préparation de l'ardoise à l'exécution d'un dessin avec le crayon
/*
cette méthode dépend normalement de la REPONSBILITÉ de la classe Slate
et n'a pas sa place ici
car ce sont des propriétés qui s'appliquent au canvas Slate
*/

/*
les 2 méthodes suivantes sont facultatives car ce sont de simples setter
sur une propriété modifiable de l'extérieur à la volée
*/
// Méthode de configuration de la couleur du crayon (valeur HTML hexadécimale ou nom de couleur CSS prédéfini)
// Méthode de configuration de l'épaisseur du crayon.
