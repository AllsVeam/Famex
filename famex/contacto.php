<?php
include 'php/conexion.php';
include 'php/sesionActVis.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Feria Aeroespacial México</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logofamexcolores.ico">
    <link rel="apple-touch-icon" href="img/logofamexcolores.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logofamexcolores72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logofamexcolores114x114.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Hojas de estilo personalizadas -->
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/flotante.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/popup-redes.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/contacto.css">
    <!--  -->

    <!-- scrips que llevara la pagina -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Barra de navegacion contara con una condicion en la cual cuando un usuario inicie sesion aparece su informacion-->
    <?php
    include 'menu.php';
    if (isset($idUsuario)) {
        include "menuAdmin.php";
    }
    ?>

    <!-- Informacion general de la Pagina -->
    <div>
        <?php include 'botonesFlo.html' ?>
    </div>
    <div class="">
        <!-- En este apartado va a ir el cuerpo de pagina y llevara las consultas a la base -->
        <div class="container-xl-12 cont"><br></div>
        <section class="text-center">
            <div class="animation-left" style="width: 80%; margin:auto;">
                <h1 class="title-conteiner">
                    <div class="decoration-left"></div>
                    <span class="title">Contactó</span>
                    <div class="decoration-rigth"></div>
                </h1>
            </div>
            <div class="row justify-content-center m-3 animation-top">
                <div class="col-sm-10 mb-2">
                    <div class="" style=" float: right;">
                        <button id="exportBtn-excel" class="btn">EXCEL</button>
                        <button id="exportBtn-pdf" class="btn">PDF</button>
                    </div>
                </div>
                <div class="col-sm-10">
                    <table id="myTable" class="table table table-hover">
                        <thead>
                            <tr>
                                <th>Departamento</th>
                                <th>Encargado</th>
                                <th>Numero telefónico</th>
                                <th>Correo Electronico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM contacto";
                            $result = mysqli_query($conexion, $sql);

                            while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $mostrar['area'] ?>
                                    </td>
                                    <td>
                                        <?php echo $mostrar['encargado'] ?>
                                    </td>
                                    <td>
                                        <a href="tel: +52<?php echo $mostrar['tel1'] ?>"> + (52) <?php echo $mostrar['tel1'] ?> </a>
                                        <?php echo ($mostrar['tel2']) ? '<br><a href="tel: +52 ' . $mostrar['tel2'] . '"> + (52)' . $mostrar['tel2'] . '</a>' : '' ?>
                                    </td>
                                    <td>
                                        <a href="mailto:<?php echo $mostrar['correo1'] ?> "><?php echo $mostrar['correo1'] ?></a>
                                        <?php echo ($mostrar['correo2']) ? '<br><a href="mailto: ' . $mostrar['correo2'] . '"> ' . $mostrar['correo2'] . '</a>' : '' ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container-sm bg-dark mt-5 " style="height: 1px; border-radius: 25%;width:80%;"></div>
            <div class="row justify-content-center p-3 animation-top m-0">
                <div class="col-sm-6">
                    <div id="opinion1" class="text-center m-4">
                        <h3>Compartenos tu opinión</h3>
                    </div>
                    <?php
                    isset($_POST['email']) ? $email = $_POST['email'] : $email = "";
                    ?>
                    <form id="contactForm" class="" action="php/opiniones-Add.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" placeholder="Tu Nombre" value=""
                                    data-msg-required="Por favor ingresa tu nombre." maxlength="50" minlength="5"
                                    class="form-control form-control-lg py-3 text-3" name="nombre" id="nombre" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="email" placeholder="Tu correo electrónico"
                                    style="<?php echo isset($_POST['email']) ? 'color: rgb(0, 179, 179);' : ''; ?>"
                                    value="<?php echo $email ?>"
                                    data-msg-required="Por favor ingresa tu correo electrónico."
                                    data-msg-email="Por favor ingresa un correo electrónico válido" maxlength="50"
                                    class="form-control form-control-lg py-3 text-3" name="email" id="email"
                                    required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" minlength="10" title="Maximo 100 caracteres" placeholder="Asunto"
                                    value="" data-msg-required="Escribe un Asunto." maxlength="100"
                                    class="form-control form-control-lg py-3 text-3" name="asunto" id="asunto"
                                    required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <textarea maxlength="5000" placeholder="Mensaje" data-msg-required="Escribe un Mensaje."
                                    rows="10" class="form-control form-control-lg py-3 text-3" name="mensaje"
                                    id="mensaje" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Enviar Mensaje"
                                    class="btn btn-outline btn-dark text-2 font-weight-semibold text-uppercase px-5 btn-py-3"
                                    data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5 top">
                    <div class="text-center m-5">
                        <h3>Ubicanos</h3>
                    </div>
                    <div id="map-container" class="z-depth-1 wow fadeIn" style="height: 25rem; width:100%;"></div>
                </div>
            </div>
        </section>
    </div>
    <div>
        <?php
        include 'pie.php';
        include 'alertas.html';
        ?>
    </div>
    <!-- scripts creados apra funcion de la pagina -->
    <script src="js/menu.js"></script>
    <script src="js/popups.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/contacto.js"></script>
    <script src="js/alerts.js"></script>
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script src="js/mapa.js"></script>
    <!--Convierte excel y pdfs-->
    <script src="//unpkg.com/tableexport.jquery.plugin@1.27.0/tableExport.min.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"
        crossorigin="anonymous"></script>
    <!-- Consulta para ectraer la fecha del evento -->
    <?php
    include 'contador.php'
        ?>
    <!-- Esta en la funcion asincrona para ver el perfil de Facebook de Famex -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0"
        nonce="DUfGB1BZ"></script>
</body>

</html>