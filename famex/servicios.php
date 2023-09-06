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
    <title>Servicios | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/invHonor.css">
    <link rel="stylesheet" href="css/servicios.css">
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
    <div class="">
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div>
            <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
            <div class="container-xl-12 cont">.</div>
            <section class="text-center">
                <?php
                $idSer = $_GET['id'];
                $sql = "SELECT * FROM tiposer WHERE id = $idSer";
                $result = mysqli_query($conexion, $sql);
                $titulo = mysqli_fetch_array($result);
                ?>
                <div class="animation-left" style="width: 80%; margin:auto;">
                    <h1 class="title-conteiner">
                        <div class="decoration-left"></div>
                        <span><?php echo $titulo['nombre'] ?></span>
                        <div class="decoration-rigth"></div>
                    </h1>
                </div>
                <?php
                $sql1 = "SELECT * FROM servicios WHERE idTipoSer = $idSer";
                $result1 = mysqli_query($conexion, $sql1);
                ?>
                <div class="row justify-content-center m-2">
                    <?php
                    while ($servicios = mysqli_fetch_array($result1)) {
                        ?>
                        <div class="col-sm-5 mb-5 mt-5 animation-top">
                            <div class="card-servicio d-flex justify-content-center">
                                <div class="servicio d-flex justify-content-center">
                                    <div class="servicio-face">
                                        <img class="card-img-top"
                                            src="data:image/jpg;base64, <?php echo base64_encode($servicios['logo']) ?>"
                                            style=" top:0; object-fit: contain; width:100%; height:200px;">
                                        <div class="container-sm bg-dark mt-4 m-3 mr-3"
                                            style="height: 1px; border-radius: 25%; bottom:0; width:80%; "></div>
                                        <div class="p-3" style="bottom: 0;">
                                            <h3 class="card-title m-2">
                                                <?php echo $servicios['nombre'] ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="servicio-back">
                                        <img class="mt-2"
                                            src="data:image/jpg;base64, <?php echo base64_encode($servicios['baner']) ?>">
                                        <div class="container-sm bg-dark mt-3 ml-3 mr-3"
                                            style="height: 1px; border-radius: 25%; bottom:0; width:80%; "></div>
                                        <div class="btns-baner d-flex justify-content-center">
                                            <a href="<?php echo $servicios['url'] ?>" target="_blank"
                                                class="btn-slider m-3">Ir al sitio</a>
                                            <a class="btn-slider m-3"
                                                href="data:image/jpeg;base64, <?php echo base64_encode($servicios['baner']) ?>"
                                                download="<?php echo $servicios['nombre'] ?>">Descargar</a>
                                        </div>
                                        <div class="container-sm bg-dark  mt-3 "
                                            style="height: 1px; border-radius: 25%; bottom:0;width:50%; "></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
        </div>
        <!--Apartado sobre el pasaporte-->
        <div class="pasport">
            <footer class="pas-footer" height="200%">
                <div class="pas-bg" style="top: -20%;"></div>
                <div class="row text-white text botones justify-content-center ">
                    <div class="col-sm-6 text-center">
                        <div class="mt-3">
                            <h2>Tramites migratorios</h2>
                        </div>
                        <div class="row m-4 d-flex justify-content-center">
                            <div class="col-sm-6 text-align-center p-3"><a
                                    href="https://www.f-airmexico.com.mx/visasordinarios.pdf" class="btn-slider"
                                    target="_blank">Pasaporte ordinario</a></div>
                            <div class="col-sm-6 text-align-center p-3"><a
                                    href="https://failover.www.gob.mx/mantenimiento.html" class="btn-slider "
                                    target="_blank">Pasaporte no ordinario</a></div>
                            <div class="container-sm mt-3 bg-light"
                                style="height: 2px; border-radius: 50%; width:'10px';"></div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <div>
        <?php include 'pie.php' ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/servicios.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
    <!-- Inciniarlizar record de famex 0 al limite -->
    <script src="js/contador_numeros.js" type="text/javascript"></script>

</body>

</html>