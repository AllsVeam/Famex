<!-- Consulta para ectraer la fecha del evento -->
<?php
// $sql = "SELECT year, month, day, hour FROM fechas WHERE id = LAST_INSERT_ID()";
$sql = "SELECT * FROM famex WHERE id = (SELECT max(id) FROM famex)";
$contador = mysqli_query($conexion, $sql);
if (!$contador) {
die("Error en la consulta preparada: " . mysqli_error($conexion));
}
$contador1 = $contador->fetch_assoc();
$año = $contador1['año'];
$mes = $contador1['mes'];
$dia = $contador1['diaInicio'];

?>
<!-- Esta funcion sirve para mandar obtener el dia de la base de datos -->
<script>
    // Inicialización del contador utilizando la función countdown definida en script.js
    contdown('<?php echo $año ?> <?php echo $mes ?> <?php echo $dia ?> 9:00:00', 'clock', '00d:00h:00m:00s');
    // contdown('juny 26 2024 12:00:00', 'clock', '00d:00h:00m:00s');
    // miercoles, jueves y viernes ciclos de negocios 9 am a 5 pm
    // entrada a 6 espectaculos 11
</script>