if (window.matchMedia("(max-width: 767px)").matches) {
    // Dispositivos móviles
   
} else {
    // Computadoras
    window.addEventListener('scroll', function() {
      var windowHeight = window.innerHeight;
      var scrollPosition = window.scrollY || window.pageYOffset;
    
      var parallaxBg = document.querySelector('.pas-bg');
    
      // Calcular la mitad de la altura de la página
      var halfPageHeight = windowHeight / 5;
    
      // Verificar si el scroll ha alcanzado la mitad de la página
      if (scrollPosition > halfPageHeight) {
        var backgroundPositionY = -((scrollPosition - halfPageHeight) * 0.3);
        parallaxBg.style.transform = 'translate3d(0, ' + backgroundPositionY + 'px, 0)';
      }
    });
}

function descargarImagen(id) {
  // Realiza una solicitud AJAX para obtener la imagen del servidor
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'php/descargaImagen.php?id=' + id, true);
  xhr.responseType = 'blob';

  xhr.onload = function () {
    if (xhr.status === 200) {
      // Crea un enlace temporal y simula un clic para descargar la imagen
      var url = window.URL.createObjectURL(xhr.response);
      var a = document.createElement('a');
      a.href = url;
      a.download = 'imagen.png';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      window.URL.revokeObjectURL(url);
    }
  };

  xhr.send();
}
