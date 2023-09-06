<?php

session_start();
$idUsuario = $_SESSION['id'];
if (!isset($idUsuario)) {
    header("location: index.php");
} else {
    $sql = "SELECT * FROM usuario WHERE id = '$idUsuario'";
    $consulta = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($consulta);
    $UserNombre = ucfirst($resultado['nombre']);
    $UserApePat = ucfirst($resultado['apellidoPat']);
    $UserCargo = $resultado['cargo'];

}