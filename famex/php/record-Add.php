<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idFamex = $_POST['idFamex'];
    $empresas = $_POST['empresas'];
    $paises = $_POST['paises'];
    $pabellones = $_POST['pabellones'];
    $chalets = $_POST['chalets'];
    $periodismo = $_POST['periodismo'];
    $metings = $_POST['metings'];
    $academias = $_POST['academias'];

    // Verificar si se envió el campo "id" para determinar si es una actualización
    if (isset($_POST['id'])) {
        // Es una actualización
        $id = $_POST['id'];

        // Actualizar el registro en la base de datos
        $consulta = "UPDATE record SET empresas = '$empresas', paises = '$paises', pabellones = '$pabellones', chalets = '$chalets', periodismo = '$periodismo', metings = '$metings', academias = '$academias', idFamex = '$idFamex' WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formRecord.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la actualización: " . mysqli_error($conexion);
        }
    } else { // Es una inserción        
        // Ingresar la información a la base de datos
        $consulta = "INSERT INTO record(empresas, paises, pabellones, chalets, periodismo, metings, academias, idFamex) VALUES ('$empresas', '$paises', '$pabellones', '$chalets', '$periodismo', '$metings', '$academias', '$idFamex')";
        $resultado = mysqli_query($conexion, $consulta);    

        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href = "../formRecord.php?agregar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    }
}
?>