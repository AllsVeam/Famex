<?php

    include("conexion.php");

    //obtenemos los valores del formulario
    $idTipoSer = $_GET['idSer'];
    $id = $_GET['id'];

    //ingresamos la informacion a la base de datos
    $consulta1 = "DELETE FROM organizaciones WHERE id = '$id'";
    $resultado1 = mysqli_query($conexion, $consulta1);

    if($resultado1)
    {
        $consulta2 = "ALTER TABLE tiposer AUTO_INCREMENT = 1;";
        $resultado2 = mysqli_query($conexion, $consulta2);
        
        echo'<script type="text/javascript">
        window.location.href="../formOrg.php?id= ' . $idTipoSer . '&eliminado=1";
        mysqli_close($conexion);
        </script>';
    }
    else
    {
        echo'<script type="text/javascript">
        window.location.href="../formOrg.php?id= ' . $idTipoSer . '&eliminado=0";
        mysqli_close($conexion);
        </script>';
    }

?>