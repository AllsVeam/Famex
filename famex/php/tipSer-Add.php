<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];

    // Verificar si se envió el campo "id" para determinar si es una actualización
    if (isset($_POST['id'])) {
        // Es una actualización
        $id = $_POST['id'];

        // Actualizar el registro en la base de datos
        $consulta = "UPDATE tiposer SET nombre = '$nombre' WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formTipServ.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la actualización: " . mysqli_error($conexion);
        }
    } else {// Es una inserción        
        // Ingresar la información a la base de datos
        $consulta = "INSERT INTO tiposer(nombre) VALUES ('$nombre')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formTipServ.php?agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    }
}
?>