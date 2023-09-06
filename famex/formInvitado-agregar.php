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
    <link rel="stylesheet" href="css/carousel.css">
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
            <h1 class="all-tittles"><small>Servicios</small></h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container tablas">
        <!-- La funcion onsubmit sirve para validar las imagenes pero se utilizo una funcion asyncrona -->
        <!-- <form method="post" action="php/invitado-Add.php" enctype="multipart/form-data" onsubmit="return validarFormularioPais()">  -->
        <form method="post" action="php/invitado-Add.php" enctype="multipart/form-data"
            onsubmit="return validarFormularioPais()">
            <?php
            // Verificar si se envió el campo "id" para determinar si es una actualización
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Obtener los datos del registro a actualizar
                $consulta = "SELECT * FROM invitadohonor where id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                // Extraemos los datos de la consulta y los guardamos en vareables que ocuparemos para pintar los datos
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $resultado2 = mysqli_fetch_assoc($resultado);
                    $nombre = $resultado2['nombre'];
                    $descripcion1 = $resultado2['descripcion1'];
                    $descripcion2 = $resultado2['descripcion2'];
                    $descripcion3 = $resultado2['descripcion3'];
                    $descripcion4 = $resultado2['descripcion4'];
                    $imagen1 = $resultado2['imagen1'];
                    $imagen2 = $resultado2['imagen2'];
                }
            } else {
                // Si no se determina que es una actualizacion las vareables que se crearon las debemos de mandar vacias para que no tengamos error en los values
                $nombre = "";
                $descripcion1 = "";
                $descripcion2 = "";
                $descripcion3 = "";
                $descripcion4 = "";
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
                <div class="form-group col-md-6">
                    <label for="idFamex">Famex</label>
                    <select id="idFamex" name="idFamex" class="form-control" required>
                        <?php
                        $sql = 'SELECT * FROM famex ORDER BY nombre desc';
                        $fam = mysqli_query($conexion, $sql);
                        // Se recuperan las famex creadas para poder agregar los servicios que se manejaron en la famex
                        while ($famex = mysqli_fetch_array($fam)) {
                            ?>
                            <option value="<?php echo $famex['id'] ?>"><?php echo $famex['nombre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre Invitado</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion1">Descripcion 1 - Descripcion del pais invitador</label>
                    <textarea maxlength="5000" placeholder="Descripcion" data-msg-required="Escribe un Mensaje."
                        rows="6" class="form-control form-control-lg py-3 text-3" name="descripcion1" id="descripcion1"
                        required=""><?php echo $descripcion1 ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion1">Descripcion 2 - ¿Por que fue invitado el pais?</label>
                    <textarea maxlength="5000" placeholder="Descripcion" data-msg-required="Escribe un Mensaje."
                        rows="6" class="form-control form-control-lg py-3 text-3" name="descripcion2" id="descripcion2"
                        required=""><?php echo $descripcion2 ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion1">Descripcion 3 - Informacion adicional 1 (Opcional)</label>
                    <textarea maxlength="5000" placeholder="Descripcion" data-msg-required="Escribe un Mensaje."
                        rows="6" class="form-control form-control-lg py-3 text-3" name="descripcion3"
                        id="descripcion3"><?php echo $descripcion3 ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion1">Descripcion 4 - Informacion adicional 2 (Opcional)</label>
                    <textarea maxlength="5000" placeholder="Descripcion" data-msg-required="Escribe un Mensaje."
                        rows="6" class="form-control form-control-lg py-3 text-3" name="descripcion4"
                        id="descripcion4"><?php echo $descripcion4 ?></textarea>
                </div>
            </div><br>
            <div class="form-row" style="margin-top: 4rem;">
                <!-- Se utlizo la siguiente condicion para mostrar el logo del servicio en caso de que sea una actualizacion -->
                <?php
                // Actualizacion
                if (isset($id)) {
                    ?>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($imagen1) ?>" alt="">
                    </div>
                    <div class="custom-file form-group col-md-4" style="margin-bottom: 4rem;">
                        <input type="file" accept="image/jpeg, image/png" class="custom-file-input validarimg"
                            id="logo1" name="imagen1" lang="es" ace>
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen conmemorativa del
                            pais</label>
                    </div>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <div class="previewContainer" id="previewContainer1">
                        </div>
                    </div>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($imagen2) ?>" alt="">
                    </div>
                    <div class="custom-file form-group col-md-4">
                        <input type="file" accept="image/jpeg" class="custom-file-input validarBandera" id="logo2"
                            name="imagen2" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Bandera del pais invitado</label>
                    </div>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <div class="previewContainer" id="previewContainer2">
                        </div>
                    </div>

                    <?php
                    // Insercion
                } else {
                    ?>
                    <div class="custom-file form-group col-md-8" style="margin-bottom:4rem;">
                        <input type="file" accept="image/jpeg, image/png" class="custom-file-input validarimg" id="logo2"
                            name="imagen1" lang="es" required>
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen conmemorativa del
                            pais</label>
                    </div>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <div class="previewContainer" id="previewContainer1">
                        </div>
                    </div>
                    <div class="custom-file form-group col-md-8" style="margin-bottom:4rem;">
                        <input type="file" accept="image/jpeg, image/png" class="custom-file-input validarBandera" id="logo1"
                            name="imagen2" lang="es" required>
                        <label class="custom-file-label" for="customFileLang">Seleccionar Bandera del pais invitado</label>
                    </div>
                    <div class="form-group col-md-4" style="margin-bottom: 1rem;">
                        <div class="previewContainer" id="previewContainer2">
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
</body>

</html>