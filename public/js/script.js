// SCRIPT PAUSE CAROUSEL
// EN CLIQUANT SUR LE BOUTON PAUSE, ON VERIFIE S'IL A LA CLASS PAUSED OU PAS
$('.btn-customized').on('click', function(){
// SI LE CAROUSEL EST EN LECTURE, ON LE MET EN PAUSE
  if( ! $(this).hasClass('paused') ) {
      $('.carousel').carousel('pause');
      $('.btn-customized').toggleClass('paused');
      $('.btn-customized i').removeClass('fa-pause').addClass('fa-play');
      $(this).blur();
  }
// SINON ON RELANCE LA LECTURE
  else {
      $('.carousel').carousel('cycle');
      $('.btn-customized').toggleClass('paused');
      $('.btn-customized i').removeClass('fa-play').addClass('fa-pause');
      $(this).blur();
  }
});


// SCRIPT SCROLL TOP BUTTON
// EN CLIQUANT SUR LA FLECHE, ON RAMENE LA PAGE EN HAUT
$('#scroll_to_top').on('click',
  function scrollToTop() {
    window.scrollTo(0, 0);
});
// AU CHARGEMENT DE LA PAGE, ON REND INVISIBLE LA FLECHE 
// JUSQU'A CE QUE L'UTILISATEUR AIT SCROLL DE 75px
$(window).scroll(function() {
 
  if($(window).scrollTop() >= 75){
    $("#scroll_to_top").show();     
   }
   else {
    $("#scroll_to_top").hide();
   }
 });


// SCRIPT MAP
// ON UTILISE LA FONCTION DE CREATION DE MAP DE LEAFLET
// ET ON PARAMETRE LES OPTIONS QUE L'ON SOUHAITE
var mymap = L.map('macarte', {
  center: [45.5832236, 1.7206023], 
  zoom: 16,
  scrollWheelZoom: false});
// ON INTEGRE LES INFOS CONCERNANT LE MOTEUR DE RENDU
// ET LES PARAMETRES DE ZOOM MINI ET MAXI
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
      minZoom: 1,
      maxZoom: 20
      }).addTo(mymap);
// ON AJOUTE UN MARQUEUR ET UN POP-UP
var marker = L.marker([45.5832236, 1.7206023]).addTo(mymap);
marker.bindPopup("<b>Au petit creux sympa !</b>").openPopup();