const firstButton = document.querySelector('input[name="radio"]');
const firstContent = document.getElementById('html-content');

// Mostrar el primer contenido al cargar la página
firstContent.style.display = 'block';

// Obtener todos los elementos de radio y los contenidos
const radioButtons = document.querySelectorAll('input[name="radio"]');
const htmlContent = document.getElementById('html-content');
const reactContent = document.getElementById('react-content');
const vueContent = document.getElementById('vue-content');
const cContent = document.getElementById('c-content');
const dContent = document.getElementById('d-content');
const eContent = document.getElementById('e-content');
const fContent = document.getElementById('f-content');

// Agregar un event listener a cada botón de radio
radioButtons.forEach(function(radioButton) {
  radioButton.addEventListener('change', function() {
    if (this.checked) {
      // Obtener el valor del botón seleccionado
      const selectedValue = this.nextElementSibling.textContent.trim();

      // Ocultar todos los contenidos
      htmlContent.style.display = 'none';
      reactContent.style.display = 'none';
      vueContent.style.display = 'none';
      cContent.style.display = 'none';
      dContent.style.display = 'none';
      eContent.style.display = 'none';
      fContent.style.display = 'none';

      // Mostrar el contenido correspondiente al valor seleccionado
      if (selectedValue === 'Chalets') {
        htmlContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón A') {
        reactContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón B') {
        vueContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón C'){
        cContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón D'){
        dContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón E'){
        eContent.style.display = 'block';
      } else if (selectedValue === 'Pabellón F'){
        fContent.style.display = 'block';
      }
    }
  });
})