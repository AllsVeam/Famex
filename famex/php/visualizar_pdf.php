<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM descargables WHERE id = '$id'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
  $fila = mysqli_fetch_assoc($resultado);
  $contenidoPDF = $fila['archivo'];
  $nombre = $fila['nombre'];

  // Establece las cabeceras para mostrar el archivo PDF en una nueva pestaña
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="' . $nombre . '.pdf"');

  // Imprime el contenido del archivo PDF
  echo $contenidoPDF;
} else {
  echo 'No se encontró el archivo PDF en la base de datos.';
}

mysqli_close($conexion);
?>
