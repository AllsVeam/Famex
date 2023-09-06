<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $nombre = $_POST['nombre'];
    $url = $_POST['url'];
    $idFamex = $_POST['idFamex'];
    $idTipoSer = $_POST['idSer']; // ID de la trabla de servicios

    if (isset($_POST['idTipoSer'])) {
        $id = $_POST['idTipoSer']; // Id del registro a actualizar

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK && isset($_FILES['baner']) || $_FILES['baner']['error'] === UPLOAD_ERR_OK) {
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK && isset($_FILES['baner']) && $_FILES['baner']['error'] === UPLOAD_ERR_OK) {
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $baner = addslashes(file_get_contents($_FILES['baner']['tmp_name']));
                $consulta = "UPDATE servicios SET nombre = '$nombre', baner = '$baner', idFamex = '$idFamex', logo = '$logo', url = '$url' WHERE id = $id ";
            } elseif (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $consulta = "UPDATE servicios SET nombre = '$nombre', idFamex = '$idFamex', logo = '$logo', url = '$url' WHERE id = $id ";
            } elseif (isset($_FILES['baner']) && $_FILES['baner']['error'] === UPLOAD_ERR_OK) {
                $baner = addslashes(file_get_contents($_FILES['baner']['tmp_name']));
                $consulta = "UPDATE servicios SET nombre = '$nombre', baner = '$baner', idFamex = '$idFamex', url = '$url' WHERE id = $id ";
            }
        } else {
            $consulta = "UPDATE servicios SET nombre = '$nombre', idFamex = '$idFamex', url = '$url' WHERE id = $id ";
        }
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formServicio.php?id=' . $idTipoSer . '&actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        //ingresamos la informacion a la base de datos
        $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
        $baner = addslashes(file_get_contents($_FILES['baner']['tmp_name']));
        $consulta = "INSERT INTO servicios(nombre, baner, logo, url, idFamex, idTipoSer ) VALUES ('$nombre', '$baner', '$logo', '$url', '$idFamex', '$idTipoSer' )";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formServicio.php?id=' . $idTipoSer . '&agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la insercion' . mysqli_error($conexion);
        }
    }
}

?>