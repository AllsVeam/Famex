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
            <h1 class="all-tittles"><small>Famex</small></h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container tablas">
        <!-- <form method="post" id="tu-formulario" action="php/famex-Add.php" enctype="multipart/form-data" onsubmit="return validarFormulario();"> -->
        <form method="post" id="tu-formulario" action="php/famex-add.php" enctype="multipart/form-data">
            <?php
            // Verificar si se envió el campo "id" para determinar si es una actualización
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Obtener los datos del registro a actualizar
                $consulta = "SELECT * FROM famex where id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                // Extraemos los datos de la consulta y los guardamos en vareables que ocuparemos para pintar los datos
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $resultado2 = mysqli_fetch_assoc($resultado);
                    $nombre = $resultado2['nombre'];
                    $descripcion = $resultado2['descripcion'];
                    $logo = $resultado2['logo'];
                    $logoBla = $resultado2['logoBla'];
                    $logoDor = $resultado2['logoDor'];
                    $mes = $resultado2['mes'];
                    $año = $resultado2['año'];
                    $diaInicio = $resultado2['diaInicio'];
                    $diaFinal = $resultado2['diaFinal'];
                }
            } else {
                // Si no se determina que es una actualizacion las vareables que se crearon las debemos de mandar vacias para que no tengamos error en los values
                $nombre = "";
                $descripcion = "";
                $mes = "";
                $año = "";
                $diaInicio = "";
                $diaFinal = "";
            }
            ?>
            <?php
            // Si es una actualizacion se necesita mandar el id que se va actualizar y de la siguiente manera lo recueperamos y lo enviaremos con lo demas del form
            if (isset($id)) {
                echo '<input type="hidden" name="id" value="' . $id . '">';
            }
            ?>
            <!-- se recupera el id de los tipos de servicios para poder identificarlo -->
            <div class="form-row">
                <!-- <div class="form-group col-md-4">
                    <label for="nombre">Año de famez</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="< ?php echo $nombre ?>"
                        required maxlength="10" minlength="10" placeholder="Famex 20**">
                </div> -->
                <div class="form-group col-md-3">
                    <label for="idFamex">Año</label>
                    <select name="año" id="año" class="form-control" required>
                        <option value="<?php echo $año ?>"><?php echo $año ?></option>
                        <?php
                        $x = 2010;
                        while ($x <= 2050) {
                            ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                            $x += 1;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="idFamex">Mes</label>
                    <select name="mes" id="mes" class="form-control" required>
                        <option value="<?php echo $mes ?>"><?php echo $mes ?></option>
                        <option value="january">Enero</option>
                        <option value="february">Febrero</option>
                        <option value="march">Marzo</option>
                        <option value="april">Abril</option>
                        <option value="may">Mayo</option>
                        <option value="june">Junio</option>
                        <option value="july">Julio</option>
                        <option value="august">Agosto</option>
                        <option value="september">Septiembre</option>
                        <option value="octuber">Octubre</option>
                        <option value="november">Noviembre</option>
                        <option value="december">Diciembre</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label for="idFamex">Dia inicio</label>
                    <select name="diaInicio" id="diaInicio" class="form-control" required>
                        <option value="<?php echo $diaInicio ?>"><?php echo $diaInicio ?></option>
                        <?php
                        $x = 1;
                        while ($x <= 31) {
                            ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                            $x += 1;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label for="idFamex">Dia Final</label>
                    <select name="diaFinal" id="diaFinal" class="form-control" required>
                        <option value="<?php echo $diaFinal ?>"><?php echo $diaFinal ?></option>
                        <?php
                        $x = 1;
                        while ($x <= 31) {
                            ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                            $x += 1;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="url">Descripcion</label>
                    <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                        required> <?php echo $descripcion ?> </textarea>
                </div>
            </div><br>
            <div class="form-row">
                <!-- <P class="nota">Importante: Los logos deben tener un tamaño de 3300 x 2550 px, si no tienen esas medidas no sera posible cargarlos.</P> -->
                <!-- Se utlizo la siguiente condicion para mostrar el logo del servicio en caso de que sea una actualizacion -->
                <?php
                // Actualizacion
                if (isset($id)) {
                    ?>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($logo) ?>" alt="">
                    </div>
                    <div class="custom-file form-group col-md-8" style="margin-bottom: 4rem;">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo" title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="logo" name="logo"
                            lang="es" maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex</label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer1">
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($logoBla) ?>" alt="">
                    </div>
                    <div class="custom-file form-group col-md-8" style="margin-bottom: 4rem;">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo"
                            title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="logoBla" name="logoBla"
                            lang="es" maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex Blanco</label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer2">
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($logoDor) ?>" alt="">
                    </div>
                    <div class="custom-file form-group col-md-8" style="margin-bottom: 4rem;">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo"
                            title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="logoDor" name="logoDor"
                            lang="es" maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex Dorado <small>El tamaño del logo
                                debe ser de 3300 x 2550 pixeles.</small></label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer3">
                        </div>
                    </div>
                    <?php
                    // Insercion
                } else {
                    ?>
                    <div class="custom-file form-group col-md-10" style="margin-bottom: 2rem;">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo"
                            title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="imagenes" name="logo" lang="es"
                            required maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex</label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer1">
                        </div>
                    </div>
                    <div class="custom-file form-group col-md-10" style="margin-bottom: 2rem;">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo"
                            title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="imagenes" name="logoBla"
                            lang="es" required maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex Blanco</label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer2">
                        </div>
                    </div>
                    <div class="custom-file form-group col-md-10">
                        <input type="file" accept="image/png" class="custom-file-input validarLogo"
                            title="El tamaño del logo debe ser de 3300 x 2550 pixeles." id="imagenes" name="logoDor"
                            lang="es" required maxlength="1">
                        <label class="custom-file-label" for="customFileLang">Logo famex Dorado</label>
                    </div>
                    <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                        <div class="previewContainer" id="previewContainer3">
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="container-fluid h-100" style="margin-bottom: 2.5em;">
                <div class="row w-100 align-items-center">
                    <div class="col text-center">
                        <br><br>
                        <button type="submit" value="Enviar" class="btn btn-outline-success regular-button">
                            <?php
                            // Mostrar etiqueta del botón según si es una inserción o una actualización
                            if (isset($id)) {
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
    <script src="js/restriccion.js"></script>
    <script src="js/miniaturas.js"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ">
        </script>
</body>

</html>