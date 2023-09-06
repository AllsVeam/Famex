<?php
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 600;
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        echo '<script type="text/javascript">                
                window.location.href="php/sesionLogout.php";
          </script>';
    }
}
// El siguiente key se crea cuando se inicia sesión
$_SESSION["timeout"] = time();
?>