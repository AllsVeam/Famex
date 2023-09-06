<header class="header" style="background-image: url('img/barra_menu.jpg'); background-size: cover; ">
    <?php
    $sql = "SELECT * FROM famex WHERE id = (SELECT max(id) from famex)";
    $consulta = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($consulta);
    $logo1 = $resultado['logo'];
    $logo2 = $resultado['logoBla'];
    $logo3 = $resultado['logoDor'];
    $año = $resultado['año'];
    $descripcion= $resultado['descripcion'];
    ?>
    <!-- <a href="index.php"><img src="data:image/jpg;base64, <?php echo base64_encode($logo2) ?>  " alt="Famex"
            style="width: 75px;"></a> -->
    <a href="index.php"><img
            src="<?php echo $logo2 != null ? 'data:image/jpg;base64,' . base64_encode($logo2) : 'img/logofamexblanco.png' ?>"
            alt="Famex" style="width: 75px;"></a>
    <div class="faltan">Faltan: <br>
        <div class="contador" id="clock"></div>
    </div>
    <nav class="navigation" style="margin-top: -15px;">
        <div id="nav" class="main-nav">
            <ul class="link-item1">
                <li><a class="link-item" href="index.php">Inicio</a></li>
                <li><a class="link-item">Evento</a>
                    <ul>
                        <li><a class="link-item" href="evento.php">Evento</a></li>
                        <li><a class="link-item" href="expositores.php">Expositores</a></li>
                        <li><a class="link-item" href="invitadoH.php">Invitado de Honor</a></li>
                        <li><a class="link-item" href="preguntasF.php">Preguntas frecuentes</a></li>
                    </ul>
                </li>
                <li><a class="link-item">Multimedia</a>
                    <ul>
                        <li><a class="link-item" href="areaNegocios.php">Area de Negocios</a></li>
                        <li><a class="link-item" href="espectaculos.php">Espectaculo </a></li>
                        <li><a class="link-item" href="videoteca.php">Videoteca </a></li>
                        <li><a class="link-item" href="https://players.visualplan.net/p/hBmzMHex"
                                target="_blank">Recorrido Vistual Famex 2021</a></li><br>
                        <li><a class="link-item" href="#">Descargables</a>
                            <ul style="top:-54px; left:300px; width:250px;">
                                <li><a class="link-item" href="php/visualizar_pdf.php?id=1" target="_blank">Layout
                                        <?php echo $año ?>
                                    </a>
                                </li>
                                <li><a class="link-item" href="php/visualizar_pdf.php?id=2" target="_blank">Manual de
                                        expositores</a></li>
                                <li><a class="link-item" href="php/visualizar_pdf.php?id=3" target="_blank">Programa
                                        Ganeral</a></li>
                                <li><a class="link-item">Guía del piloto</a>
                                    <ul style="top:-53px; left:250px; width:120px;">
                                        <li><a class="link-item" href="php/visualizar_pdf.php?id=4"
                                                target="_blank">Español</a></li>
                                        <li><a class="link-item" href="php/visualizar_pdf.php?id=5"
                                                target="_blank">Inglés</a></li>
                                        <li><a class="link-item" href="php/visualizar_pdf.php?id=6"
                                                target="_blank">Francés</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="link-item" href="prensa.php">Prensa</a></li>
                <li><a class="link-item" href="#">Servicios</a>
                    <ul>
                        <!-- Consulta DBs Servicios -->
                        <?php                        
                        $sql = "SELECT * FROM tiposer";
                        $result = mysqli_query($conexion, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                            <li>
                                <a class="link-item" href="servicios.php?id=<?php echo $mostrar['id'] ?>">
                                    <?php echo $mostrar['nombre'] ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a class="link-item" href="contacto.php">Contacto</a></li>
                <li><a class="link-item" href="registro.html">Adquiere tus boletos</a></li>
            </ul>
        </div>
    </nav>
    <button id="button-menu" class="button-menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>