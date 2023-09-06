function mostrarMiniaturas(event) {
    const input = event.target;
    const contenedor = input.parentNode.nextElementSibling.firstElementChild;
    contenedor.innerHTML = ''; // Limpiar el contenedor antes de mostrar las nuevas miniaturas

    const archivos = input.files;
    for (let i = 0; i < archivos.length; i++) {
        const archivo = archivos[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const miniatura = document.createElement('img');
            miniatura.src = e.target.result;
            miniatura.classList.add('miniatura');
            contenedor.appendChild(miniatura);
        };

        reader.readAsDataURL(archivo);
    }
}

// Agregar un listener para el evento 'change' de cada campo de selección de imágenes
const inputImagenes = document.querySelectorAll('.validarLogo');
inputImagenes.forEach((input) => {
    input.addEventListener('change', mostrarMiniaturas);
});

// Agregar un listener para el evento 'change' de cada campo de selección de imágenes
const inputImagenesPais = document.querySelectorAll('.validarBandera');
inputImagenesPais.forEach((input) => {
    input.addEventListener('change', mostrarMiniaturas);
});

// Agregar un listener para el evento 'change' de cada campo de selección de imágenes
const inputImagenesPais2 = document.querySelectorAll('.validarimg');
inputImagenesPais2.forEach((input) => {
    input.addEventListener('change', mostrarMiniaturas);
});

// Agregar un listener para el evento 'change' de cada campo de selección de imágenes
const inputImagenesBan = document.querySelectorAll('.validarBaner');
inputImagenesBan.forEach((input) => {
    input.addEventListener('change', mostrarMiniaturas);
});

// Agregar un listener para el evento 'change' de cada campo de selección de imágenes
const inputImagenesArea = document.querySelectorAll('.validarArea');
inputImagenesArea.forEach((input) => {
    input.addEventListener('change', mostrarMiniaturas);
});