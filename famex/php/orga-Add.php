<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $nombre = $_POST['nombre'];
    $url = $_POST['url'];
    $idFamex = $_POST['idFamex'];
    $idTipoOrg = $_POST['idOrg']; // ID de la trabla de organizaciones

    if (isset($_POST['idTipoOrga'])) {
        $id = $_POST['idTipoOrga']; // Id del registro a actualizar

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
            $consulta = "UPDATE organizaciones SET nombre = '$nombre', idFamex = '$idFamex', logo = '$logo', url = '$url' WHERE id = $id ";
        } else {
            $consulta = "UPDATE organizaciones SET nombre = '$nombre', idFamex = '$idFamex', url = '$url' WHERE id = $id ";
        }
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formOrg.php?id=' . $idTipoOrg . '&actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        //ingresamos la informacion a la base de datos
        $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
        $consulta = "INSERT INTO organizaciones(nombre, logo, url, idFamex, idTipoOrga ) VALUES ('$nombre', '$logo', '$url', '$idFamex', '$idTipoOrg' )";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formOrg.php?id=' . $idTipoOrg . '&agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la insercion' . mysqli_error($conexion);
        }
    }
}

?>