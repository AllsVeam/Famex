const formulario = document.getElementById('myForm');
const inputs = document.querySelectorAll('#myForm input');

var codigoV;

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\u00F1\s]{1,50}$/, // Letras, pueden llevar acentos.
    apellidos: /^[a-zA-ZÀ-ÿ\u00F1\s]{1,50}$/, // Letras, pueden llevar acentos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    token: /^[a-zA-Z0-9]{6}$/,
    nombreEmp: /^[a-zA-ZÀ-ÿ0-9!@#$%^&*()_+,\-.:;'\"<>{}[\]?/\\=~|\s]{2,50}$/,
    paginaWeb: /^(?:[a-zA-ZÀ-ÿñÑ0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,}\.?$/,
    direccion: /^[a-zA-ZÀ-ÿñÑ0-9\s\-\_\.\,\#]{10,50}$/,
    estado: /^[a-zA-ZÀ-ÿñÑ\s]{3,75}$/,
    ciudad: /^[a-zA-ZÀ-ÿñÑ\s]{1,90}$/,
    cp: /^[a-zA-Z0-9]{2,6}$/,
    telefono: /^[0-9-\s]{4,12}$/,
    otro: /^[a-zA-Z0-9À-ÿñÑ\s]{3,}$/
}

const campos = {
    nombre: false,
    apellidos: false,
    email: false,
    token: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "apellidos":
            validarCampo(expresiones.apellidos, e.target, 'apellidos');
            break;
        case "email":
            validarCampo(expresiones.email, e.target, 'email');
            validarEmail();
            validarEmail2();
            validarEmailAlt();
            break;
        case "token":
            validarToken();
            break;
        case "conEmail":
            validarEmail2();
            break;
        case "emailAlt":
            validarCampo(expresiones.email, e.target, 'emailAlt');
            validarEmailAlt();
            break;
        case "nombreEmp":
            validarCampo(expresiones.nombreEmp, e.target, 'nombreEmp');
            break;
        case "paginaWeb":
            validarCampo(expresiones.paginaWeb, e.target, 'paginaWeb');
            break;
        case "direccion":
            validarCampo(expresiones.direccion, e.target, 'direccion');
            break;
        case "estado":
            validarCampo(expresiones.estado, e.target, 'estado');
            break;
        case "ciudad":
            validarCampo(expresiones.ciudad, e.target, 'ciudad');
            break;
        case "cp":
            validarCampo(expresiones.cp, e.target, 'cp');
            break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
        case "telOfi":
            validarCampo(expresiones.telefono, e.target, 'telOfi');
            break;
        case "telMov":
            validarCampo(expresiones.telefono, e.target, 'telMov');
            break;
        case "otro":
            validarCampo(expresiones.otro, e.target, 'otro');
            break;
        case "otro2":
            validarCampo(expresiones.otro, e.target, 'otro2');
            break;
        case "otro3":
            validarCampo(expresiones.otro, e.target, 'otro3');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    var email = document.getElementById('email');

    document.getElementById(`${campo}`).classList.remove('is-invalid');
    document.getElementById(`${campo}`).classList.remove('is-valid');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-xmark', 'text-danger');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-check', 'text-success');
    if (expresion.test(input.value)) {
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        document.getElementById(`${campo}`).classList.add('is-valid');
        document.querySelector(`#grupo__${campo} i`).style.display = 'inline';
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-check', 'text-success');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-xmark', 'text-danger');
        campos[campo] = true;
    } else {
        if (campo === 'nombre') {
            appendAlert('El nombre debe tener al menos <b>1 caracter</b> y únicamente se puede hacer uso de <b>letras (a-zA-Z) y espacios en blanco.</b>', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'apellidos') {
            appendAlert('Los apellidos deben tener al menos <b>1 caracter</b> y únicamente se puede hacer uso de <b>letras (a-zA-Z) y espacios en blanco.</b>', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'estado') {
            appendAlert('El campo de estado debe tener al menos <b>3 caracteres</b> y únicamente se puede hacer uso de <b>letras (a-zA-Z) y espacios en blanco.</b>', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'ciudad') {
            appendAlert('El campo de ciudad debe tener al menos <b>1 caracter</b> y únicamente se puede hacer uso de <b>letras (a-zA-Z) y espacios en blanco.</b>', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'cp') {
            appendAlert('El campo de código postal debe tener al menos <b>2 caracteres</b> y únicamente se puede hacer uso de <b>letras (a-zA-Z) y numeros(0-9).</b>', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'telefono' || campo === 'telOfi' || campo === 'telMov') {
            appendAlert('Este campo debe tener al menos <b>4 caracteres</b> y únicamente puede contener <b>números(0-9), guiones(-) y espacios en blanco</únicamente>.', 'danger', 'fa-circle-xmark');
        }
        if (campo === 'otro' || campo === 'otro2' || campo === 'otro3') {
            appendAlert('Este campo debe tener al menos <b>3 caracteres</b> y únicamente puede contener <b>letras (a-zA-Z), números(0-9) y espacios en blanco</b>.', 'danger', 'fa-circle-xmark');
        }
        document.getElementById(`${campo}`).classList.add('is-invalid');
        document.getElementById(`${campo}`).classList.remove('is-valid');
        document.querySelector(`#grupo__${campo} i`).style.display = 'inline';
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-xmark', 'text-danger');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-check', 'text-success');
        campos[campo] = false;
    }

    if (campos.nombre !== false && campos.apellidos !== false) {
        email.disabled = false;
    } else {
        email.disabled = true;
    }
}

const validarNombre = () => {
    var divEmail = document.querySelector(`#grupo__email #divEmail`);
    var btnVeri = document.querySelector(`#grupo__email #btnVeri`);
    var divBtn = document.querySelector(`#grupo__email #divBtn`);

    if (campos.email === true) {
        divEmail.classList.remove('col-md-12');
        divEmail.classList.add('col-md-8');
        btnVeri.disabled = false;
        divBtn.style.display = 'inline';
    } else {
        divEmail.classList.remove('col-md-8');
        divEmail.classList.add('col-md-12');
        btnVeri.disabled = true;
        divBtn.style.display = 'none';
    }
}

const validarEmail = () => {
    var divEmail = document.querySelector(`#grupo__email #divEmail`);
    var btnVeri = document.querySelector(`#grupo__email #btnVeri`);
    var divBtn = document.querySelector(`#grupo__email #divBtn`);

    if (campos.email === true) {
        divEmail.classList.remove('col-md-12');
        divEmail.classList.add('col-md-8');
        btnVeri.disabled = false;
        divBtn.style.display = 'inline';
    } else {
        divEmail.classList.remove('col-md-8');
        divEmail.classList.add('col-md-12');
        btnVeri.disabled = true;
        divBtn.style.display = 'none';
    }
}

const validarEmail2 = () => {
    const email = document.getElementById('email');
    const conEmail = document.getElementById('conEmail');

    if (email.value !== '') {
        if (email.value === conEmail.value) {
            document.getElementById('conEmail').classList.remove('is-invalid');
            document.getElementById('conEmail').classList.add('is-valid');
            document.querySelector('#grupo__conEmail i').classList.remove('fa-circle-xmark', 'text-danger');
            document.querySelector('#grupo__conEmail i').classList.add('fa-circle-check', 'text-success');
            document.querySelector('#grupo__conEmail').classList.add('mb-4');
            document.querySelector('#grupo__conEmail').style.removeProperty = 'margin-bottom';
            document.querySelector('#grupo__conEmail .invalid-feedback').style.display = 'none';
            campos['email'] = true;
        } else {
            document.getElementById('conEmail').classList.add('is-invalid');
            document.getElementById('conEmail').classList.remove('is-valid');
            document.querySelector('#grupo__conEmail i').classList.add('fa-circle-xmark', 'text-danger');
            document.querySelector('#grupo__conEmail i').classList.remove('fa-circle-check', 'text-success');
            document.querySelector('#grupo__conEmail').classList.remove('mb-4');
            document.querySelector('#grupo__conEmail').style.marginBottom = '40px';
            document.querySelector('#grupo__conEmail .invalid-feedback').style.display = 'inline';
            campos['email'] = false;
        }
    } else {
        document.getElementById('conEmail').classList.remove('is-invalid');
        document.getElementById('conEmail').classList.remove('is-valid');
        document.querySelector('#grupo__conEmail i').classList.remove('fa-circle-xmark', 'text-danger');
        document.querySelector('#grupo__conEmail i').classList.remove('fa-circle-check', 'text-success');
        document.querySelector('#grupo__conEmail').style.removeProperty = 'margin-bottom';
        document.querySelector('#grupo__conEmail .invalid-feedback').style.display = 'none';
    }
}

const validarEmailAlt = () => {
    const email = document.getElementById('email');
    const emailAlt = document.getElementById('emailAlt');

    if (emailAlt.value !== '') {
        if (email.value !== emailAlt.value) {
            document.getElementById('emailAlt').classList.remove('is-invalid');
            document.getElementById('emailAlt').classList.add('is-valid');
            document.querySelector('#grupo__emailAlt i').classList.remove('fa-circle-xmark', 'text-danger');
            document.querySelector('#grupo__emailAlt i').classList.add('fa-circle-check', 'text-success');
            document.querySelector('#grupo__emailAlt').style.removeProperty = 'margin-bottom';
            document.querySelector('#grupo__emailAlt .invalid-feedback').style.display = 'none';
            campos['email'] = true;
        } else {
            document.getElementById('emailAlt').classList.add('is-invalid');
            document.getElementById('emailAlt').classList.remove('is-valid');
            document.querySelector('#grupo__emailAlt i').classList.add('fa-circle-xmark', 'text-danger');
            document.querySelector('#grupo__emailAlt i').classList.remove('fa-circle-check', 'text-success');
            document.querySelector('#grupo__emailAlt').style.marginBottom = '40px';
            document.querySelector('#grupo__emailAlt .invalid-feedback').style.display = 'inline';
            campos['email'] = false;
        }
    } else {
        document.getElementById('emailAlt').classList.remove('is-invalid');
        document.getElementById('emailAlt').classList.remove('is-valid');
        document.querySelector('#grupo__emailAlt i').classList.remove('fa-circle-xmark', 'text-danger');
        document.querySelector('#grupo__emailAlt i').classList.remove('fa-circle-check', 'text-success');
        document.querySelector('#grupo__emailAlt').style.removeProperty = 'margin-bottom';
        document.querySelector('#grupo__emailAlt .invalid-feedback').style.display = 'none';
    }
}

const validarToken = () => {
    const token = document.getElementById('token');
    const conf = document.getElementById('conf');
    var conEmail = document.getElementById('conEmail');

    if (token.value === codigoV) {
        document.getElementById('token').classList.remove('is-invalid');
        document.getElementById('token').classList.add('is-valid');
        document.querySelector('#grupo__token i').classList.remove('fa-circle-xmark', 'text-danger');
        document.querySelector('#grupo__token i').classList.add('fa-circle-check', 'text-success');
        document.querySelector('#grupo__token .invalid-feedback').style.display = 'none';
        conf.disabled = false;
        campos['token'] = true;

        conEmail.disabled = false;

        setTimeout(function () {
            var conEmail = document.getElementById('conEmail');
            conEmail.focus();
        }, 0);
    } else {
        document.getElementById('token').classList.add('is-invalid');
        document.getElementById('token').classList.remove('is-valid');
        document.querySelector('#grupo__token i').classList.add('fa-circle-xmark', 'text-danger');
        document.querySelector('#grupo__token i').classList.remove('fa-circle-check', 'text-success');
        document.querySelector('#grupo__token .invalid-feedback').style.display = 'inline';
        conf.disabled = true;
        campos['token'] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    event.preventDefault(); // Evitar el envío del formulario

    var form = event.target;
    var formData = new FormData(form);

    // Obtener los valores del formulario
    nombre = formData.get('nombre');
    apellidos = formData.get('apellidos');
    email = formData.get('email');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/visitor-Add.php', true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Manejar la respuesta obtenida del archivo PHP
            var response = xhr.responseText;
        } else {
            console.error('Error en la solicitud: ' + xhr.status);
        }
    };

    xhr.onerror = function () {
        console.error('Error en la solicitud');
    };

    xhr.send(formData);

    if (campos.nombre && campos.apellidos && campos.email && campos.token) {
        var paypalModal = document.getElementById('paypalModal');
        $(paypalModal).modal("show");
    } else {
        appendAlert('<b>Error:</b> Por favor rellena el formulario correctamente.', 'danger', 'fa-exclamation-triangle');
    }
});

// Función que realiza el envio del correo para verificación de email
document.getElementById('btnVeri').addEventListener('click', function () {
    // Lógica que se ejecutará si se hace clic en el botón
    var divEmail = document.querySelector(`#grupo__email #divEmail`);
    divBtn.style.display = 'none';
    divEmail.classList.remove('col-md-8');
    divEmail.classList.add('col-md-12');

    codigoV = generarCodigoVerificacion(6);

    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const email = document.getElementById('email').value;
    const token = document.querySelector('#token');

    Email.send({
        SecureToken: '3ee61365-fc69-4fc6-9356-e74f0a28eb6b', //add your token here
        Host: 'smtp.elasticemail.com',
        Username: 'chekotwo11@gmail.com',
        Password: '6E19FA9AD418F91F8492BE8FC54AE4BEC050',
        To: email,
        From: 'chekotwo11@gmail.com',
        Subject: 'Token enviado',
        Body: `<div style='text-align: justify; padding: 3%; background-color: #fff;'>Estimado(a) <b>${nombre} ${apellidos}</b><br>Se le informa que ha sido enviado su token para confirmar que el email que usted proporcionó es correcto<br><b>${codigoV}</b></div>`,
    }).then(
        appendAlert('<b>¡Atención!</b> Se le a enviado un token de verificación a su correo, favor de revisar su carpeta de <b>spam</b>.', 'info', 'fa-circle-info')
    );

    // Enfocar en el campo token
    setTimeout(function () {
        token.focus();
    }, 2000);

});

// Función para generar un código de verificación al azar
function generarCodigoVerificacion(longitud) {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let codigo = '';

    for (let i = 0; i < longitud; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        codigo += caracteres.charAt(indiceAleatorio);
    }
    return codigo;
}

// Select2 giros
$(document).ready(function () { $('#giro').select2(); });
// Select2 cargos
$(document).ready(function () { $('#cargo').select2(); });
// Select2 rubros
$(document).ready(function () { $('#rubro').select2(); });
// Select2 paises
$(document).ready(function () { $('#pais').select2(); });

// Select campoOtros
function mostrarOtroCampo(slectName, divCampoOtro, divSelect, campoOtro) {
    // Variables para identificar los elementos
    var select = document.getElementById(slectName);
    var divCampoOtro = document.getElementById(divCampoOtro);
    var divSelect = document.getElementById(divSelect);

    if (select.value === 'OTRO') { // Condición que evalua sí se selecciona la opción OTRO
        // Se muestra el campo OTRO
        divSelect.classList.remove('col-md-12');
        divSelect.classList.add('col-md-5');
        divCampoOtro.classList.add('mt-4');
        divCampoOtro.style.display = 'block';

        // Enfocar en el campo OTRO
        setTimeout(function () {
            var campoOtro2 = document.getElementById(campoOtro);
            campoOtro2.focus();
        }, 0);
    } else {
        // Se oculta el campo OTRO
        divSelect.classList.remove('col-md-5');
        divSelect.classList.add('col-md-12');
        divCampoOtro.style.display = 'none';
    }
}

document.getElementById('btn-reiniciar').addEventListener('click', function () {
    location.reload(); // Recargar la página
});

// Lada telefonica
const targetNode = document.querySelector('.iti__selected-dial-code');
var lada = document.getElementById('lada');

// Opciones del observador de mutación
const observerOptions = {
    childList: true, // Observar cambios en la lista de hijos
};

// Función a ejecutar cuando se detecte un cambio
const callback = function (mutationsList) {
    for (let mutation of mutationsList) {
        if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
            // Se ha realizado un appendChild() en el elemento deseado
            lada.value = targetNode.innerHTML;
        }
    }
};

// Crear una instancia del observador de mutación
const observer = new MutationObserver(callback);

// Iniciar la observación en el elemento deseado
observer.observe(targetNode, observerOptions);

// $(document).ready(function(){
//     $('#paginaWeb').inputmask("https//www.");
// });