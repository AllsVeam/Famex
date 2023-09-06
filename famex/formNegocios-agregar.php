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
    <link rel="stylesheet" href="css/expos.css">
    <link rel="stylesheet" href="css/admin.css">
    <!-- Fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- scrips que llevara la pagina -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
            <h1 class="all-tittles"><small>Apartados</small></h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container tablas">
        <form id="form" method="post" action="php/negocios-Add.php" enctype="multipart/form-data" onsubmit="return validarArchivos();">
            <?php
            // Verificar si se envió el campo "id" para determinar si es una actualización
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Obtener los datos del registro a actualizar
                $consulta = "SELECT * FROM areanegocios where id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                $apartados = 1;
                // Extraemos los datos de la consulta y los guardamos en vareables que ocuparemos para pintar los datos
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $resultado2 = mysqli_fetch_assoc($resultado);
                    $descripcion = $resultado2['descripcion'];
                    $imagen = $resultado2['imagen'];
                }
            } else {
                // Si no se determina que es una actualizacion las vareables que se crearon las debemos de mandar vacias para que no tengamos error en los values
                $descripcion = "";
                $apartados = $_POST['apartados'];
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
            </div>
            <?php
            for ($i = 0; $i < $apartados; $i++) {            ?>

                <div class="form-row">
                    <div class="form-group col-md-12" style="margin-bottom: 4rem;">
                        <label for="descripcion">Descripcion</label>
                        <textarea type="text" maxlength="5000" placeholder="Descripcion" data-msg-required="Escribe un Mensaje." rows="1" class="form-control form-control-lg py-3 text-3" name="descripcion[]" id="descripcion<?php echo ($i + 1); ?>" required=""><?php echo $descripcion ?></textarea>
                    </div>
                    <!-- Se utlizo la siguiente condicion para mostrar el logo del servicio en caso de que sea una actualizacion -->
                    <?php
                    // Actualizacion
                    if (isset($id)) {
                    ?>
                        <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                            <img class="miniatura" src="data:image/jpg;base64, <?php echo base64_encode($imagen) ?>" alt="">
                        </div>
                        <div class="custom-file form-group col-md-8">
                            <input type="file" class="custom-file-input validarimg" id="imagenes<?php echo $i ?>" accept="image/png, image/jpeg" name="imagen[]" lang="es">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
                        </div>
                        <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                            <div class="previewContainer" id="previewContainer1">
                            </div>
                        </div>
                    <?php
                        // Insercion
                    } else {
                    ?>
                        <div class="custom-file form-group col-md-10">
                            <input type="file" class="custom-file-input validarimg" id="imagenes<?php echo $i ?>" accept="image/png, image/png" name="imagen[]" lang="es" required>
                            <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
                        </div>
                        <div class="form-group col-md-2" style="margin-bottom: 2rem;">
                            <div class="previewContainer" id="previewContainer1">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div><br><br>
            <?php
            }
            ?>
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
                            <button type="button" value="Enviar" class="btn btn-outline-danger regular-button">Cancelar</button>
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