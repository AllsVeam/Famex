<?php
include 'php/conexion.php';
include 'php/sesionAct.php';
include 'php/sesionCadu.php';

if (!isset($_GET['id'])) {
    header("location: formDesc.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Feria Aeroespacial México</title>
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
    <link rel="stylesheet" href="css/expos.css">
    <link rel="stylesheet" href="css/admin.css">
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
    include 'menu.php' ?>
    <!-- franga que limita el banner de la informacion -->
    <div class="cont"></div>
    <!-- Botones flotante -->
    <!-- <div>
        < ?php include 'botonesFlo.html' ?>
    </div> -->
    <!-- Informacion general de la Pagina -->
    <div>
        <!-- Menu de Administrador -->
        <?php include 'menuAdmin.php' ?>
        <!-- Encabezado de la Pagina de Administradores -->
        <div class="container">
            <h1 class="all-tittles"><small>Actualizar descargable</small></h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container tablas">
        <!-- <form method="post" enctype="multipart/form-data" class="row g-3" action="php/add.logical.php"> -->
        <!-- <div class="col-10" style="margin: 0 auto; text-align: center;">
                <br>
                <label class="form-label">Cargar la foto del ejercicio: </label>
                <input type="file" id="img" name="img">
            </div> -->
        <a style="float: right;" href="https://www.ilovepdf.com/es/comprimir_pdf" target="_blank"
            class="icon-file-text2"> Reducir archivo </a><br>
        <!-- <form method="post" enctype="multipart/form-data" action="php/actDesc.php" onsubmit="return validarArchivopdf()";> -->
        <form method="post" enctype="multipart/form-data" action="php/actDesc.php">
            <?php
            // Verificar si se envió el campo "id" para determinar si es una actualización
            $id = $_GET['id'];
            // Obtener los datos del registro a actualizar
            $consulta = "SELECT * FROM descargables WHERE id = $id";
            $resultado = mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_assoc($resultado);
            $nombre = $registro['nombre'];

            ?>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
                <label for="nombre">Tipode archivo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Servicio"
                    value="<?php echo $nombre ?>" required readonly>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input validaPDF" id="archivo" name="archivo" lang="es" required>
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
            <div class="container-fluid h-100" style="margin-bottom: 2.5em;">
                <div class="row w-100 align-items-center">
                    <div class="col text-center">
                        <br><br>
                        <button type="submit" value="Enviar" class="btn btn-outline-success regular-button">
                            Actualizar
                        </button>
                        <a href="javascript:window.history.back()">
                            <button type="button" value="Enviar"
                                class="btn btn-outline-danger regular-button">Cancelar</button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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
    <script src="js/restriccion.js"></script>
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