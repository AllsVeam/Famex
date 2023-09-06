// Modals alertas dinámicos
function modalEliminar(contenido, id) {
    // Crear el modal
    var modal = document.createElement('div');
    modal.classList.add('modal', 'fade');
    modal.setAttribute('tabindex', '-1');
    modal.setAttribute('role', 'dialog');
    modal.style.zIndex = "1100";

    // Crear el diálogo del modal
    var modalDialog = document.createElement('div');
    modalDialog.classList.add('modal-dialog');

    // Crear el contenido del modal
    var modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    // Crear el encabezado del modal
    var modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    // Crear el texto del título
    var modalTitle = document.createElement("h5");
    modalTitle.classList.add("modal-title", 'text-warning');
    modalTitle.textContent = "¡Atención!";

    // Agregar componentes del título al encabezado del modal
    modalHeader.appendChild(modalTitle);

    // Crear el cuerpo del modal
    var modalBody = document.createElement('div');
    modalBody.classList.add('modal-body', 'fs-5');
    modalBody.textContent = contenido;

    // Crear el cuerpo del modal
    var modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer', 'fs-5');

    // Crear el botón de cerrar del modal
    var closeButton2 = document.createElement("button");
    closeButton2.classList = "btn btn-secondary";
    closeButton2.setAttribute("data-dismiss", "modal");
    closeButton2.textContent = "Cancelar";

    // Crear el botón de confirmar modal
    var confirmButton = document.createElement("button");
    confirmButton.classList = "btn btn-primary";
    confirmButton.setAttribute("data-dismiss", "modal");
    confirmButton.setAttribute("onclick", "preguntar('" + id + "')");
    confirmButton.textContent = "Aceptar";

    modalFooter.appendChild(closeButton2);
    modalFooter.appendChild(confirmButton);

    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
    modalContent.appendChild(modalFooter);

    modalDialog.appendChild(modalContent);

    modal.appendChild(modalDialog);

    // Agregar el modal al documento
    document.body.appendChild(modal);

    // Mostrar el modal
    $(modal).modal("show");
}

// Modals alertas dinámicos recibiendo 2 ids
function modalEliminar2(contenido, id, id2) {
    // Crear el modal
    var modal = document.createElement('div');
    modal.classList.add('modal', 'fade');
    modal.setAttribute('tabindex', '-1');
    modal.setAttribute('role', 'dialog');
    modal.style.zIndex = "1100";

    // Crear el diálogo del modal
    var modalDialog = document.createElement('div');
    modalDialog.classList.add('modal-dialog');

    // Crear el contenido del modal
    var modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    // Crear el encabezado del modal
    var modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    // Crear el texto del título
    var modalTitle = document.createElement("h5");
    modalTitle.classList.add("modal-title", 'text-warning');
    modalTitle.textContent = "¡Atención!";

    // Agregar componentes del título al encabezado del modal
    modalHeader.appendChild(modalTitle);

    // Crear el cuerpo del modal
    var modalBody = document.createElement('div');
    modalBody.classList.add('modal-body', 'fs-5');
    modalBody.textContent = contenido;

    // Crear el cuerpo del modal
    var modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer', 'fs-5');

    // Crear el botón de cerrar del modal
    var closeButton2 = document.createElement("button");
    closeButton2.classList = "btn btn-secondary";
    closeButton2.setAttribute("data-dismiss", "modal");
    closeButton2.textContent = "Cancelar";

    // Crear el botón de confirmar modal
    var confirmButton = document.createElement("button");
    confirmButton.classList = "btn btn-primary";
    confirmButton.setAttribute("data-dismiss", "modal");
    confirmButton.setAttribute("onclick", "preguntar('" + id + "', '" + id2 + "')");
    confirmButton.textContent = "Aceptar";

    modalFooter.appendChild(closeButton2);
    modalFooter.appendChild(confirmButton);

    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
    modalContent.appendChild(modalFooter);

    modalDialog.appendChild(modalContent);

    modal.appendChild(modalDialog);

    // Agregar el modal al documento
    document.body.appendChild(modal);

    // Mostrar el modal
    $(modal).modal("show");
}

// Modals alertas dinámicos para cerrar la sesion
function modalCerrarSesion(contenido) {
    // Crear el modal
    var modal = document.createElement('div');
    modal.classList.add('modal', 'fade');
    modal.setAttribute('tabindex', '-1');
    modal.setAttribute('role', 'dialog');
    modal.style.zIndex = "1100";

    // Crear el diálogo del modal
    var modalDialog = document.createElement('div');
    modalDialog.classList.add('modal-dialog');

    // Crear el contenido del modal
    var modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    // Crear el encabezado del modal
    var modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    // Crear el texto del título
    var modalTitle = document.createElement("h5");
    modalTitle.classList.add("modal-title", 'text-warning');
    modalTitle.textContent = "¡Atención!";

    // Agregar componentes del título al encabezado del modal
    modalHeader.appendChild(modalTitle);

    // Crear el cuerpo del modal
    var modalBody = document.createElement('div');
    modalBody.classList.add('modal-body', 'fs-5');
    modalBody.textContent = contenido;

    // Crear el cuerpo del modal
    var modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer', 'fs-5');

    // Crear el botón de cerrar del modal
    var closeButton2 = document.createElement("button");
    closeButton2.classList = "btn btn-secondary";
    closeButton2.setAttribute("data-dismiss", "modal");
    closeButton2.textContent = "Cancelar";

    // Crear el botón de confirmar modal
    var confirmButton = document.createElement("button");
    confirmButton.classList = "btn btn-primary";
    confirmButton.setAttribute("data-dismiss", "modal");
    confirmButton.setAttribute("onclick", "cerrar()");
    confirmButton.textContent = "Aceptar";

    modalFooter.appendChild(closeButton2);
    modalFooter.appendChild(confirmButton);

    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
    modalContent.appendChild(modalFooter);

    modalDialog.appendChild(modalContent);

    modal.appendChild(modalDialog);

    // Agregar el modal al documento
    document.body.appendChild(modal);

    // Mostrar el modal
    $(modal).modal("show");
}

