<?php
include 'php/conexion.php';

// Obtener el ID del servicio desde la solicitud
$id = $_GET['id'];

// Consulta para obtener la imagen del servicio con el ID proporcionado
$sql = "SELECT baner FROM servicios WHERE id = $id";
$result = mysqli_query($conexion, $sql);

if ($result) {
    // Verificar si se encontró un resultado
    if (mysqli_num_rows($result) > 0) {
        // Obtener el resultado de la consulta
        $row = mysqli_fetch_assoc($result);

        // Obtener el contenido de la imagen desde la base de datos
        $imagen = $row['baner'];

        // Establecer las cabeceras adecuadas para la respuesta
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="imagen.png"');

        // Imprimir el contenido de la imagen
        echo $imagen;
        exit;
    } else {
        // Si no se encontró la imagen, puedes mostrar un mensaje de error o redirigir a otra página
        echo "Imagen no encontrada";
    }
} else {
    // Si ocurrió un error en la consulta, puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error en la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
