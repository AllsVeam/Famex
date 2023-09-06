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
        <div class="container mt-8">
            <div class="row d-flex justify-content-center">
                <?php
                    $sql = "SELECT * FROM famex WHERE id = (SELECT max(id) FROM famex)";
                    $result = mysqli_query($conexion, $sql);
                    $mostrar = mysqli_fetch_array($result);
                ?>
                <div class="col-sm-6">
                    <div  class="card-question">
                        <div class="question" height="90%">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Qué es la feria aeroespacial?</p></div>
                            <div class="question-back"><i></i><p>Una actividad del ámbito aeronáutico civil, comercial, militar y de defensa, con objeto de reunir a los líderes de la industria y servicios de la aviación, a fin de favorecer el intercambio comercial e impulsar el crecimiento de la industria aeroespacial en un país o región.
                            </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Dónde se llevará a cabo?</p></div>
                            <div class="question-back"><i></i><p>La Feria Aeroespacial México <?php echo $mostrar['año'] ?>, se llevará a cabo en las instalaciones de la Base Aérea Militar No. 1, ubicada en Santa Lucía, Estado de México.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question" >
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Cuándo se llevará a cabo la feria aeroespacial México <?php echo $mostrar['año'] ?>?</p></div>
                            <div class="question-back"><i></i><p>Se llevará a cabo del <?php echo $mostrar['diaInicio'] ?> al <?php echo $mostrar['diaFinal'] ?> de <?php echo $mostrar['mes'] ?> del <?php echo $mostrar['año'] ?>.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Quiénes asisten?</p></div>
                            <div class="question-back"><i></i><p>Asisten expositores, empresarios nacionales e internacionales del sector aeronáutico, así como escuelas de aviación y visitantes en general interesados en el desarrollo aeronáutico de México y otros países. </p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Cuál es el horario de la FAMEX-2023? </p></div>
                            <div class="question-back"><i></i><p>De las 0900 a las 1700 durante los días <?php echo $mostrar['diaInicio'] ?>, 27 y 28; y de las 0600 a las 1400 el día <?php echo $mostrar['diaFinal'] ?> de <?php echo $mostrar['mes'] ?> <?php echo $mostrar['año'] ?>.</p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿La entrada es libre?</p></div>
                            <div class="question-back"><i></i><p>Todos los días el acceso será controlado con los requisitos y únicamente podrá entrar quien cuente con boleto y pase los filtros sanitarios correspondientes. </p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Cuánto cuesta el boleto de entrada? </p></div>
                            <div class="question-back"><i></i><p>$406.00 (cuatrocientos seis pesos M.N.) si la compra se realiza en línea mediante la página oficial de la FAMEX, y tendrá un precio de $350.00 (trescientos cincuenta pesos M.N) cuando la venta sea de manera física en los establecimientos que posteriormente serán instalados.</p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Dónde puedo conseguir los boletos? </p></div>
                            <div class="question-back"><i></i><p>Se otorgarán medio dinámicas en redes sociales donde se darán aviso de como poder obtenerlo y las fechas, además de conseguirlos por internet a través de nuestro sitio web y también en los lugares que posteriormente serán instalados de manera física.</p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿A partir de qué horario se podrá accesar para asistir a la feria?</p></div>
                            <div class="question-back"><i></i><p>El horario de acceso, será a partir de las 06:00 horas.</p></div>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Dónde puedo obtener información sobre el programa de la "FAMEX-<?php echo $mostrar['año'] ?>"? </p></div>
                            <div class="question-back"><i></i><p>En la página oficial se publicará el programa general de eventos a realizarse en la feria.</p></div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <script src="js/preguntasF.js"></script>
    </body>
</html>
