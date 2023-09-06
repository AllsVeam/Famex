<div class="menuAdmin">
    <nav class="navb">
        <ul>
            <div class="izq">
                <li><a class="icon-home" href="admin.php">&nbsp; </a></li>
            </div>
            <div class="der">
                <li>&nbsp;
                    <?php echo $UserNombre ?>
                    <?php echo $UserApePat ?>&nbsp;
                </li>
                <li><a class="icon-switch cerrar" href="#" onclick="modalCerrarSesion('¿Desea Cerrar la Sesion?')" title="Cerrar Sesion"></a></li>
                <?php
                $sql = "SELECT COUNT(*) AS contar FROM opiniones WHERE estatus = '1'";
                $consulta = mysqli_query($conexion, $sql);
                $resultado = mysqli_fetch_assoc($consulta);
                $contar = $resultado['contar'];

                if ($contar >= 1) {
                    ?>
                    <li><a class="icon-bubble" style="color: red;" href="formOpiniones.php" title="Mensajes"><small style="font-size: small;"><?php echo $contar ?></small></a></li>&nbsp;
                    <?php
                } else {
                    ?>
                    <li><a class="icon-bubble" href="formOpiniones.php" title="Mensajes"></a></li>&nbsp;
                    <?php
                }
                ?>


            </div>
        </ul>
    </nav>
</div>
<script type="text/javascript">
    function cerrar() {        
            window.location.href = "php/sesionLogout.php";        
    }
</script>
<script src="js/alerts.js"></script>