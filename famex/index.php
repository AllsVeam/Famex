<?php
include 'php/conexion.php';
include 'php/sesionActVis.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>       
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMEX | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/world.css">
    <link rel="stylesheet" href="css/cards.css">
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

    <!-- franga que limita el banner de la informacion -->
    <div class="cont" style="margin-bottom: -.8rem;"></div>
    <!-- Este carrusel solo se encontrara en el inicio de la pagina -->
    <div style="width: 100%;" style="height: 30%; ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active img1">
                    <img class="d-block w-100 position-relative" src="img/Fotos-Lider-17.jpg" alt="First slide"
                        style="height: 700px; filter: brightness(0.5); object-fit: cover;">
                    <div class=" carousel-caption  contents mb-4">
                        <div class="name">Bienvenido</div>
                        <!-- <img src="data:image/jpg;base64, <?php echo base64_encode($logo3) ?>"> -->
                        <img src="<?php echo $logo3 != null ? 'data:image/jpg;base64,' . base64_encode($logo3) : 'img/logofamexcolores.png' ?>">
                        <a href="registro.html" target="_blank">
                            <button>COMPRAR BOLETO</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item img2">
                    <img class="d-block w-100" src="img/image2.jpg" alt="Second slide"
                        style="height: 700px; filter: brightness(0.5); object-fit: cover;">
                    <div class=" carousel-caption contents mb-3">
                        <div class="des">
                            <h1>¡TE ESPERAMOS!</h1>
                        </div>
                        <a href="registro.html" target="_blank">
                            <button>COMPRAR BOLETO</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item img3">
                    <img class="d-block w-100" src="img/image3.jpg" alt="Third slide"
                        style="height: 700px; filter: brightness(0.5); object-fit: cover;">
                    <div class=" carousel-caption contents mb-3">
                        <div class="des">
                            <h1>ADQUIERE TUS BOLETOS</h1>
                        </div>
                        <a href="registro.html" target="_blank">
                            <button>COMPRAR BOLETO</button>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Informacion general de la Pagina -->
    <div>
        <?php include 'botonesFlo.html' ?>
    </div>
    <div class="">
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <section class="info" style="width: 100%;">
            <div class="sliderIm">
                <!-- <img src="data:image/jpg; base64, <?php echo base64_encode($logo1) ?>" alt=""> -->
                <img src="<?php echo $logo1 != null ? 'data:image/jpg;base64,' . base64_encode($logo1) : 'img/logofamexcolores.png' ?>"
                    alt="">
            </div>
            <div class="nosotros">
                <div class="slider">
                    <h5> Feria Aeroespacial Mexico</h5>
                    <div class="slider-content active">
                        <h3> Nosotros</h3>
                        <p>
                        <p>La Feria Aeroespacial de México, FAMEX, es una actividad comercial de ámbito aeronáutico civil, militar, de seguridad y defensa cuyo objetivo es reunir a los líderes de estos sectores para favorecer el intercambio comercial e impulsar el crecimiento de la industria aeroespacial en México.
Permite a visitantes y expositores conocer nuevas tecnologías, realizar el lanzamiento de productos y servicios del sector, incentivando así las oportunidades de negocios. Además, se imparten jornadas académicas para promover la capacitación del personal que labora en el ámbito aeronáutico.
                           
                        </p>
                    </div>
                    <div class="slider-content">
                        <h3>Misión</h3>
                        <p>Establecer una Feria Aeroespacial, de Seguridad y Defensa sustentable, con prestigio y liderazgo en la comunidad aeronáutica mundial, que promueva la  industria aeronautica, aviación civil y militar así como tecnologías de defensa y espaciales.
                        </p>
                    </div>
                    <div class="slider-content">
                        <h3>Visión </h3>
                        <p>Ser un centro de negocios, de intercambio tecnológico y servicios que promueva en México la Inversión Extranjera Directa, la generación de empleos y el desarrollo de capital humano que sustente el crecimiento
