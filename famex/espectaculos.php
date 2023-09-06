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
    <title>Espectaculos | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/areaNegocios.css">
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
        <div class="container-xl-12 cont"><br></div>
        <section class="text-center">
            <div class="animation-left" style="width: 80%; margin:auto;">
                <h1 class="title-conteiner">
                    <div class="decoration-left"></div>
                    <span class="title">Espectáculos</span>
                    <div class="decoration-rigth"></div>
                </h1>
            </div>
            <div class="d-flex justify-content-center mt-2 animation-rigth">
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    $sql = "SELECT * FROM famex";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                        // Se requirio realizar una colsuta para poder traer el nombre del idFamex
                        ?>

                        <li class="nav-item">
                            <a id="<?php echo $mostrar['id'] ?>" class="nav-link" data-toggle="tab"
                                href="#famex-<?php echo $mostrar['id'] ?>">
                                <?php echo $mostrar['nombre'] ?>
                            </a>
                        </li>
                        <?php

                    }
                    ?>
                </ul>
            </div>

            <div class="col-sm-12 tab-content mb-2">
                <?php
                $sql = "SELECT * FROM famex";
                $result = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_array($result)) {
                    // Se requirio realizar una colsuta para poder traer el nombre del idFamex
                    ?>

                    <div class="tab-pane fade image-group" id="famex-<?php echo $mostrar['id'] ?>" role="tabpanel"
                        aria-labelledby="famex-tab-<?php echo $mostrar['id'] ?>">
                        <div class="row mt-0 justify-content-center mb-3 ml-5 mr-5">
                            <?php
                            $baseN = "SELECT * FROM espectaculos WHERE idFamex = '" . $mostrar['id'] . "'";
                            $resultN = mysqli_query($conexion, $baseN);

                            while ($mostrarN = mysqli_fetch_array($resultN)) {
                                ?>
                                <div class="col-sm-4 position-relative mt-5 image-container justify-content-center">
                                    <div class="ring">
                                        <div class="card card1"
                                            style="background-image: url('data:image/jpg;base64, <?php echo base64_encode($mostrarN['imagen']) ?>');">
                                            <img id="myImg-<?php echo $mostrarN['id']; ?>"
                                                src="data:image/jpg;base64, <?php echo base64_encode($mostrarN['imagen']); ?>"
                                                alt="<?php echo $mostrarN['descripcion']; ?>" style="display:none;">
                                        </div>
                                        <div class="border-card">
                                            <div class="slide">
                                                <div class="mt-2 mb-2 conteiner-text">
                                                    <p class="descripcion">
                                                        <?php echo $mostrarN['descripcion'] ?>
                                                    </p>
                                                </div>
                                                <div class="m-1 conteiner-btn">
                                                    <button class="btn-slider" value="<?php echo $mostrarN['id'] ?>"
                                                        onclick="modalN(this.getAttribute('value'), <?php echo $mostrar['id'] ?>)">Galeria</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php

                }
                ?>
            </div>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <div class="prev-next">
                    <span id="prevBtn" class="left">&#60;</span>
                    <span id="nextBtn" class="right">></span>
                </div>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
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
    <script src="js/areaNegocios.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
</body>

</html>