'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* ****************************************** DONNEES ****************************************** */
/*************************************************************************************************/
const state = {};
const arrow = document.querySelector(".fa-arrow-right");
const outils = document.querySelector(".toolbar ul");
const pause = document.querySelector(".fa-play");
const slides = [
  {legend:"Vandalisme", path:"images/1.jpg"},
  {legend:"Voitures Flous", path:"images/2.jpg"},
  {legend:"Batiment de mauvais gout", path:"images/3.jpg"},
  {legend:"Nuit et lumières", path:"images/4.jpg"},
  {legend:"Science-Fiction", path:"images/5.jpg"},
  {legend:"Tour Eiffel", path:"images/6.jpg"}
];

/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/

function displayImageAndTitle() {
  document.querySelector("#title").innerHTML = slides[state.indexImage].legend;
  document.querySelector("#slide").src = slides[state.indexImage].path;

}

function nextImage() {
  //console.log('avant if' ,state.indexImage);
  //console.log(`${state.indexImage} === ${slides.length -1}`);

  if (state.indexImage === slides.length -1) {

    state.indexImage = 0;
    //console.log(state.indexImage);
  }else {
    state.indexImage++;

  }

  //console.log('apres if' ,state.indexImage);

   displayImageAndTitle();

}

function previousImage() {

  if (state.indexImage === 0) {

    state.indexImage = slides.length-1;
    console.log(state.indexImage);
  }

  else {
    state.indexImage--;

  }
   displayImageAndTitle();

}

function randomImage() {
  let random = ~~(Math.random()*slides.length);

  if (state.indexImage === random) {

    return randomImage();

  }

  state.indexImage = random;
  displayImageAndTitle();

}

function playImage() {

  if (state.timer) {

    clearInterval(state.timer);
    state.timer=null;

  }
  else {

    state.timer = setInterval(() => randomImage(), 1500);

  }

}
/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

document.addEventListener("DOMContentLoaded", ()=> {
//appel par defaut au chargement de la page
  state.indexImage=0;
  state.timer=null;

  document.addEventListener("keyup", event => {
    //console.log(event);
    if (event.keyCode === 37) {
      previousImage();
    }

    else if (event.keyCode === 39) {
      nextImage();
    }

    else if (event.keyCode === 32) {
      playImage();
    }

  });

  document.querySelector("#toolbar-toggle").addEventListener("click",() => {
    outils.classList.toggle("hidden");
  });


  document.querySelector("#toolbar-toggle").addEventListener("click",() => {
    arrow.classList.toggle("fa-arrow-down");
  });


  document.querySelector("#slider-toggle").addEventListener("click",() => {
    pause.classList.toggle("fa-pause");
  });


  document.querySelector("#slider-next").addEventListener("click",()=>
  nextImage());

  document.querySelector("#slider-previous").addEventListener("click",()=>
  previousImage());

  document.querySelector("#slider-random").addEventListener("click",()=>
  randomImage());

  document.querySelector("#slider-toggle").addEventListener("click",()=>
  playImage());
  //document.querySelector("#slider-toggle").addEventListener("click",()=> {
  //playImage()});


  displayImageAndTitle();
});