Aeronáutico Nacional.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Record Famex -->
        <!-- Record Famex -->
        <section class="record">
            <div>
                <h1 id="titulo">RECORD FAMEX</h1>
            </div>
            <div class="container table-responsive-sm table-borderless" style="overflow-y: hidden;">
                <table class="table table-no-margin">
                    <tbody>
                        <?php
                        $recordNames = ["Empresas y Expositores", "Países", "Pabellones", "Chalets", "Periodismo", "Metings", "Academias"];
                        $recordConsola = ["empresas", "paises", "pabellones", "chalets", "periodismo", "metings", "academias"];
                        $record = mysqli_query($conexion, "SELECT * FROM record");
                        $recordRes = mysqli_fetch_array($record);
                        ?>
                        <tr>
                            <?php
                            $record = mysqli_query($conexion, "SELECT * FROM record ORDER BY id ASC");
                            while ($recordRes = mysqli_fetch_array($record)) {
                                $id = $recordRes['idFamex'];
                                $recordFam = mysqli_query($conexion, "SELECT * FROM famex WHERE id = $id");
                                $recordFam2 = mysqli_fetch_assoc($recordFam);
                                $famexNombre = $recordFam2['año'];
                                // Se requirio realizar una colsuta para poder traer el nombre del idFamex
                                ?>
                                <td>
                                    <h3 class="contador-elemento" data-cantidad="<?php echo $famexNombre ?>">2000</h3>
                                    <h5>Año</h5>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                            ?>
                            <tr class="contador">
                                <?php
                                mysqli_data_seek($record, 0); // Reiniciar el puntero del resultado al inicio
                            
                                while ($recordRes = mysqli_fetch_array($record)) {
                                    ?>
                                    <td>
                                        <h3 class="contador-elemento"
                                            data-cantidad="<?php echo $recordRes[$recordConsola[$i]]; ?>">0</h3>
                                        <h5>
                                            <?php echo $recordNames[$i] ?>
                                        </h5>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </section>

        <section class="fam">
            <div class="texto">
                <h1> Descripcion FAMEX </h1>

                <p class="propocito">
                    <?php
                        echo $descripcion;
                    ?>

                </p>
            </div>
        </section>
        <!-- Apartado mundo paises participantes-->
        <div>
            <!-- Apartado mundo paises participantes-->
            <section class="paises ">
                <div class="primero">
                    <h3 class="text-shadow tituloPaises">Países Participantes</h3>
                </div>
                <div class="mt-5">

                    <div class="world"></div>

                    <div class="conta mt-4">
                        <div class="marquee mt-3">
                            <?php
                            $pais = mysqli_query($conexion, "SELECT * FROM paises");
                            while ($paises = mysqli_fetch_array($pais)) {
                            ?>
                                <samp><img  style="width: 50px; height: 25px;"  src="data:image/jpg;base64, <?php echo base64_encode($paises['bandera']) ?>" alt=""></samp>
                                <span class="mr-3"><?php echo $paises['nombre'] ?></span>&nbsp;
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Apartado Organizadores, apoyo institucional, Patrocinadores, Colaboradores, Principales participantes carrousel-->
        <!-- Apartado Organizadores, apoyo institucional, Patrocinadores, Colaboradores, Principales participantes carrousel-->
        <?php
        for ($i = 1; $i < 6; $i++) {
            $nombreOrg = ["", "Organizaciones", "Apoyo institucional", "Colaboradores", "Patrocinadores", "Principales participantes"];

            ?>
            <div class="nombreOrg">
                <h3 style="color:#093b68">
                    <?php echo $nombreOrg[$i] ?>
                </h3>
            </div>
            <section class="org">
                <div class="slid">
                    <div class="slid-track">
                        <?php
                        $sql = "SELECT * FROM organizaciones WHERE idTipoOrga = '$i' and idFamex = (SELECT max(id) FROM famex)";
                        $consulta = mysqli_query($conexion, $sql);
                        for ($o = 0; $o < 2; $o++) {
                            $registrosEncontrados = false; // Variable para indicar si se encontraron registros
                    
                            while ($resultado = mysqli_fetch_array($consulta)) {
                                $registrosEncontrados = true; // Se encontraron registros
                    
                                ?>
                                <div class="slid">
                                    <a href="<?php echo $resultado['url'] ?>" target="_blank"><img class="image"
                                            src="data:image/png;base64, <?php echo base64_encode($resultado['logo']) ?>"
                                            height="100" width="250" alt=""></a>
                                </div>
                                <?php
                            }

                            // Si no se encontraron registros, prueba con otro ID
                            if (!$registrosEncontrados) {
                                $sql = "SELECT * FROM organizaciones WHERE idTipoOrga = '$i' and idFamex = (SELECT max(id) FROM famex WHERE id < (SELECT max(id) FROM famex))";
                                $consulta = mysqli_query($conexion, $sql);
                            }
                        }
                        ?>

                    </div>
                </div>
            </section>
            <br>
            <?php
        }
        ?>
        <br>
    </div>
    <div style="margin-top: 35px;">
        <?php
        include 'pie.php';
        include 'alertas.html';
        ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/alerts.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
    <!-- Inciniarlizar record de famex 0 al limite -->
    <script>
        contadorElemento.innerText = "0"; // Establecer el valor inicial del contador
    </script>
    <script src="js/contador_numeros.js" type="text/javascript"></script>

</body>

</html>