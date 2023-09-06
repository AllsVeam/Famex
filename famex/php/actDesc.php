<?php
include 'conexion.php';

$id = $_POST['id'];
$archivo = $_FILES['archivo']['tmp_name'];

// Lee el contenido del archivo PDF
$contenidoPDF = file_get_contents($archivo);

// Escapa el contenido del archivo para evitar problemas de caracteres especiales
$contenidoPDF = mysqli_real_escape_string($conexion, $contenidoPDF);

$sql = "UPDATE descargables SET archivo = '$contenidoPDF' WHERE id = '$id'";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    echo '
        <script type="text/javascript">            
            window.location.href="../formDesc.php?actualizar=1";
            mysqli_close($conexion)
        </script> 
        ';
} else {
    echo 'error en la actualizacion del registro' . mysqli_error($conexion);
}


?>