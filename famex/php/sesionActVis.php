<?php
session_start();
if(isset($_SESSION['id'])){
    $idUsuario = $_SESSION['id'];
    $sql = "SELECT * FROM usuario WHERE id = '$idUsuario'";
    $consulta = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($consulta);
    $UserNombre = ucfirst($resultado['nombre']);
    $UserApePat = ucfirst($resultado['apellidoPat']);
    $UserCargo = $resultado['cargo'];
}
?>