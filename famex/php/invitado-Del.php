<?php

    include("conexion.php");

    //obtenemos los valores del formulario
    $id = $_GET['id'];

    //ingresamos la informacion a la base de datos
    $consulta1 = "DELETE FROM invitadohonor WHERE id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);

    if($resultado1)
    {
        $consulta2 = "ALTER TABLE invitadohonor AUTO_INCREMENT = 1;";
        $resultado2 = mysqli_query($conexion, $consulta2);
        
        echo'<script type="text/javascript">
        window.location.href="../formInvitado.php?eliminado=1";
        mysqli_close($conexion);
        </script>';
    }
    else
    {
        echo'<script type="text/javascript">
        window.location.href="../formInvitado.php?eliminado=0";
        mysqli_close($conexion);
        </script>';
    }

?>