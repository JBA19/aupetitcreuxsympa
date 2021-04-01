// SCRIPT CAROUSEL

var myCarousel = document.querySelector('#carouselCaption')
var carousel = new bootstrap.Carousel(myCarousel, {
  pause: 'false'
});

$('.btn-customized').on('click', function(){
 
  if( ! $(this).hasClass('paused') ) {
      $('.carousel').carousel('pause');
      $('.btn-customized').toggleClass('paused');
      $('.btn-customized i').removeClass('fa-pause').addClass('fa-play');
      $(this).blur();
  }
  else {
      $('.carousel').carousel('cycle');
      $('.btn-customized').toggleClass('paused');
      $('.btn-customized i').removeClass('fa-play').addClass('fa-pause');
      $(this).blur();
  }
});


// SCRIPT SCROLL TOP BUTTON

// Set a variable for our button element.
const scrollToTopButton = document.getElementById('js-top');

// Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
const scrollFunc = () => {
  // Get the current scroll value
  let y = window.scrollY;
  
  // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
  if (y > 0) {
    scrollToTopButton.className = "top-link show";
  } else {
    scrollToTopButton.className = "top-link hide";
  }
};

window.addEventListener("scroll", scrollFunc);

const scrollToTop = () => {
  // Let's set a variable for the number of pixels we are from the top of the document.
  const c = document.documentElement.scrollTop || document.body.scrollTop;
  
  // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
  // We'll also animate that scroll with requestAnimationFrame:
  // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
  if (c > 0) {
    window.requestAnimationFrame(scrollToTop);
    // ScrollTo takes an x and a y coordinate.
    // Increase the '10' value to get a smoother/slower scroll!
    window.scrollTo(0, c - c / 5);
  }
};

// When the button is clicked, run our ScrolltoTop function above!
scrollToTopButton.onclick = function(e) {
  e.preventDefault();
  scrollToTop();
}

// SCRIPT MAP

var lat = 45.5832236;
var lon = 1.7206023;
var macarte = null;
// Fonction d'initialisation de la carte
function initMap() {
// Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
macarte = L.map('map', {
  center: [lat, lon],
  zoom: 15,
  scrollWheelZoom: false
});
// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
  // Il est toujours bien de laisser le lien vers la source des données
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
    }).addTo(macarte);
  var marker = L.marker([lat, lon]).addTo(macarte);
}
window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
	initMap(); 
};