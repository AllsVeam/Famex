<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $validar = "SELECT * FROM opiniones WHERE email = '$email'";
    $consulta = mysqli_query($conexion, $validar);

    if (mysqli_num_rows($consulta) > 0) {
        echo '
            <script type="text/javascript">            
            window.location.href="../contacto.php?opinion=1";
            mysqli_close($conexion);
            </script>';
    } else {
        //ingresamos la informacion a la base de datos
        $consulta = "INSERT INTO opiniones( nombre, email, asunto, mensaje, estatus) VALUES ('$nombre', '$email', '$asunto', '$mensaje', '1')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">                
                window.location.href="../contacto.php?opinion=0";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la insercion' . mysqli_error($conexion);
        }
    }
}

?>