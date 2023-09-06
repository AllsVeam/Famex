// Obtener todos los elementos de video
var videos = document.getElementsByClassName('tarjeta');

// Función para verificar si un elemento está visible en la ventana
function isElementVisible(element) {
  var rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
  );
}

// Función para mostrar los videos visibles en la ventana
function showVisibleVideos() {
  for (var i = 0; i < videos.length; i++) {
    if (isElementVisible(videos[i])) {
      videos[i].classList.add('show');
    }
  }
}

// Mostrar los videos visibles cuando se cargue la página y se desplace
window.addEventListener('load', showVisibleVideos);
window.addEventListener('scroll', showVisibleVideos);


function descargarArchivo() {
  var link = document.createElement('a');
  link.href = 'doc/solicitud.docx';
  link.setAttribute('download', 'solicitud de acreditación');
  link.style.display = 'none';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}