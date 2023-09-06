<?php

    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $emailAlt = $_POST['emailAlt'];
    $nombreEmp = $_POST['nombreEmp'];
    $paginaWeb = $_POST['paginaWeb'];
    ($_POST['giro'] !== 'OTRO') ?  $giro = $_POST['giro'] : $giro = $_POST['otro'];
    ($_POST['cargo'] !== 'OTRO') ? $cargo = $_POST['cargo'] : $cargo = $_POST['otro2'];
    $direccion = $_POST['direccion'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['cp'];
    $lada = $_POST['lada'];
    $telefono = $_POST['telefono'];
    $telOfi = $_POST['telOfi'];
    $telMov = $_POST['telMov'];
    ($_POST['rubro'] !== 'OTRO') ? $rubro = $_POST['rubro'] : $rubro = $_POST['otro3'];

    $validar = "SELECT * FROM visitors WHERE email = '$email'";
    $consulta = mysqli_query($conexion, $validar);

    if (mysqli_num_rows($consulta) > 0) {
        echo '
            <script type="text/javascript">
            alert("El correo electronico que ingreso ya existe");
            window.location.href="../formUser.php";
            mysqli_close($conexion);
            </script>';
    } else {
        $consulta = "INSERT INTO visitors(nombre, apellidos, email, emailAlt, nombreEmp, paginaWeb, giro, cargo, direccion, pais, estado, ciudad, cp, telefono, telOfi, telMov, rubro) VALUES ('$nombre', '$apellidos', '$email', '$emailAlt', '$nombreEmp', 'https://www." . $paginaWeb . "', '$giro', '$cargo', '$direccion', '$pais', '$estado', '$ciudad', '$cp', '" . $lada . " " . $telefono . "', '$telOfi', '$telMov', '$rubro')";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '
            <script type="text/javascript">
            alert("Usuario registrado con exito");
            window.location.href="../procesoPago.html";
            mysqli_close($conexion);
            </script>';
        } else {
            echo 'error en la inserción del visitor' . mysqli_error($conexion);
        }
    }

?>