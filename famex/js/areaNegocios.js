window.addEventListener('DOMContentLoaded', function() {
  var tab = document.querySelectorAll('.nav-link');
  tab[0].click();
});

var modal = document.getElementById('myModal');
var currentImageIndex = 0;  // Índice de la imagen actualmente mostrada en el modal
var images = [];  // Array para almacenar las imágenes
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption"); // Mover la declaración aquí

function modalN(imageId) {
  var img = document.getElementById('myImg-' + imageId);
  var src = img.getAttribute("src");
  var alt = img.getAttribute("alt");

  // Actualizar el array de imágenes
  var imageElements = document.querySelectorAll('.image-group img');
  images = Array.from(imageElements).map(function (img) {
    return {
      src: img.getAttribute('src'),
      alt: img.getAttribute('alt')
    };
  });

  // Obtener el índice de la imagen actualmente mostrada en el modal
  currentImageIndex = images.findIndex(function (image) {
    return image.src === src && image.alt === alt;
  });

  modal.style.display = "block";
  modalImg.src = src;
  captionText.innerHTML = alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}

window.addEventListener('keydown', function (event) {
  if (event.key === 'Escape') {
    modal.style.display = "none";
  }
});

// Controlador de evento para el botón "next"
document.getElementById('nextBtn').addEventListener('click', function () {
  var activeTab = document.querySelector('.tab-pane.active'); // Obtener el tab-pane activo
  var imageContainers = activeTab.querySelectorAll('.image-container'); // Obtener los contenedores de imágenes en el tab-pane activo
  var numImages = imageContainers.length; // Obtener el número de imágenes en el tab-pane activo

  currentImageIndex = (currentImageIndex + 1) % numImages;
  var imageContainer = imageContainers[currentImageIndex];
  var img = imageContainer.querySelector('img');
  var src = img.getAttribute('src');
  var alt = img.getAttribute('alt');

  modalImg.src = src;
  captionText.innerHTML = alt;
});

// Controlador de evento para el botón "prev"
document.getElementById('prevBtn').addEventListener('click', function () {
  var activeTab = document.querySelector('.tab-pane.active'); // Obtener el tab-pane activo
  var imageContainers = activeTab.querySelectorAll('.image-container'); // Obtener los contenedores de imágenes en el tab-pane activo
  var numImages = imageContainers.length; // Obtener el número de imágenes en el tab-pane activo

  currentImageIndex = (currentImageIndex - 1 + numImages) % numImages;
  var imageContainer = imageContainers[currentImageIndex];
  var img = imageContainer.querySelector('img');
  var src = img.getAttribute('src');
  var alt = img.getAttribute('alt');

  modalImg.src = src;
  captionText.innerHTML = alt;
});

