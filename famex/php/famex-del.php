<?php
include 'conexion.php';

$id = $_GET['id'];

// Verificar si existen registros que hacen referencia al ID que se desea eliminar en cada una de las tablas
$consultaVerificacion1 = "SELECT COUNT(*) AS count FROM servicios WHERE idFamex = '$id'";
$resultadoVerificacion1 = mysqli_query($conexion, $consultaVerificacion1);
$filaVerificacion1 = mysqli_fetch_assoc($resultadoVerificacion1);
$count1 = $filaVerificacion1['count'];

$consultaVerificacion2 = "SELECT COUNT(*) AS count FROM espectaculos WHERE idFamex = '$id'";
$resultadoVerificacion2 = mysqli_query($conexion, $consultaVerificacion2);
$filaVerificacion2 = mysqli_fetch_assoc($resultadoVerificacion2);
$count2 = $filaVerificacion2['count'];

$consultaVerificacion3 = "SELECT COUNT(*) AS count FROM areanegocios WHERE idFamex = '$id'";
$resultadoVerificacion3 = mysqli_query($conexion, $consultaVerificacion3);
$filaVerificacion3 = mysqli_fetch_assoc($resultadoVerificacion3);
$count3 = $filaVerificacion3['count'];

$consultaVerificacion4 = "SELECT COUNT(*) AS count FROM record WHERE idFamex = '$id'";
$resultadoVerificacion4 = mysqli_query($conexion, $consultaVerificacion4);
$filaVerificacion4 = mysqli_fetch_assoc($resultadoVerificacion4);
$count4 = $filaVerificacion4['count'];

$consultaVerificacion5 = "SELECT COUNT(*) AS count FROM invitadohonor WHERE idFamex = '$id'";
$resultadoVerificacion5 = mysqli_query($conexion, $consultaVerificacion5);
$filaVerificacion5 = mysqli_fetch_assoc($resultadoVerificacion5);
$count5 = $filaVerificacion5['count'];

$consultaVerificacion6 = "SELECT COUNT(*) AS count FROM organizaciones WHERE idFamex = '$id'";
$resultadoVerificacion6 = mysqli_query($conexion, $consultaVerificacion6);
$filaVerificacion6 = mysqli_fetch_assoc($resultadoVerificacion6);
$count6 = $filaVerificacion6['count'];


if ($count1 > 0 || $count2 > 0 || $count3 > 0 || $count4 > 0 || $count5 > 0 || $count6 > 0) {
    echo '<script type="text/javascript">
    window.location.href="../formFamex.php?eliminado=3";
    mysqli_close($conexion);
    </script>';
} else {
    // Si no hay registros que hagan referencia al ID, proceder con la eliminación
    $consultaEliminar = "DELETE FROM famex WHERE id = '$id'";
    $resultadoEliminar = mysqli_query($conexion, $consultaEliminar);

    if ($resultadoEliminar) {
        $consultaResetAutoIncrement = "ALTER TABLE famex AUTO_INCREMENT = 1;";
        $resultadoResetAutoIncrement = mysqli_query($conexion, $consultaResetAutoIncrement);

        echo '<script type="text/javascript">
        window.location.href="../formFamex.php?eliminado=1";
        mysqli_close($conexion);
        </script>';
    } else {
        echo '<script type="text/javascript">
        window.location.href="../formFamex.php?eliminado=0";
        mysqli_close($conexion);
        </script>';
    }
}

?>
