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
    <title>Expositores | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/expos.css">
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
        <?php
        include 'botonesFlo.html';

        $sql = "SELECT * FROM expositores";
        $resultado = mysqli_query($conexion, $sql);
        $archivo = [];
        while ($mostrar = mysqli_fetch_array($resultado)) {
            $archivo[] = $mostrar['archivo'];
        }
        ?>
    </div>

    <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    <div class="container-xl-12 invisible-text cont"><br></div>
    <section class="text-center ">
        <div class="animation-left" style="width: 80%; margin:auto;">
            <h1 class="title-conteiner">
                <div class="decoration-left"></div>
                <span class="title">Área de Expositores</span>
                <div class="decoration-rigth"></div>
            </h1>
        </div>
        <div class="container mt-4" id="contenedor">
            <div id="contenido1">
                <?php
                if ($archivo[0] != null) {
                    ?>
                    <img id="myImg" src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[0]) ?>"
                        alt="Recinto Ferial" width="300" height="200">
                    <?php
                } else {
                    ?>
                    <img id="myImg" src="img/zonaexpositores.jpg" alt="Recinto Ferial" width="300" height="200">
                    <?php
                }
                ?>
            </div>
            <div id="contenido2">
                <p class="container text-justify">
                    <br>
                    La Feria Aeroespacial México, FAMEX, es una actividad comercial
                    de ámbito aeronáutico civil, militar, de seguridad y defensa cuyo
                    objetivo es reunir a los líderes de estos sectores para favorecer el
                    intercambio comercial e impulsar el crecimiento de la industria
                    aeroespacial en México.
                </p>
            </div>
        </div>
    </section>
    <section class="container-sm" id="conte4">
        <div class="radio-inputs">
            <label class="radio">
                <input type="radio" name="radio" checked="">
                <span class="name">Chalets</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón A</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón B</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón C</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón D</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón E</span>
            </label>
            <label class="radio">
                <input type="radio" name="radio">
                <span class="name">Pabellón F</span>
            </label>
        </div>

        <div id="html-content" class="content">
            <h2>Mapa de Chalets</h2>
            <?php
            if ($archivo[1] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[1]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_chalets.png" alt="Recinto Ferial">
                <?php
            }
            ?>
        </div>

        <div id="react-content" class="content">
            <h2>Mapa Pabellon A</h2>
            <?php
            if ($archivo[2] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[2]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonA.png" alt="Recinto Ferial">
                <?php
            }
            ?>
        </div>

        <div id="vue-content" class="content">
            <h2>Mapa Pabellon B</h2>
            <?php
            if ($archivo[3] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[3]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonB.png" alt="Recinto Ferial">
                <?php
            }
            ?>
        </div>

        <div id="c-content" class="content">
            <h2>Mapa Pabellon C</h2>
            <?php
            if ($archivo[4] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[4]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonC.png" alt="Imagen Vue">
                <?php
            }
            ?>
        </div>

        <div id="d-content" class="content">
            <h2>Mapa Pabellon D</h2>
            <?php
            if ($archivo[5] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[5]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonD.png" alt="Imagen Vue">
                <?php
            }
            ?>
        </div>

        <div id="e-content" class="content">
            <h2>Mapa Pabellon E</h2>
            <?php
            if ($archivo[6] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[6]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonE.png" alt="Imagen Vue">
                <?php
            }
            ?>
        </div>

        <div id="f-content" class="content">
            <h2>Mapa Pabellon F</h2>
            <?php
            if ($archivo[7] != null) {
                ?>
                <img src="<?php echo 'data:image/jpg;base64,' . base64_encode($archivo[7]) ?>" alt="Recinto Feria11l">
                <?php
            } else {
                ?>
                <img src="img/mapa_pabellonF.png" alt="Imagen Vue">
                <?php
            }
            ?>
        </div>
    </section>
    <div id="contenido3">
        <h2>Descarga aqui </h2>
        <a href="php/visualizar_pdf.php?id=1" target="_blank">
            <button type="button" class="btn btn-outline-secondary">Layout
                <?php echo $año ?>
            </button>
        </a>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <div>
        <?php include 'pie.php' ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/expos.js"></script>
    <script src="js/expositores.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
</body>

</html>