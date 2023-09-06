<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se obtinen los valores del formulario
    $descripcion = $_POST['descripcion'];
    $mes = $_POST['mes'];
    $año = $_POST['año'];
    $diaInicio = $_POST['diaInicio'];
    $diaFinal = $_POST['diaFinal'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK || isset($_FILES['logoBla']) && $_FILES['logoBla']['error'] === UPLOAD_ERR_OK || isset($_FILES['logoDor']) && $_FILES['logoDor']['error'] === UPLOAD_ERR_OK) {
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK && isset($_FILES['logoBla']) && $_FILES['logoBla']['error'] === UPLOAD_ERR_OK && isset($_FILES['logoDor']) && $_FILES['logoDor']['error'] === UPLOAD_ERR_OK) {
                // Actualizar los 3 logos
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $logoBla = addslashes(file_get_contents($_FILES['logoBla']['tmp_name']));
                $logoDor = addslashes(file_get_contents($_FILES['logoDor']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logo = '$logo', logoBla = '$logoBla', logoDor = '$logoDor' WHERE id = $id ";
            } else if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK && isset($_FILES['logoBla']) && $_FILES['logoBla']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 1 y 2
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $logoBla = addslashes(file_get_contents($_FILES['logoBla']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logo = '$logo', logoBla = '$logoBla' WHERE id = $id ";
            } else if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK && isset($_FILES['logoDor']) && $_FILES['logoDor']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 1 y 3
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $logoDor = addslashes(file_get_contents($_FILES['logoDor']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logo = '$logo', logoDor = '$logoDor' WHERE id = $id ";
            } else if (isset($_FILES['logoBla']) && $_FILES['logoBla']['error'] === UPLOAD_ERR_OK && isset($_FILES['logoDor']) && $_FILES['logoDor']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 2 y 3
                $logoBla = addslashes(file_get_contents($_FILES['logoBla']['tmp_name']));
                $logoDor = addslashes(file_get_contents($_FILES['logoDor']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logoBla = '$logoBla', logoDor = '$logoDor' WHERE id = $id ";
            } else if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 1
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logo = '$logo' WHERE id = $id ";
            } else if (isset($_FILES['logoBla']) && $_FILES['logoBla']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 2
                $logoBla = addslashes(file_get_contents($_FILES['logoBla']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logoBla = '$logoBla' WHERE id = $id ";
            } else if (isset($_FILES['logoDor']) && $_FILES['logoDor']['error'] === UPLOAD_ERR_OK) {
                // Actualizar logo 3
                $logoDor = addslashes(file_get_contents($_FILES['logoDor']['tmp_name']));
                $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal', logoDor = '$logoDor' WHERE id = $id ";
            }
        } else {
            // Si no se desea actualizar imagenes se aplica la siguiente consulta
            $consulta = "UPDATE famex SET nombre = 'Famex $año', descripcion = '$descripcion', año = '$año', mes = '$mes', diaInicio = '$diaInicio', diaFinal = '$diaFinal' WHERE id = $id ";
        }
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formFamex.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
        $logoBla = addslashes(file_get_contents($_FILES['logoBla']['tmp_name']));
        $logoDor = addslashes(file_get_contents($_FILES['logoDor']['tmp_name']));
        $mysql = "INSERT INTO famex(nombre, descripcion, logo, logoBla, logoDor, mes, año, diaInicio, diaFinal) VALUES('Famex $año', '$descripcion', '$logo', '$logoBla', '$logoDor', '$mes', '$año', '$diaInicio', '$diaFinal')";
        $resultado = mysqli_query($conexion, $mysql);
        if ($resultado) {
            $resultado2 = mysqli_query($conexion, "INSERT INTO invitadohonor (idFamex) VALUES ((SELECT max(id) FROM famex));");
            if ($resultado2) {
                echo '<script type="text/javascript">
                window.location.href="../formFamex.php?agregar=1";
                mysqli_close($conexion);
                </script>';
            } else {
                echo 'error en la actualizacion del registro' . mysqli_error($conexion);
            }
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    }
}
?>