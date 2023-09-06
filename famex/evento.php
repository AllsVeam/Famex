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
    <title>Evento | Feria Aeroespacial México</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logofamexcolores.ico">
    <link rel="apple-touch-icon" href="img/logofamexcolores.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logofamexcolores72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logofamexcolores114x114.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Hojas de estilo personalizadas -->
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/flotante.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/popup-redes.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/evento.css">
    <!-- Fonts -->

    <!-- scrips que llevara la pagina -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    <div class="cont">
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div class="container-xl-12 m-3"><br></div>
        <section class="text-center">
            <div class="animation-left" style="width: 80%; margin:auto;">
                <h1 class="title-conteiner">
                    <div class="decoration-left"></div>
                    <span class="">Evento</span>
                    <div class="decoration-rigth"></div>
                </h1>
            </div>
            <div class="cont-map animation-rigth">
                <div class="container-sm title">
                    <h4 style="padding-top: 1.9rem">Direccion</h4>
                </div>
                <div style="height: 0.1px;"></div>
                <div class="mrg">
                    <div class="row cont-map ">
                        <div class="col-sm-6 p-4">
                            <div class="m-4"><br><br><br><i class="icon-location"></i> Zumpango de Ocampo,
                                México<br><br><br><br><br></div>
                            <div class="button m-2"><button class="location" id="boton-maps">Mostrar Recorrido</button>
                            </div>
                        </div>
                        <!--Pintar maps-->
                        <div class="col-sm-5 top">
                            <div id="map-container" class="z-depth-1 wow fadeIn" style="height: 19rem; width:100%;">
                            </div>
                            <p></p>
                        </div>
                    </div>
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
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script src="js/mapa.js"></script>
    <script>
        document.getElementById("boton-maps").addEventListener("click", function() {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                var destino = "Base Aérea Militar No. 1, Zumpango de Ocampo, Estado de México"; // Reemplaza con la dirección a la que deseas obtener las indicaciones

                var url = "https://www.google.com/maps/dir/" + lat + "," + lng + "/" + encodeURIComponent(destino);

                window.open(url, "_blank");
            });
        });
    </script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
    ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0" nonce="DUfGB1BZ"></script>
</body>

</html>