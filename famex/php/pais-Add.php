<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = ucfirst($_POST['nombre']);

    // Verificar si se envió el campo "id" para determinar si es una actualización
    if (isset($_POST['id'])) {
        // Es una actualización
        $id = $_POST['id'];
        if (isset($_FILES['bandera']) && $_FILES['bandera']['error'] === UPLOAD_ERR_OK) {
            $bandera = addslashes(file_get_contents($_FILES['bandera']['tmp_name']));
            $consulta = "UPDATE paises SET nombre = '$nombre', bandera = '$bandera' WHERE id = $id";
        } else {
            $consulta = "UPDATE paises SET nombre = '$nombre' WHERE id = $id";
        }

        // Actualizar el registro en la base de datos        
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formPais.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la actualización: " . mysqli_error($conexion);
        }
    } else { // Es una inserción        
        // Ingresar la información a la base de datos
        $bandera = addslashes(file_get_contents($_FILES['bandera']['tmp_name']));
        $consulta = "INSERT INTO paises(nombre, bandera) VALUES ('$nombre', '$bandera')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formPais.php?agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    }
}
?>