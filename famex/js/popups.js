// Programacion que se le dio a las ventanas Pop Ups y para que cierre presionando ESC o pulsando en cualquie parte de la pantalla
var openButtons = document.getElementsByClassName('openPopup');
var closeButtons = document.getElementsByClassName('closePopup');
var popups = document.getElementsByClassName('overlay');

Array.from(openButtons).forEach(function (button, index) {
    button.addEventListener('click', function () {
        popups[index].style.display = 'block';
    });
});

Array.from(closeButtons).forEach(function (button) {
    button.addEventListener('click', function () {
        var popup = this.closest('.overlay');
        popup.style.display = 'none';
    });
});

window.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        Array.from(popups).forEach(function (popup) {
            popup.style.display = 'none';
        });
    }
});

window.addEventListener('click', function (event) {
    if (!event.target.closest('.popupBody') && !event.target.classList.contains('openPopup')) {
        Array.from(popups).forEach(function (popup) {
            popup.style.display = 'none';
        });
    }
});
// 

// Cerrar el Inicio de sesion flotante con la letra ESC o dando click en cualquie parte de la venta
// document.addEventListener('keydown', function (event) {
//     if (event.key === 'Escape') {
//         // Acción de cierre de la ventana emergente
//         var ventanaEmergente = document.getElementById('cerrar');
//         ventanaEmergente.click(); // Simula un clic en el enlace de cierre
//     }
// });