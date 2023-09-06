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
    <title>Servicios | Feria Aeroespacial México</title>
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
            <?php
            $idSer = $_GET['id'];
            $sql = "SELECT * FROM tiposer WHERE id = $idSer";
            $result = mysqli_query($conexion, $sql);
            $titulo = mysqli_fetch_array($result)
            ?>
            <h1 class="all-tittles" style="text-align: center;">
                <small>
                    <?php echo $titulo['nombre'] ?>
                </small>
            </h1>
        </div>
        <div class="container-sm bg-dark line" style="height: 4px; border-radius: 25%;"></div>
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
    </div><br>
    <div class="container">
        <a href="formServicio-agregar.php?id=<?php echo $idSer ?>" style="float: right; padding: 15px;" class="icon-plus" title="Agregar"></a>
    </div>
    <div class="container tablas">
        <table class="table table-hover" style="border-radius: 15px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Famex</th>
                    <th scope="col">nombre</th>
                    <th scope="col">url</th>
                    <th scope="col">logo</th>
                    <th scope="col">Baner</th>
                    <th style="text-align: center;" scope="col">operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Variables para la paginación
                $registrosPorPagina = 10; // Número de registros a mostrar por página
                $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual

                // Calcular el offset para la consulta SQL
                $offset = ($paginaActual - 1) * $registrosPorPagina;

                // Consulta SQL con paginación
                $sql = "SELECT * FROM servicios WHERE idTipoSer = $idSer LIMIT $offset, $registrosPorPagina";
                $result = mysqli_query($conexion, $sql);

                // Obtener el total de registros
                $sqlTotal = "SELECT COUNT(*) AS total FROM servicios WHERE idTipoSer = $idSer";
                $resultTotal = mysqli_query($conexion, $sqlTotal);
                $rowTotal = mysqli_fetch_assoc($resultTotal);
                $totalRegistros = $rowTotal['total'];

                // Calcular el número de páginas
                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                //Se obtinen los datos del resultado de la consulta
                while ($mostrar = mysqli_fetch_array($result)) {
                    // Se requirio realizar una colsuta para poder traer el nombre del idFamex
                    $idFamex = $mostrar['idFamex'];
                    $consulta = mysqli_query($conexion, "SELECT nombre FROM famex WHERE id = $idFamex");
                    $consulta2 = mysqli_fetch_assoc($consulta);
                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $mostrar['id'] ?>
                        </th>
                        <td>
                            <?php echo $consulta2['nombre'] ?>
                        </td>
                        <td>
                            <?php echo $mostrar['nombre'] ?>
                        </td>
                        <td>
                            <a href="<?php echo $mostrar['url'] ?>" target="_blank"><?php echo $mostrar['url'] ?></a>
                        </td>
                        <td>
                            <img height="50px" src="data:image/jpg;base64, <?php echo base64_encode($mostrar['logo']) ?>">
                        </td>
                        <td>
                            <img height="50px" src="data:image/jpg;base64, <?php echo base64_encode($mostrar['baner']) ?>">
                        </td>
                        <td style="text-align: center;">
                            <a href="formServicio-agregar.php?idSer=<?php echo $mostrar['id'] ?>&id=<?php echo $idSer ?>" class="icon-loop2" title="Actualizar"></a>&nbsp;&nbsp;&nbsp;
                            <a href="#" class="icon-bin" title="Borrar" onclick="modalEliminar2('¿Estas seguro que desea borrar el registro?', '<?php echo $mostrar['id'] ?>', '<?php echo $mostrar['idTipoSer'] ?>' )">
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Navegacion de la pagina -->
        <div class="container">
            <?php if ($totalPaginas > 1) : ?>
                <ul class="pagination justify-content-center">
                    <?php if ($paginaActual > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($paginaActual - 1); ?>&id=<?php echo $idSer ?>">
                                << /a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                        <li <?php if ($paginaActual == $i)
                                echo ' class="page-item active"'; ?>><a class="page-link" href="?pagina=<?php echo $i; ?>&id=<?php echo $idSer ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($paginaActual < ($totalRegistros / $registrosPorPagina)) : ?>
                        <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($paginaActual + 1); ?>&id=<?php echo $idSer ?>">></a></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0" nonce="DUfGB1BZ"></script>
    <!-- Inciniarlizar record de famex 0 al limite -->
    <script>
        contadorElemento.innerText = "0"; // Establecer el valor inicial del contador
    </script>
    <script src="js/contador_numeros.js" type="text/javascript"></script>

    <!-- funcion para borrar un registro de la tabla -->
    <script type="text/javascript">
        function preguntar(id, idSer) {
            window.location.href = "php/servicio-Del.php?id=" + id + "&idSer=" + idSer;
        }
    </script>
</body>

</html>