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
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Cómo se adquieren los boletos por internet?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>A través de la página de internet.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Tengo que adquirir un boleto para cada día?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>No, un boleto permite el acceso para los tres días además del espectáculo, siempre y cuando hayan obtenido su “registro” y pasado los filtros sanitarios correspondientes.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Habrá venta de boletos?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Sí, la venta de boletos la podrán encontrar en nuestro sitio web y también en los lugares que posteriormente serán instalados de manera física.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Puedo tomar fotos de las instalaciones?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Está permitido tomar fotos solo durante los días del evento, exclusivamente en el área del recinto ferial, así como a las aeronaves en exposición estática y en vuelos demostrativos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Está permitida la entrada de menores de edad a la feria?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Por cuestiones de seguridad y por ser un evento comercial, se tendrá restringida la entrada a menores de edad; sin embargo, podrán asistir el <?php echo $mostrar['diaFinal'] ?> de <?php echo $mostrar['mes'] ?> de <?php echo $mostrar['año'] ?>, solamente los que cuenten con su registro y pasen los filtros sanitarios correspondientes.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Se puede entrar al evento con las maletas o mochilas?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Si pueden introducirlas; sin embargo, habrá una revisión de las mismas al ingresar al recinto ferial donde no se permitirá introducir alimentos, artículos punzo-cortantes, armas, drones, tiendas de campaña, sombrillas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿A qué áreas puedo acceder con mi acreditación de visitante?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Únicamente a las áreas de exposición comercial (comida rápida, souvenirs y activaciones de patrocinadores).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-question">
                    <div class="question">
                        <div class="question-face"><i class="fa-regular fa-circle-question"></i>
                            <p>¿Puedo asistir a los foros educativos?</p>
                        </div>
                        <div class="question-back"><i></i>
                            <p>Sí, pero se sugiere consultar el programa y seleccionar la conferencia que le interesa, ya que el cupo será limitado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/preguntasF.js"></script>
</body>

</html>