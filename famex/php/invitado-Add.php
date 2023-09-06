<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $nombre = $_POST['nombre'];
    $descripcion1 = $_POST['descripcion1'];
    $descripcion2 = $_POST['descripcion2'];
    $descripcion3 = $_POST['descripcion3'];
    $descripcion4 = $_POST['descripcion4'];
    $idFamex = $_POST['idFamex'];

    if (isset($_POST['id'])) {
        $id = $_POST['id']; // Id del registro a actualizar
    
        if (isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] === UPLOAD_ERR_OK || isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] === UPLOAD_ERR_OK) {
            if (isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] === UPLOAD_ERR_OK && isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] === UPLOAD_ERR_OK) {
                $imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
                $imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
                $consulta = "UPDATE invitadohonor SET nombre = '$nombre', descripcion1 = '$descripcion1', descripcion2 = '$descripcion2', descripcion3 = '$descripcion3', descripcion4 = '$descripcion4', imagen1 = '$imagen1',  imagen2 = '$imagen2' WHERE id = $id ";
            } elseif(isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] === UPLOAD_ERR_OK){
                $imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
                $consulta = "UPDATE invitadohonor SET nombre = '$nombre', descripcion1 = '$descripcion1', descripcion2 = '$descripcion2', descripcion3 = '$descripcion3', descripcion4 = '$descripcion4', imagen1 = '$imagen1'WHERE id = $id ";                
            } elseif(isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] === UPLOAD_ERR_OK){
                $imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
                $consulta = "UPDATE invitadohonor SET nombre = '$nombre', descripcion1 = '$descripcion1', descripcion2 = '$descripcion2', descripcion3 = '$descripcion3', descripcion4 = '$descripcion4', imagen2 = '$imagen2' WHERE id = $id ";
            }
        } else{
            $consulta = "UPDATE invitadohonor SET nombre = '$nombre', descripcion1 = '$descripcion1', descripcion2 = '$descripcion2', descripcion3 = '$descripcion3', descripcion4 = '$descripcion4' WHERE id = $id ";
        }      
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formInvitado.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        //ingresamos la informacion a la base de datos
        $imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
        $imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
        $consulta = "INSERT INTO invitadohonor(nombre, descripcion1, descripcion2, descripcion3, descripcion4, imagen1, imagen2, idFamex) VALUES ('$nombre', '$descripcion1', '$descripcion2', '$descripcion3', '$descripcion4', '$imagen1', '$imagen2', '$idFamex')";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formInvitado.php?agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la insercion' . mysqli_error($conexion);
        }
    }
}

?>