if (window.matchMedia("(max-width: 767px)").matches) {
    // Dispositivos móviles
   
} else {
    // Computadoras
    function imagen() {
      var windowHeight = window.innerHeight;
      var scrollPosition = window.scrollY || window.pageYOffset;
    
      var parallaxBg = document.querySelector('.pas-bg');
    
      // Calcular la mitad de la altura de la página
      var halfPageHeight = windowHeight /  1;
    
      // Verificar si el scroll ha alcanzado la mitad de la página
      if (scrollPosition > halfPageHeight) {
        var backgroundPositionY = -((scrollPosition - halfPageHeight) * 0.3);
        parallaxBg.style.transform = 'translate3d(0, ' + backgroundPositionY + 'px, 0)';
      }
    }
    
    var contadorElementos = document.getElementsByClassName("pasport");
    // Detectar si los elementos están visibles en la pantalla
    function elementosVisiblesEnPantalla() {
        var elementosVisibles = [];
        for (var i = 0; i < contadorElementos.length; i++) {
            var rect = contadorElementos[i].getBoundingClientRect();
            var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top <= viewportHeight) {
                elementosVisibles.push(contadorElementos[i]);
            }
        }
        return elementosVisibles;
    }

    // Verificar si los elementos están visibles al cargar la página
    var elementosVisibles = elementosVisiblesEnPantalla();
    if (elementosVisibles.length > 0) {
        imagen();
    } else {
        window.addEventListener("scroll", function () {
            var elementosVisibles = elementosVisiblesEnPantalla();
            if (elementosVisibles.length > 0) {
                imagen();
                window.removeEventListener("scroll", this);
            }
        });
    }
}