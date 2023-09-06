<?php
include 'php/conexion.php';
include 'php/sesionActVis.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas frecuentes | Feria Aeroespacial México</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logofamexcolores.ico">
    <link rel="apple-touch-icon" href="img/logofamexcolores.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logofamexcolores72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logofamexcolores114x114.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Hojas de estilo personalizadas -->
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/flotante.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/popup-redes.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/preguntasF.css">
    <!-- Fonts -->

    <!-- scrips que llevara la pagina -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a72414fc5b.js" crossorigin="anonymous"></script>
    <script>
        function validar(value) {
            // Aquí colocas el código de tu función validar()
            console.log("Se llamó a la función validar() con el valor: " + value);
        }

        // Esta función se ejecutará cuando se cargue la página
        window.onload = function () {
            var primerElemento = document.querySelector(".nav-link");
            var valor = primerElemento.getAttribute("value");
            validar(valor);
        };
    </script>
</head>

<body>
    <!-- Barra de navegacion contara con una condicion en la cual cuando un usuario inicie sesion aparece su informacion-->
    <?php
    include 'menu.php'
        ?>
    <!-- Informacion general de la Pagina -->
    <div>
        <?php include 'botonesFlo.html' ?>
    </div>
    <div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div class="container-xl-12"><br></div>
        <section class="text-center cont">
            <div class="animation-left" style="width: 80%; margin:auto;">
                <h1 class="title-conteiner">
                    <div class="decoration-left"></div>
                    <span class="title">Preguntas Frecuentes</span>
                    <div class="decoration-rigth"></div>
                </h1>
            </div>
            <div class="justify-content-center"><br>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" value="preguntasGeneral"
                            onclick="validar(this.getAttribute('value'))">Información general de FAMEX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" value="preguntasEvento"
                            onclick="validar(this.getAttribute('value'))">Eventos y actividades</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" value="preguntasEntrada"
                            onclick="validar(this.getAttribute('value'))">Entradas y accesos a la feria</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" value="preguntasServicios"
                            onclick="validar(this.getAttribute('value'))">Servicios y facilidade en la feria</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" value="preguntasOtras" onclick="validar(this.getAttribute('value'))">Otras
                            preguntas</a>
                    </li>
                    </li>
                </ul>
            </div>
            <!--Aqui se manda a traer los html con las preguntas-->
            <div class="">
                <div id="miEtiqueta" width="100%" style="max-width:100%">
                    <iframe class="" scrolling="no" id="miIframe" src="" seamless></iframe>
                </div>
            </div>
        </section>
    </div>
    <div>
        <?php include 'pie.php' ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/preguntasF.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>

</body>

</html>