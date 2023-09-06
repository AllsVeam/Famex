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
    <title>Invitado de Honor | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/videoteca.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
</head>

<body>
    <!-- Barra de navegacion contara con una condicion en la cual cuando un usuario inicie sesion aparece su informacion-->
    <?php
    include 'menu.php';
    if (isset($idUsuario)) {
        include "menuAdmin.php";
    }
    ?>

    <!-- Informacion general de la Pagina -->
    <div>
        <?php include 'botonesFlo.html' ?>
    </div>
    <div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div class="container-xl-12 cont"><br></div>
        <section class="text-center">
            <div class="animation-left" style="width: 80%; margin:auto;">
                <h1 class="title-conteiner">
                    <div class="decoration-left"></div>
                    <span class="title">Videoteca</span>
                    <div class="decoration-rigth"></div>
                </h1>
            </div>
            <div class="animation-top">
                <div class="con-carousel">
                    <div class="owl-carousel owl-theme">
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/jrt2M5XwmTE"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/nfLeApgcsIA"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/wJdkGbXTY8Y"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/eer1afSZE3A"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/FKKgNgyfSmU"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/gVMuYnGUD54"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/I9nJDtk3phI"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/OocJXm0nJjA"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href=" https://www.youtube.com/embed/PGwxp7AevrI"></a></div>
                        <div class="item-video" data-merge="0"><a class="owl-video"
                                href="https://www.youtube.com/embed/Js-bSO8yRLg"></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!--Apartado sobre el pasaporte-->
        <div class="mb-5 animation-zoom">
            <div class="iframe-conteiner d-flex justify-content-center" id="miEtiqueta">
                <iframe id="videoIframe" class="" width="80%" height="500px" src="" title="" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div>
            <?php include 'pie.php' ?>
        </div>
        <!-- scripts creados apra funcion de la pagina -->
        <script src="js/menu.js"></script>
        <script src="js/popups.js"></script>
        <script src="js/contador.js"></script>
        <script src="js/videoteca.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/owl.carousel.js"></script>
        <!-- Consulta para ectraer la fecha del evento -->
        <?php
        include 'contador.php'
            ?>
        <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0" nonce="DUfGB1BZ"></script>
</body>

</html>