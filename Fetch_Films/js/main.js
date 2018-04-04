/* FONCTIONS */

function fetchArticles() {
  fetch('php/1-get-html-article.htm').then(r => r.text()) // récupération de la ressource textuelle
  .then(r => document.querySelector('#target').innerHTML = r) // affichage html
  .catch(e => console.warn(e)); // gestion de potentielles erreurs

}


function fetchContacts() {
  //console.log(54);

  fetch('php/2-get-json-data.php').then(r => r.json()) // récupération de la ressource textuelle
  .then(r => {
    //console.log(r);

    /*let html="";
    r.forEach(contact => {
      html += `<p>Nom : ${contact.Nom} Âge : ${contact.Age} Numéro : ${contact.Numero}</p>`;
    });
    document.querySelector('#target').innerHTML = html;*/

    /* OU */
      let html="";
      //console.log(r);
      r.forEach(contact => {

       for(  const [k,v] of Object.entries(contact)){
          //console.log(k, v);
          html += `<p style="display:inline; padding:10px"><b>${k} :</b> ${v}</p>`
       }
       html += '<br>';
      });

      // affichage html
      document.querySelector('#target').innerHTML = html;

 }).catch(e => console.warn(e)); // gestion de potentielles erreurs

}


function fetchMovies() {

    fetch('php/3-get-html-movies.php').then(r => r.json())
    .then(r => {
      let html = "";
      //console.log(Array.isArray(r));
      //console.log(r);

      r.forEach(movies => {
        html += `<article class="movies">`

      for (const [key, value] of Object.entries(movies)) {

          //console.log(key);
          //console.log(value);

          if (key === "cover") {
            html += `<img src ="${value}"/>`
          } else if (key === "duration") {
              html += `<p>${value}</p>`
          }else if(key==="nom"){
               html += `<p>${value}</p>`

          }

      }
      html += `</article>`
      });


      document.querySelector('#target').innerHTML = html;

    }).catch(e => console.warn(e));

  }

function submit(){

let radioChoice = $('input[name=choice]:checked').val();

    switch (radioChoice) {

      case '1':
        fetchArticles();
        break;


      case '2':
        fetchContacts();
        break;


      case '3':
        fetchMovies();
        break;

    }

}

/* CODE PRINCIPAL */

$(function()
{
    $('#run').on('click', submit);
});
