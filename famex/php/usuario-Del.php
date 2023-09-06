<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $consulta = "ALTER TABLE tiposer AUTO_INCREMENT = 1;";
    $resultado = mysqli_query($conexion, $consulta);
    echo '
        <script type="text/javascript">
            window.location.href="../formUser.php?eliminado=1";
            mysqli_close($conexion);
        </script>
        ';
} else {
    echo '
        <script type="text/javascript">
            window.location.href="../formUser.php?eliminado=0";
            mysqli_close($conexion);
        </script>
        ';
}