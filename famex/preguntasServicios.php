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
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Hay un precio especial para los grupos de instituciones educativas? </p></div>
                            <div class="question-back"><i></i><p>No, el precio será el mismo para todo el público en general.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Qué tipo de vestimenta debo llevar a la FAMEX-<?php echo $mostrar['año'] ?>?</p></div>
                            <div class="question-back"><i></i><p>Para los tres días del <?php echo $mostrar['diaInicio'] ?> al <?php echo $mostrar['diaFinal'] ?> de abril, se recomienda vestir de manera formal y para el día <?php echo $mostrar['diaFinal'] ?>, llevar ropa y calzado cómodo, así como gorra y bloqueador solar. </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Se podrán introducir cualquier tipo de cámaras fotográficas al evento?</p></div>
                            <div class="question-back"><i></i><p>Sí, excepto drones que cuenten con cámaras instaladas ya que no se permitirá el uso de ellos.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Puedo introducir alimentos a la FAMEX-<?php echo $mostrar['año'] ?>?</p></div>
                            <div class="question-back"><i></i><p>No, de ningún tipo ya que se contará en el interior con áreas de venta al público.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿El boleto de la FAMEX-<?php echo $mostrar['año'] ?> es transferible?</p></div>
                            <div class="question-back"><i></i><p>No, ya que el acceso será controlado y verificado por medio de una identificación oficial.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá exposición de las aeronaves?</p></div>
                            <div class="question-back"><i></i><p>Se contará con una exposición estática de aeronaves militares y civiles, nacionales y extranjeras.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Se efectuarán vuelos de los globos aerostáticos?</p></div>
                            <div class="question-back"><i></i><p>No, únicamente se contará con globos aerostáticos en exhibición.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Tendrá costo el ingreso al área de estacionamiento?</p></div>
                            <div class="question-back"><i></i><p>No, se contará con áreas de estacionamiento gratuitas, las cuales serán vigiladas por personal de policía militar.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Habrá vigilancia en las áreas de estacionamiento?</p></div>
                            <div class="question-back"><i></i><p>Sí, habrá personal de policía militar en todo el recinto ferial, así como en el área de estacionamientos.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Se puede ingresar con mascotas?</p></div>
                            <div class="question-back"><i></i><p>No se permitirá el acceso con mascotas de ningún tipo.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿En el horario establecido se puede salir y volver a entrar a FAMEX?</p></div>
                            <div class="question-back"><i></i><p>Si es posible y únicamente con su boleto de acceso y registro, aunque se volverá a pasar por los filtros sanitarios correspondientes, tomándose en cuenta de que habrá un aforo limitado para los visitantes.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-question">
                        <div class="question">
                            <div class="question-face"><i class="fa-regular fa-circle-question"></i><p>¿Hay algún descuento para estudiantes o personas de la tercera edad?</p></div>
                            <div class="question-back"><i></i><p></p>No, el costo es el mismo al público en general.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/preguntasF.js"></script>
    </body>
</html>
