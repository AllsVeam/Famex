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
    <link rel="stylesheet" href="css/invHonor.css">
    <link rel="stylesheet" href="css/servicios.css">
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
    if (isset($_SESSION['id'])) {
        include 'menuAdmin.php';
    }
    ?>

    <!-- Informacion general de la Pagina -->
    <div>
        <?php include 'botonesFlo.html' ?>
    </div>
    <div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div class="cont"></div>
        <div class="container-xl-12"><br></div>
        <section class="text-center">
            <?php
            $sql = "SELECT * FROM invitadohonor WHERE id = (SELECT max(id) FROM invitadohonor)";
            $result = mysqli_query($conexion, $sql);
            $mostrar = mysqli_fetch_array($result);
            ?>
            <div style="width:100%;">
                <div class="animation-left" style="width: 80%; margin:auto;">
                    <h1 class="title-conteiner">
                        <div class="decoration-left"></div>
                        <span>Invitado de Honor</span>
                        <div class="decoration-rigth"></div>
                    </h1>
                </div>
            </div>
            <div class="cont-inv">
                <div class="row cont-inv">
                    <!--Imagen-->
                    <?php
                    if ($mostrar['nombre'] == null) {
                    ?>
                        <div class="confirmacion">
                            <h2>Esperando confirmacion</h2>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="col-sm-5 p-0 animation-zoom">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($mostrar['imagen1']) ?>" alt="" class="img-inv">
                        </div>

                        <!--Info del invitadoo-->
                        <div class="col-sm-6 info mt-4 p-0">
                            <div class="mb-4 animation-zoom">
                                <div class="">
                                    <h1 id="invitado" class="text-primary text-shadow">
                                        <?php echo $mostrar['nombre'] ?>
                                    </h1>
                                </div>
                                <div class="container-sm bg-dark " style="height: 1.5px; border-radius: 25%; width: 70%; "></div>
                            </div>
                            <div>
                                <p class="text-justify m-4 animation-zoom">
                                    <?php echo $mostrar['descripcion1'] ?>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="container-sm bg-dark mt-5" style="height: 0.2px; border-radius: 50%; width:60%;"></div>
                            </div>
                            <h4 class="mb-3 mt-3 bold">¿Porque
                                <?php echo $mostrar['nombre'] ?>?
                            </h4>
                            <p class="text-justify m-4">
                                <?php echo $mostrar['descripcion2'] ?>
                            </p>
                            <img src="data:image/jpg;base64, <?php echo base64_encode($mostrar['imagen2']) ?>" alt="" class="mx-auto d-block" style="width:70%; height:400px; object-fit: cover;">
                            <?php echo ($mostrar['descripcion3']) ? '<p class="text-justify m-4"> ' . $mostrar['descripcion3'] . ' </p>' : '' ?>
                            <?php echo ($mostrar['descripcion4']) ? '<p class="text-justify m-4"> ' . $mostrar['descripcion4'] . ' </p>' : '' ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--Apartado sobre el pasaporte-->
        <div class="pasport">
            <footer class="pas-footer" height="200%">
                <div class="pas-bg" style="top: -50%;"></div>
                <div class="row text-white text botones justify-content-center mt-0">
                    <div class="col-sm-6 text-center">
                        <div class="title-tram">
                            <h3>Tramites migratorios</h3>
                        </div>
                        <div class="text-pas m-3">
                            Paises a los que México les solicita visa a portadores de pasaporte ordinario y pasaporte no
                            ordinario
                        </div>
                        <div class="row m-4">
                            <div class="col-sm-6 p-2"><a href="https://www.f-airmexico.com.mx/visasordinarios.pdf" class="btn-slider" target="_blank">Pasaporte ordinario</a></div>
                            <div class="col-sm-6 p-2"><a href="https://failover.www.gob.mx/mantenimiento.html" class="btn-slider" target="_blank">Pasaporte no ordinario</a></div>
                            <div class="container-sm mt-3 bg-light" style="height: 2px; border-radius: 50%; width:80%;"></div>
                        </div>
                    </div>
                    <div class="flex-direction-column col-sm-4 text-center ml-4 mt-5 p-4">
                        <div class="">
                            <h4>Asistse a FAMEX</h4>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="" class="btn-slider btns-baner" target="_blank">Adquiere tu boleto</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div>
        <?php include 'pie.php' ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/invHonor.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
    ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0" nonce="DUfGB1BZ"></script>
</body>

</html>