<?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $id = $_POST['id'];
        $archivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        
        $sql = "UPDATE expositores SET archivo = '$archivo' WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formAreaExp.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }                    
        
    }
?>