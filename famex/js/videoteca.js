if (window.matchMedia("(max-width: 767px)").matches) {
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 3,
            loop: true,
            margin: 5,
            video: true,
            center: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true
        });})

  } else {
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 5, 
            loop: true,
            margin: 5,
            video: true,
            center: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true
        });}
    )
   
  }

 // Capturar el evento de clic en los elementos del slider
var videoItems = document.querySelectorAll('.item-video');
videoItems.forEach(function(videoItem) {
videoItem.addEventListener('click', function() {
    // Obtener la URL del video seleccionado
    var videoUrl = this.querySelector('a').getAttribute('href');

    // Actualizar la fuente del iframe con la URL del video seleccionado
    var videoIframe = document.getElementById('videoIframe');
    videoIframe.src = videoUrl + "?autoplay=1";
});
});


