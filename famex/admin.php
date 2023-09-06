<?php
include 'php/conexion.php';
include 'php/sesionAct.php';
include 'php/sesionCadu.php';

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
    include 'menu.php'
        ?>
    <!-- franga que limita el banner de la informacion -->
    <div class="cont"></div>
    <!-- Informacion general de la Pagina -->
    <!-- Botones flotante -->
    <!-- <div>
        < ?php include 'botonesFlo.html' ?>
    </div> -->
    <div>
        <!-- Menu de Administrador -->
        <?php include 'menuAdmin.php' ?>
        <!-- Encabezado de la Pagina de Administradores -->
        <div class="container">
            <h1 class="all-tittles">Sistema FAMEX <small>Inicio</small></h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div>
    <div class="container">
        <section class="centrar">
            <a class="btnEnl" href="formFamex.php">
                <button class="btnAdmin">Famex</button>
            </a>
            <a class="btnEnl" href="formNegocios.php">
                <button class="btnAdmin">Area de Negocios</button>
            </a>
            <a class="btnEnl" href="formEspectaculos.php">
                <button class="btnAdmin">Espectaculos</button>
            </a>
            <a class="btnEnl" href="formPais.php">
                <button class="btnAdmin">Países</button>
            </a>
            <a class="btnEnl" href="formAreaExp.php">
                <button class="btnAdmin">Área expositores</button>
            </a>
            <a class="btnEnl" href="formDesc.php">
                <button class="btnAdmin">Descargables</button>
            </a>
        </section>
        <!-- Organizaciones -->
        <section class="centrar">
            <div class="text-center">
                <h1 class="all-tittles"><small>Organizaciones</small></h1>
            </div>
            <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
            <!-- Consulta DBs Organizaciones -->
            <?php
            $sql = "SELECT * FROM tipoorga";
            $result = mysqli_query($conexion, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <a class="btnEnl" href="formOrg.php?id=<?php echo $mostrar['id'] ?>">
                    <button class="btnAdmin">
                        <?php echo $mostrar['nombre'] ?>
                    </button>
                </a>
                <?php
            }
            ?>
        </section>
        <!-- Servicios -->
        <section class="centrar">
            <div class="text-center">
                <h1 class="all-tittles"><small><a href="formTipServ.php"> Servicios </a></small></h1>
            </div>
            <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
            <!-- Consulta DBs Servicios -->
            <?php
            $sql = "SELECT * FROM tiposer";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <a class="btnEnl" href="formServicio.php?id=<?php echo $mostrar['id'] ?>">
                    <button class="btnAdmin">
                        <?php echo $mostrar['nombre'] ?>
                    </button>
                </a>
                <?php
            }
            ?>

        </section>
        <section class="centrar">
            <div class="text-center">
                <h1 class="all-tittles"><small>Adicionales</small></h1>
            </div>
            <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
            <!-- Consulta DBs Organizaciones -->
            <a class="btnEnl" href="formAgenda.php">
                <button class="btnAdmin">Agenda Famex</button>
            </a>
            <a class="btnEnl" href="formRecord.php">
                <button class="btnAdmin">Record Famex</button>
            </a>
            <a class="btnEnl" href="formInvitado.php">
                <button class="btnAdmin">Invitado de Honor</button>
            </a>
            <?php
            if($UserCargo == 'administrador'){
                ?>            
            <a class="btnEnl" href="formUser.php">
                <button class="btnAdmin">Usuarios</button>
            </a>
            <?php
            }
            ?>
            <a class="btnEnl" href="formVisitor.php">
                <button class="btnAdmin">Registro y Acreditación</button>
            </a>
        </section>
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