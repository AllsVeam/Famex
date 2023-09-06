//Actualiza el iframe 
function validar(valor) {
  var iframe = document.getElementById('miIframe');
  var etiqueta = document.getElementById('miEtiqueta');
  var altura;

  // Función para abrir el iframe después de la animación
  function openIframe() {
    iframe.style.display = 'block';
  }

  // Función para cerrar el iframe antes de la animación
  iframe.style.display = 'none';

  // Eliminar la propiedad de animación para restablecerla
  iframe.style.animation = '';

  // Agregar animación al iframe después de un breve retraso
  setTimeout(function () {
    iframe.style.animation = 'slide-in 2s forwards';
  }, 10);

  // Verificar el ancho de la pantalla utilizando los Media Queries
  if (window.matchMedia("(max-width: 767px)").matches) {
    // Dispositivos móviles
    switch (valor) {
      case 'preguntasGeneral':
        iframe.src = 'preguntasGeneral.php';
        altura = 105; // Medida para dispositivos móviles
        break;
      case 'preguntasEvento':
        iframe.src = 'preguntasEvento.php';
        altura = 85; // Medida para dispositivos móviles
        break;
      case 'preguntasEntrada':
        iframe.src = 'preguntasEntrada.php';
        altura = 85; // Medida para dispositivos móviles
        break;
      case 'preguntasServicios':
        iframe.src = 'preguntasServicios.php';
        altura = 129; // Medida para dispositivos móviles
        break;
      default:
        iframe.src = 'preguntasOtras.php';
        altura = 66; // Medida para dispositivos móviles
        break;
    }
  } else {
    // Computadoras
    switch (valor) {
      case 'preguntasGeneral':
        iframe.src = 'preguntasGeneral.php';
        altura =60; // Medida para computadoras
        break;
      case 'preguntasEvento':
        iframe.src = 'preguntasEvento.php';
        altura = 49; // Medida para computadoras
        break;
      case 'preguntasEntrada':
        iframe.src = 'preguntasEntrada.php';
        altura = 49; // Medida para computadoras
        break;
      case 'preguntasServicios':
        iframe.src = 'preguntasServicios.php';
        altura = 73; // Medida para computadoras
        break;
      default:
        iframe.src = 'preguntasOtras.php';
        altura = 40; // Medida para computadoras
        break;
    }
  }

  etiqueta.style.height = altura + 'rem';
   // Remover la clase "active" de todos los elementos
  var navLinks = document.getElementsByClassName("nav-link");
  for (var i = 0; i < navLinks.length; i++) {
    navLinks[i].classList.remove("active");
  }

  // Agregar la clase "active" al elemento seleccionado
  var selectedLink = document.querySelector(".nav-link[value='" + valor + "']");
  selectedLink.classList.add("active");
  openIframe();  
}


//A animacion para las pregunatas
document.addEventListener("DOMContentLoaded", function() {
  var cards = document.querySelectorAll(".card-question");
  cards.forEach(function(card) {
    card.addEventListener("click", function() {
      card.classList.toggle("active");
    });
  });
});
