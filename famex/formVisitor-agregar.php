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
    <title>Agregar visitor | Feria Aeroespacial México</title>
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
            <h1 class="all-tittles">
                <small>
                    <?php
                    if (isset($_GET['id'])) {
                        echo "Actualizar visitor";
                    } else {
                        echo "Agregar visitor";
                    }
                    ?>
                </small>
            </h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container tablas">

        <form method="post" action="php/usuario-Add.php" enctype="multipart/form-data">
            <?php
            // Verificar si se envió el campo "id" para determinar si es una actualización
            if (isset($_GET['id'])) {
                $idUser = $_GET['id'];

                // Obtener los datos del registro a actualizar
                $consulta = "SELECT * FROM visitor where id = $idVisitor";
                $resultado = mysqli_query($conexion, $consulta);
                // Extraemos los datos de la consulta y los guardamos en vareables que ocuparemos para pintar los datos
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $resultado2 = mysqli_fetch_assoc($resultado);
                    $nombre = $resultado2['nombre'];
                    $apellidos = $resultado2['apellidos'];
                    $email = $resultado2['email'];
                    $emailAlt = $resultado2['emailAlt'];
                    $nombreEmp = $resultado2['nombreEmp'];
                    $paginaWeb = $resultado2['paginaWeb'];
                    $giro = $resultado2['giro'];
                    $cargo = $resultado2['cargo'];
                    $direccion = $resultado2['direccion'];
                    $pais = $resultado2['pais'];
                    $estado = $resultado2['estado'];
                    $ciudad = $resultado2['ciudad'];
                    $cp = $resultado2['cp'];
                    $telefono = $resultado2['telefono'];
                    $telOfi = $resultado2['telOfi'];
                    $telMov = $resultado2['telMov'];
                    $rubro = $resultado2['rubro'];
                }
            } else {
                // Si no se determina que es una actualizacion las vareables que se crearon las debemos de mandar vacias para que no tengamos error en los values
                $nombre = "";
                $apellidos = "";
                $email = "";
                $emailAlt = "";
                $nombreEmp = "";
                $paginaWeb = "";
                $giro = "";
                $cargo = "";
                $direccion = "";
                $pais = "";
                $estado = "";
                $ciudad = "";
                $cp = "";
                $telefono = "";
                $telOfi = "";
                $telMov = "";
            }
            ?>
            <?php
            // Si es una actualizacion se necesita mandar el id que se va actualizar y de la siguiente manera lo recueperamos y lo enviaremos con lo demas del form
            if (isset($idVisitor)) {
                echo '<input type="hidden" name="id" value="' . $idVisitor . '">';
            }
            ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>"
                        required maxlength="50" oninput="this.value = this.value.replace(/[0-9]/g, '')">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellidoPat">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoPat" name="apellidoPat"
                        value="<?php echo $apellidoPat ?>" required maxlength="20"
                        oninput="this.value = this.value.replace(/[0-9]/g, '')">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellidoMat">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoMat" name="apellidoMat"
                        value="<?php echo $apellidoMat ?>" required maxlength="20"
                        oninput="this.value = this.value.replace(/[0-9]/g, '')">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Correo Electronico</label>
                    <?php
                    if (isset($idVisitor)) {
                        ?>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                            required readonly>
                        <?php
                    } else {
                        ?>
                        <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                        <?php
                    }
                    ?>

                </div>
                <div class="form-group col-md-4">
                    <label for="contraseña">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña"
                        value="<?php echo $contraseña ?>" required minlength="8">
                </div>
                <div class="form-group col-md-4">
                    <label for="cargo">Cargo</label>
                    <select name="cargo" id="cargo" class="form-control" required>
                        <option value="<?php echo $cargo ?>"><?php echo $cargo ?></option>
                        <option value="administrador">Administrador</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="rubro">Rubro</label>
                    <select name="rubro" id="rubro" class="form-control" required>
                        <?php if (isset($idVisitor)) { ?><option value="<?php echo $rubro ?>"><?php echo $rubro ?></option><?php } ?>
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="O.E.Ms." data-tokens="Option 1">O.E.Ms.
                        </option>
                        <option value="TIER 1" data-tokens="Option 2">TIER 1
                        </option>
                        <option value="TIER 2" data-tokens="Option 3">TIER 2
                        </option>
                        <option value="TIER 3" data-tokens="Option 4">TIER 3
                        </option>
                        <option value="PROVEEDOR DE SERVICIOS"
                            data-tokens="Option 5">
                            PROVEEDOR
                            DE SERVICIOS</option>
                        <option value="CONSULTORIA" data-tokens="Option 6">
                            CONSULTORÍA
                        </option>
                        <option value="DISEÑO" data-tokens="Option 7">DISEÑO
                        </option>
                        <option value="RECURSOS HUMANOS" data-tokens="Option 8">
                            RECURSOS
                            HUMANOS
                        </option>
                        <option value="PROVEEDOR LOCAL DE BAJO COSTO"
                            data-tokens="Option 9">
                            PROVEEDOR LOCAL DE BAJO COSTO</option>
                        <option value="EDUCACIÓN" data-tokens="Option 10">
                            EDUCACIÓN
                        </option>
                        <option value="FUERZAS ARMADAS" data-tokens="Option 11">
                            FUERZAS
                            ARMADAS
                        </option>
                        <option value="GOBIERNO" data-tokens="Option 12">
                            GOBIERNO
                        </option>
                        <option value="ESPACIAL" data-tokens="Option 13">
                            ESPACIAL
                        </option>
                        <option value="PARQUE INDUSTRIAL"
                            data-tokens="Option 14">PARQUE
                            INDUSTRIAL</option>
                        <option value="INDUSTRIA LATERAL"
                            data-tokens="Option 15">
                            INDUSTRIA
                            LATERAL</option>
                        <option value="MATERIALES COMPUESTOS"
                            data-tokens="Option 16">
                            MATERIALES
                            COMPUESTOS</option>
                        <option value="DEFENSA" data-tokens="Option 17">DEFENSA
                        </option>
                        <option value="MRO" data-tokens="Option 18">MRO</option>
                        <option value="UAVs" data-tokens="Option 19">UAVs
                        </option>
                        <option value="COMBUSTIBLES Y LUBRICANTES"
                            data-tokens="Option 20">
                            COMBUSTIBLES Y LUBRICANTES</option>
                        <option value="PINTURAS" data-tokens="Option 21">
                            PINTURAS
                        </option>
                        <option value="SERVICIOS A LA AVIACIÓN"
                            data-tokens="Option 22">
                            SERVICIOS A LA AVIACIÓN</option>
                        <option value="AVIACIÓN COMERCIAL"
                            data-tokens="Option 23">
                            AVIACIÓN
                            COMERCIAL</option>
                        <option value="PRUEBAS NO DESTRUCTIVAS"
                            data-tokens="Option 24">
                            PRUEBAS
                            NO DESTRUCTIVAS</option>
                        <option value="MANUFACTURA" data-tokens="Option 25">
                            MANUFACTURA
                        </option>
                        <option value="LOGISTICA" data-tokens="Option 26">
                            LOGÍSTICA
                        </option>
                        <option value="INVESTIGACION" data-tokens="Option 27">
                            INVESTIGACIÓN
                        </option>
                        <option value="AEROLINEA" data-tokens="Option 28">
                            AEROLÍNEA
                        </option>
                        <option
                            value="INDUSTRIA QUE MIGRA AL SECTOR AERONAUTICO"
                            data-tokens="Option 29">INDUSTRIA QUE MIGRA AL
                            SECTOR
                            AERONÁUTICO
                        </option>
                        <option value="AVIACION PRIVADA"
                            data-tokens="Option 30">
                            AVIACIÓN
                            PRIVADA</option>
                        <option value="IMPRESION 3D" data-tokens="Option 31">
                            IMPRESIÓN
                            3D
                        </option>
                        <option value="OTRO">OTRO</option>
                    </select>
                </div>
            </div><br>

            <div class="container-fluid h-100" style="margin-bottom: 2.5em;">
                <div class="row w-100 align-items-center">
                    <div class="col text-center">
                        <br><br>
                        <button type="submit" value="Enviar" class="btn btn-outline-success regular-button">
                            <?php
                            // Mostrar etiqueta del botón según si es una inserción o una actualización
                            if (isset($idUser)) {
                                echo 'Actualizar';
                            } else {
                                echo 'Agregar';
                            }
                            ?>
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
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
    <script src="js/contador_numeros.js" type="text/javascript"></script>
</body>

</html>