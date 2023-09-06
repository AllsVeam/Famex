var contadorElementos = document.getElementsByClassName("contador-elemento");
var incremento = 1;
var tiempo = 1000; // Intervalo de tiempo en milisegundos
var activarIncremento = false; // Variable para controlar si se debe iniciar el incremento

function incrementarContador(contadorElemento, limite, intervalo) {
  var valorActual = parseInt(contadorElemento.innerText);

  if (activarIncremento && valorActual < limite) {
    contadorElemento.innerText = valorActual + incremento;
  } else {
    clearInterval(intervalo);
  }
}

function iniciarContadores() {
  for (var i = 0; i < contadorElementos.length; i++) {
    var contadorElemento = contadorElementos[i];
    var limite = parseInt(contadorElemento.getAttribute("data-cantidad"));
    contadorElemento.style.visibility = "visible";

    // Utilizamos una función anónima para encapsular el intervalo
    (function (contadorElemento, limite) {
      var intervalo = setInterval(function () {
        incrementarContador(contadorElemento, limite, intervalo);
      }, tiempo);
    })(contadorElemento, limite);
  }
}

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
  activarIncremento = true; // Activar el incremento si hay elementos visibles al cargar la página
  iniciarContadores();
} else {
  window.addEventListener("scroll", function () {
    var elementosVisibles = elementosVisiblesEnPantalla();
    if (elementosVisibles.length > 0) {
      activarIncremento = true; // Activar el incremento si hay elementos visibles al hacer scroll
      iniciarContadores();
      window.removeEventListener("scroll", this);
    }
  });
}
