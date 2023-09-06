<?php
    include 'php/conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preguntasF.css">
    <!-- scrips que llevara la pagina -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a72414fc5b.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container mt-3 ">
            <div class="row d-flex justify-content-center">
                <?php
                    $sql = "SELECT * FROM famex WHERE id = (SELECT max(id) FROM famex)";
                    $result = mysqli_query($conexion, $sql);
                    $mostrar = mysqli_fetch_array($result);
                ?>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Qué eventos se llevarán a cabo durante la feria?</p></div>
                            <div class="question-back"><i></i><p>-Durante la FAMEX-<?php echo $mostrar['año'] ?> se realizarán. -Cumbre de Rectores. -Seminario de Migración a la Industria Aeroespacial. -Ciclo de Conferencias Técnicas. -Congreso de Mujeres Líderes de la Sociedad e Industria Aeronáutica. -Foro de Educación Aeroespacial.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿El espectáculo aéreo tiene costo?</p></div>
                            <div class="question-back"><i></i><p>No, pero será necesario el requerimiento de “Registro”, y solamente podrá ingresar al espectáculo aéreo el personal que previamente haya obtenido su registro y pasado los filtros sanitarios correspondientes, además de que habrá un aforo limitado para los visitantes.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá venta de alimentos o lugares designados para comer? </p></div>
                            <div class="question-back"><i></i><p>Sí, se contará con áreas de restaurantes y módulos de comida rápida.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá personal que proporcione información de los aviones militares?</p></div>
                            <div class="question-back"><i></i><p>Sí, habrá personal en cada uno de los aviones.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá zonas restringidas en el recinto?</p></div>
                            <div class="question-back"><i></i><p>Sí, (área de operaciones y aquellas otras exclusivas para el personal del comité).</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Mi boleto para la feria incluye la entrada al espectáculo aéreo?</p></div>
                            <div class="question-back"><i></i><p>Sí, el boleto incluye la asistencia durante los tres días de la feria, así como al espectáculo aéreo. </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá puestos de socorro donde se pueda atender alguna emergencia médica?</p></div>
                            <div class="question-back"><i></i><p>Sí, se contará con puestos de socorro fijos distribuidos a lo largo del recinto ferial y móviles, debidamente señalizados. </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá espectáculo aéreo todos los días?</p></div>
                            <div class="question-back"><i></i><p>Solamente habrá espectáculo aéreo el día de la clausura (<?php echo $mostrar['diaFinal'] ?> de <?php echo $mostrar['mes'] ?> de <?php echo $mostrar['año'] ?>)</p></div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <script src="js/preguntasF.js"></script>
    </body>
</html>