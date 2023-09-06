<?php
require 'conexion.php';

session_start();

$verEmail = $_POST['email'];
$verCont = $_POST['contraseña'];

$sql = "SELECT * FROM usuario WHERE email = '$verEmail' and contraseña = '$verCont'";
$consulta = mysqli_query($conexion, $sql);

if (mysqli_num_rows($consulta) > 0) {
    $resultado = mysqli_fetch_assoc($consulta);
    $nombre = ucfirst($resultado['nombre']);
    $id = $resultado['id'];
    $_SESSION['id'] = $id;
    echo '<script type="text/javascript">            
            window.location.href="../admin.php?sesion= ' . $nombre . '";
            mysqli_close($conexion);
            </script>';
} else {
    echo '<script type="text/javascript">            
            window.location.href="../index.php?sesion=0";
            mysqli_close($conexion);
            </script>';
}

?>