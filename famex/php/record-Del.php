<?php

include("conexion.php");

//obtenemos los valores del formulario
$id = $_GET['id'];

//ingresamos la informacion a la base de datos
$consulta = "DELETE FROM record WHERE id = '$id'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $consulta = "ALTER TABLE record AUTO_INCREMENT = 1;";
    $resultado = mysqli_query($conexion, $consulta);

    echo '<script type="text/javascript">
            window.location.href="../formRecord.php?eliminado=1";
            mysqli_close($conexion);
            </script>';
} else {
    echo '<script type="text/javascript">
            window.location.href="../formRecord.php?eliminado=0";
            mysqli_close($conexion);
            </script>';
}


?>