<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $encargado = $_POST['encargado'];
    $area = $_POST['area'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $correo1 = $_POST['correo1'];
    $correo2 = $_POST['correo2'];

    if (isset($_POST['id'])) {
        $id = $_POST['id']; // Id del registro a actualizar

        $consulta = "UPDATE contacto SET encargado = '$encargado', area = '$area', tel1 = '$tel1', tel2 = '$tel2', correo1 = '$correo1', correo2 = '$correo2' WHERE id = $id ";
        
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">                
                window.location.href="../formAgenda.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        //ingresamos la informacion a la base de datos
        $consulta = "INSERT INTO contacto( encargado, area, tel1, tel2, correo1, correo2 ) VALUES ('$encargado', '$area', '$tel1', '$tel2', '$correo1', '$correo2' )";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">                
                window.location.href="../formAgenda.php?agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la insercion' . mysqli_error($conexion);
        }
    }
}

?>