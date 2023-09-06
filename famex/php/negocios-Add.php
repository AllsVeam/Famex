<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtenemos los valores del formulario
    $idFamex = $_POST['idFamex'];

    if (isset($_POST['id'])) {
        $id = $_POST['id']; // Id del registro a actualizar
        $descripcion = $_POST['descripcion'][0];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $consulta = "UPDATE areanegocios SET idFamex = '$idFamex', descripcion = '$descripcion', imagen = '$imagen' WHERE id = $id ";
        } else {
            $consulta = "UPDATE areanegocios SET idFamex = '$idFamex', descripcion = '$descripcion' WHERE id = $id ";
        }        
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<script type="text/javascript">
                window.location.href="../formNegocios.php?actualizar=1";
                mysqli_close($conexion);
                </script>';
        } else {
            echo 'error en la actualizacion del registro' . mysqli_error($conexion);
        }
    } else {
        if (isset($_POST['descripcion']) && is_array($_POST['descripcion'])) {
            $descripciones = $_POST['descripcion'];
            $idFamex = $_POST['idFamex'];
            
            // Verificar si se envió una matriz de imágenes y si tiene la misma cantidad de elementos que las descripciones
            if (isset($_FILES['imagen']) && is_array($_FILES['imagen']['tmp_name']) && count($_FILES['imagen']['tmp_name']) === count($descripciones)) {
                $imagenes = $_FILES['imagen'];
                $numElementos = count($descripciones);
                
                // Iterar sobre los elementos
                for ($i = 0; $i < $numElementos; $i++) {
                    $descripcion = $descripciones[$i];
                    $imagen = addslashes(file_get_contents($imagenes['tmp_name'][$i]));
                    
                    // Realizar la inserción en la base de datos
                    $consulta = "INSERT INTO areanegocios (descripcion, imagen, idFamex) VALUES ('$descripcion', '$imagen', '$idFamex')";
                    $resultado = mysqli_query($conexion, $consulta);
                    
                    // Verificar el resultado de la consulta
                    if ($resultado) {
                        echo '<script type="text/javascript">
                            window.location.href="../formNegocios.php?agregar=1";
                            mysqli_close($conexion);
                            </script>';
                    } else {
                        echo 'error en la inserción del registro ' . ($i + 1) . ': ' . mysqli_error($conexion);
                    }
                }
            } else {
                echo 'No se proporcionaron imágenes válidas para todos los elementos';
            }
        } else {
            echo 'No se proporcionaron descripciones válidas';
        }
    }
}

?>