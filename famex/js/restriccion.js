//Esta funcion valida la carga de los descargables 
$(document).ready(function () {
  $('.validaPDF').change(async function () {
    var valPDF = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < valPDF.length; i++) {
      var vPDF = valPDF[i];
      var allowedTypes = ['application/pdf'];
      var maxSizeKB = 1024; // Tamaño máximo permitido: 1MB

      if (!allowedTypes.includes(vPDF.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una Documentos PDF.');
        isValid = false; // Establecer la variable de control a falso
      } else if (vPDF.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 1MB.');
        isValid = false; // Establecer la variable de control a falso
      }
    }
    // Si se encontró que el documeto es inválido, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar el documento'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; // Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});


// Esta funcion nos sirve para el tipo y tamaño de las imagenes de Area de negocios y Espectaculos
$(document).ready(function () {
  $('.validarimg').change(async function () {
    var imagenes = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < imagenes.length; i++) {
      var imagen = imagenes[i];
      var allowedTypes = ['image/jpeg', 'image/png'];
      var maxSizeKB = 1024 * 10; // Tamaño máximo permitido: 10MB

      if (!allowedTypes.includes(imagen.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una imagen JPEG.');
        isValid = false; // Establecer la variable de control a falso
      } else if (imagen.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 10MB.');
        isValid = false; // Establecer la variable de control a falso
      } else {
        const validImage = await loadImage(imagen, $(this));
        if (!validImage) {
          isValid = false; // Si la imagen no cumple con los requisitos, establecemos isValid a falso
        }
      }
    }
    // Si se encontró alguna imagen inválida, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar la imagen'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; // Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});
// Esta funcion nos sirve para las dimensiones de las imagenes de Area de negocios y Espectaculos
async function loadImage(imagen, inputField) {
  return new Promise((resolve, reject) => {
    var _URL = window.URL || window.webkitURL;
    var img = new Image();
    img.src = _URL.createObjectURL(imagen);
    img.onload = function () {
      var ancho = img.width;
      var alto = img.height;
      var altocor = ancho - (ancho / 3);
      var maxWidth = 6000; // Ancho máximo permitido: 6000 píxeles
      var rango = ancho * 0.1;

      if (ancho <= maxWidth) {
        if (alto >= (altocor - rango) && alto <= (altocor + rango)) {
          // Si la imagen cumple con los requisitos, resolvemos la promesa con true
          resolve(true);
        } else {
          modalRest(`El alto de tu imagen excede el límite, esta es la altura correcta que debe tener ${parseInt(altocor)} px (puede ser más grande o pequeño en un cierto rango) conservando el ancho: ${ancho}px.`);
          inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
          // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
          resolve(false);
        }
      } else {
        modalRest('El tamaño de tu imagen excede los límites permitidos (6000px de ancho).');
        inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
        // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
        resolve(false);
      }
    };

    img.onerror = function () {
      modalRest('Error al cargar la imagen.');
      inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
      // Si ocurre un error al cargar la imagen, rechazamos la promesa con el error
      reject('Error al cargar la imagen.');
    };
  });
}


// Esta funcion nos sirve para el tipo y tamaño de las imagenes de Area de negocios y Espectaculos
$(document).ready(function () {
  $('.validarArea').change(async function () {
    var imagenes = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < imagenes.length; i++) {
      var imagen = imagenes[i];
      var allowedTypes = ['image/jpeg'];
      var maxSizeKB = 1024 * 1; // Tamaño máximo permitido: 10MB

      if (!allowedTypes.includes(imagen.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una imagen JPEG.');
        isValid = false; // Establecer la variable de control a falso
      } else if (imagen.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 1MB.');
        isValid = false; // Establecer la variable de control a falso
      } else {
        const validImage = await validarArea(imagen, $(this));
        if (!validImage) {
          isValid = false; // Si la imagen no cumple con los requisitos, establecemos isValid a falso
        }
      }
    }
    // Si se encontró alguna imagen inválida, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar la imagen'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; // Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});
// Esta funcion nos sirve para las dimensiones de las imagenes de Area de negocios y Espectaculos
async function validarArea(imagen, inputField) {
  return new Promise((resolve, reject) => {
    var _URL = window.URL || window.webkitURL;
    var img = new Image();
    img.src = _URL.createObjectURL(imagen);
    img.onload = function () {
      var ancho = img.width;
      var alto = img.height;
      var maxAncho = 1920;
      var maxAlto = 1240;

      if (ancho === maxAncho && alto === maxAlto) {
        // Si la imagen cumple con los requisitos, resolvemos la promesa con true
        resolve(true);
      } else {
        modalRest(`Tu imagen debe tener un tamaño de ${maxAncho} x ${maxAlto} px.`);
        inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
        // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
        resolve(false);
      }
    };

    img.onerror = function () {
      modalRest('Error al cargar la imagen.');
      inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
      // Si ocurre un error al cargar la imagen, rechazamos la promesa con el error
      reject('Error al cargar la imagen.');
    };
  });
}


// Esta funcion valida los Logos que debera llevar cuando se crean Las Famex.
$(document).ready(function () {
  $('.validarLogo').change(async function () {
    var imagenes = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < imagenes.length; i++) {
      var imagen = imagenes[i];
      var allowedTypes = ['image/png'];
      var maxSizeKB = 1024; // Tamaño máximo permitido: 1MB

      if (!allowedTypes.includes(imagen.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una imagen PNG.');
        isValid = false; // Establecer la variable de control a falso
      } else if (imagen.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 1MB.');
        isValid = false; // Establecer la variable de control a falso
      } else {
        const validImage = await validarLogo(imagen, $(this));
        if (!validImage) {
          isValid = false; // Si la imagen no cumple con los requisitos, establecemos isValid a falso
        }
      }
    }
    // Si se encontró alguna imagen inválida, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar la imagen'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; //   Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});
// Esta funcion nos valida el tamaño en pixeles de los logos de la famex
async function validarLogo(imagen, inputField) {
  return new Promise((resolve, reject) => {
    var _URL = window.URL || window.webkitURL;
    var img = new Image();
    img.src = _URL.createObjectURL(imagen);
    img.onload = function () {
      var ancho = img.width;
      var alto = img.height;
      var maxAncho = 3300;
      var maxAlto = 2550;

      if (ancho === maxAncho && alto === maxAlto) {
        // Si la imagen cumple con los requisitos, resolvemos la promesa con true
        resolve(true);
      } else {
        modalRest(`Tu imagen debe tener un tamaño de ${maxAncho} x ${maxAlto} px.`);
        inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
        // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
        resolve(false);
      }
    };

    img.onerror = function () {
      modalRest('Error al cargar la imagen');
      inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
      // Si ocurre un error al cargar la imagen, rechazamos la promesa con el error
      reject('Error al cargar la imagen');
    };
  });
}


// Esta funcion valida tipo y tamaño de la bandera que debera llevar cuando se agregan los paises participantes
$(document).ready(function () {
  $('.validarBandera').change(async function () {
    var imagenes = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < imagenes.length; i++) {
      var imagen = imagenes[i];
      var allowedTypes = ['image/jpeg', 'image/png'];
      var maxSizeKB = 1024; // Tamaño máximo permitido: 1MB

      if (!allowedTypes.includes(imagen.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una imagen JPEG o JPG.');
        isValid = false; // Establecer la variable de control a falso
      } else if (imagen.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 1MB.');
        isValid = false; // Establecer la variable de control a falso
      } else {
        const validImage = await validarBandera(imagen, $(this));
        if (!validImage) {
          isValid = false; // Si la imagen no cumple con los requisitos, establecemos isValid a falso
        }
      }
    }
    // Si se encontró alguna imagen inválida, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar la imagen'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; //   Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});
// Esta funcion nos sirve para las dimensiones de las imagenes del pais invitado
async function validarBandera(imagen, inputField) {
  return new Promise((resolve, reject) => {
    var _URL = window.URL || window.webkitURL;
    var img = new Image();
    img.src = _URL.createObjectURL(imagen);
    img.onload = function () {
      var ancho = img.width;
      var alto = img.height;
      var maxAncho = 800;
      var maxAlto = 450;

      if (ancho === maxAncho && alto === maxAlto) {
        // Si la imagen cumple con los requisitos, resolvemos la promesa con true
        resolve(true);
      } else {
        modalRest(`Tu imagen debe tener un tamaño de ${maxAncho} x ${maxAlto} px.`);
        inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
        // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
        resolve(false);
      }
    };

    img.onerror = function () {
      modalRest('Error al cargar la imagen');
      inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
      // Si ocurre un error al cargar la imagen, rechazamos la promesa con el error
      reject('Error al cargar la imagen');
    };
  });
}


// Esta funcion valida los Baner de los Servicios participantes
$(document).ready(function () {
  $('.validarBaner').change(async function () {
    var imagenes = $(this).get(0).files;
    var isValid = true; // Variable de control

    for (var i = 0; i < imagenes.length; i++) {
      var imagen = imagenes[i];
      var allowedTypes = ['image/jpeg'];
      var maxSizeKB = 1024; // Tamaño máximo permitido: 1MB

      if (!allowedTypes.includes(imagen.type)) {
        modalRest('Tipo de archivo no permitido. Por favor, selecciona una imagen JPEG.');
        isValid = false; // Establecer la variable de control a falso
      } else if (imagen.size > maxSizeKB * 1024) {
        modalRest('El tamaño del archivo excede el límite permitido de 1MB.');
        isValid = false; // Establecer la variable de control a falso
      } else {
        const validImage = await validarBaner(imagen, $(this));
        if (!validImage) {
          isValid = false; // Si la imagen no cumple con los requisitos, establecemos isValid a falso
        }
      }
    }
    // Si se encontró alguna imagen inválida, no se envía el formulario
    if (!isValid) {
      $(this).val(''); // Limpiar el campo de entrada de archivo correspondiente
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input

      label.innerHTML = 'Error al cargar la imagen'; // Texto indicativo de error
      label.classList.remove('selected'); // Removemos la clase 'selected' del label
      label.classList.add('errorImg'); // Agregamos la clase 'errorImg' al label
      return false; //   Agregamos la clase 'errorImg' al label      
    } else {
      const label = this.nextElementSibling; // Obtenemos el siguiente elemento (label) del input
      const archivos = this.files;
      const nombreArchivo = archivos[0].name;
      label.innerHTML = nombreArchivo;
      label.classList.remove('errorImg'); // Removemos la clase 'selected' del label
      label.classList.add('selected'); // Agregamos la clase 'selected' al label
    }
  });
});
// Esta funcion nos sirve para las dimensiones del baner de los servicios
async function validarBaner(imagen, inputField) {
  return new Promise((resolve, reject) => {
    var _URL = window.URL || window.webkitURL;
    var img = new Image();
    img.src = _URL.createObjectURL(imagen);
    img.onload = function () {
      var ancho = img.width;
      var alto = img.height;
      var maxAncho = 800;
      var maxAlto = 1040;

      if (ancho === maxAncho && alto === maxAlto) {
        // Si la imagen cumple con los requisitos, resolvemos la promesa con true
        resolve(true);
      } else {
        modalRest(`Tu imagen debe tener un tamaño de ${maxAncho} x ${maxAlto} px`);
        inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
        // Si la imagen no cumple con los requisitos, resolvemos la promesa con false
        resolve(false);
      }
    };

    img.onerror = function () {
      modalRest('Error al cargar la imagen');
      inputField.val(''); // Limpiar el campo de entrada de archivo correspondiente
      // Si ocurre un error al cargar la imagen, rechazamos la promesa con el error
      reject('Error al cargar la imagen');
    };
  });
}