// Modals alertas dinámicos para restriccion de imagenes
function modalRest(contenido) {
    // Crear el modal
    var modal = document.createElement('div');
    modal.classList.add('modal', 'fade');
    modal.setAttribute('tabindex', '-1');
    modal.setAttribute('role', 'dialog');
    modal.style.zIndex = "1100";

    // Crear el diálogo del modal
    var modalDialog = document.createElement('div');
    modalDialog.classList.add('modal-dialog');

    // Crear el contenido del modal
    var modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    // Crear el encabezado del modal
    var modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    // Crear el texto del título
    var modalTitle = document.createElement("h5");
    modalTitle.classList.add("modal-title", 'text-warning');
    modalTitle.textContent = "¡Atención!";

    // Agregar componentes del título al encabezado del modal
    modalHeader.appendChild(modalTitle);

    // Crear el cuerpo del modal
    var modalBody = document.createElement('div');
    modalBody.classList.add('modal-body', 'fs-5');
    modalBody.textContent = contenido;

    // Crear el cuerpo del modal
    var modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer', 'fs-5');

    // Crear el botón de cerrar del modal
    // var closeButton2 = document.createElement("button");
    // closeButton2.classList = "btn btn-secondary";
    // closeButton2.setAttribute("data-dismiss", "modal");
    // closeButton2.textContent = "Cancelar";

    // Crear el botón de confirmar modal
    var confirmButton = document.createElement("button");
    confirmButton.classList = "btn btn-primary";
    confirmButton.setAttribute("data-dismiss", "modal");
    confirmButton.textContent = "Aceptar";

    // modalFooter.appendChild(closeButton2);
    modalFooter.appendChild(confirmButton);

    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
    modalContent.appendChild(modalFooter);

    modalDialog.appendChild(modalContent);

    modal.appendChild(modalDialog);

    // Agregar el modal al documento
    document.body.appendChild(modal);

    // Mostrar el modal
    $(modal).modal("show");
}

// Modals alertas dinámicos para envio desde php
var params = new URLSearchParams(window.location.search);
var eliminado = params.get('eliminado');
var agregar = params.get('agregar');
var actualizar = params.get('actualizar');
var sesion = params.get('sesion');
var opinion = params.get('opinion');

if (eliminado === '1') {
    // Si el parámetro 'eliminado' es igual a '1', mostramos el modal de alerta
    mostrarAlerta("Registro Eliminado correctamente");
} else if (eliminado === '0') {
    // Si el parámetro 'eliminado incorrectamente' es igual a '1', mostramos el modal de alerta
    mostrarAlerta("El Registro no puede ser eliminado");
} else if (eliminado === '3') {
    // Si el parámetro 'agregar' es igual a '3', mostramos el modal de alerta
    mostrarAlerta("El Registro no puede ser eliminado por que esta siendo utilizado por otros registros");
}

if (agregar === '1') {
    // Si el parámetro 'agregar' es igual a '1', mostramos el modal de alerta
    mostrarAlerta("Registro agregado correctamente");
} else if (agregar === '0') {
    // Si el parámetro 'agregar' es igual a '0', mostramos el modal de alerta
    mostrarAlerta("El Registro no se agrego correctamente");
} else if (agregar === '2') {
    // Si el parámetro 'agregar' es igual a '0', mostramos el modal de alerta
    mostrarAlerta("El correo electronico ya se encuentra registrado");
}

if (actualizar === '1') {
    // Si el parámetro 'actualizar' es igual a '1', mostramos el modal de alerta
    mostrarAlerta("Registro actualizado correctamente");
} else if (actualizar === '0') {
    // Si el parámetro 'actualizar' es igual a '0', mostramos el modal de alerta
    mostrarAlerta("Registro no se puede actualizar correctamente");
}

if (sesion === '0') {
    mostrarAlerta(`Correo o contraseña incorrecta`);
} else if( sesion === '2' ){
    mostrarAlerta(`Su Sesion ah Caducado`);
} else if (sesion != '0' && sesion != null && sesion != '2' ){
    mostrarAlerta(`Bienvenido a Famex ${sesion}`);
}

if (opinion === '1') {
    mostrarAlerta(`Solo se puede enviar una opinion por correo Espera la respuesta`);
} else if( opinion === '0' ){
    mostrarAlerta(`Opinion Enviada`);
}

function mostrarAlerta(contenido) {
    var alerta = document.getElementById('miAlerta');
    var texto = document.getElementById('texto');
    texto.textContent = contenido;
    alerta.style.display = 'block';
}

function cerrarAlerta() {
    var alerta = document.getElementById('miAlerta');
    alerta.style.display = 'none';
}

window.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' || event.key === 'Enter') {
        cerrarAlerta();
    }
});
