<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$apellidoPat = $_POST['apellidoPat'];
$apellidoMat = $_POST['apellidoMat'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$cargo = $_POST['cargo'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $consulta = "UPDATE usuario SET nombre = '$nombre', apellidoPat = '$apellidoPat', apellidoMat = '$apellidoMat', email = '$email', contraseña = '$contraseña', cargo = '$cargo' WHERE id = $id ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        echo '<script type="text/javascript">
                window.location.href="../formUser.php?actualizar=1";
                mysqli_close($conexion);
            </script>';
    } else {
        echo 'error en la actualizacion del registro' . mysqli_error($conexion);
    }
} else {
    $validar = "SELECT * FROM usuario WHERE email = '$email'";
    $consulta = mysqli_query($conexion, $validar);

    if (mysqli_num_rows($consulta) > 0) {
        echo '
            <script type="text/javascript">
            window.location.href="../formUser.php?agregar=2";
            mysqli_close($conexion);
            </script>';
    } else {
        $consulta = "INSERT INTO usuario(nombre, apellidoPat, apellidoMat, email, contraseña, cargo) VALUES ('$nombre', '$apellidoPat', '$apellidoMat', '$email', '$contraseña', '$cargo')";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '
            <script type="text/javascript">
            window.location.href="../formUser.php?agregar=1";
            mysqli_close($conexion);
            </script>';
        } else {
            echo 'error en la insercion del usuario' . mysqli_error($conexion);
        }
    }

}

?>