// En esta parte le damos programacion a la barra de navegacion
//  seleccionamos los dos elementos que serán clickables
const toggleButton = document.getElementById("button-menu");
const navWrapper = document.getElementById("nav");
/* 
  cada ves que se haga click en el botón 
  agrega y quita las clases necesarias 
  para que el menú se muestre.
*/
toggleButton.addEventListener("click", () => {
  toggleButton.classList.toggle("close");
  navWrapper.classList.toggle("show");
});
/* 
  Cuándo se haga click fuera del contenedor de enlaces 
  el menú debe esconderse.
*/
navWrapper.addEventListener("click", e => {
  if (e.target.id === "nav") {
    navWrapper.classList.remove("show");
    toggleButton.classList.remove("close");
  }
});
//

window.addEventListener('scroll', function () {
  var header = document.querySelector('.header');
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > 0) {
    header.style.height = '60px';
    header.style.backgroundColor = 'linear-gradient(to bottom, rgba(4, 44, 97, 0.712), rgba(34, 95, 138, 0.938), rgba(14, 71, 122, 0.914));';
  } else {
    header.style.height = '100px';
    header.style.backgroundColor = 'linear-gradient(to bottom, rgba(4, 44, 97, 0.712), rgba(34, 95, 138, 0.938), rgba(14, 71, 122, 0.914))';
  }
});


window.addEventListener('scroll', function () {
  var menuAdmin = document.querySelector('.menuAdmin');
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > 0) {
    menuAdmin.style.marginTop = '-40px';
    menuAdmin.style.transition = 'margin-top .3s'
  } else {
    menuAdmin.style.marginTop = '0px';
  }
});