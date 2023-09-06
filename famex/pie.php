<div class="pie">
    <!-- Footer -->
    <footer class="text-center text-white">
        <!-- Grid container -->
        <div class=" p-2 part1">
            <!-- Section: Links -->
            <section class="" style="margin-top: 5%;">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                        <div class="icon-location icon-large"></div>
                        <h5 class=>UBICANOS</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-f" href="https://www.google.com/maps/place/Base+A%C3%A9rea+Militar+No.+1/@19.7361532,-98.9992251,17z/data=!3m1!4b1!4m6!3m5!1s0x85d19331e7e8ac09:0x90e07d92d8efb8c7!8m2!3d19.7361482!4d-98.9966502!16s%2Fg%2F11r9cgf5_1?entry=ttu" target="_blank"> Base Aérea Militar N.º 1 de Santa Lucía
                                    Av Sta Lucía, 55600 Zumpango de Ocampo, Méx.</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                        <div class="icon-phone icon-large"></div>
                        <h5 class="text-uppercase">CONTÁCTANOS</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <!-- <a href="https://wa.me/525566023686?text=Hola%20me%20Interesa%20la%20Famex." class="text-white icon-whatsapp" target="_blank"> + 52 (55) 70985299</a> -->
                                <a class="text-f" href="tel:+ 52 (55) 70985299" class="text-white"> + 52 (55) 70985299</a>
                            </li>
                            <li>
                                <a class="text-f" href="mailto:comercial@f-airmexico.com.mx" class="text-white"> comercial@f-airmexico.com.mx</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                        <div class="icon-earth icon-large"></div>
                        <h5 class="text-uppercase">SIGUENOS</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="https://www.facebook.com/feriaaeroespacialmexico/" class="icon-facebook icon-small" title="Facebook" target="_blank"></a>&nbsp;&nbsp;
                                <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FFAMEXTweet" class="icon-twitter icon-small" title="Twitter" target="_blank"></a>&nbsp;&nbsp;
                                <a href="https://www.instagram.com/famex_oficial/" class="icon-instagram icon-small" title="Instagram" target="_blank"></a>&nbsp;&nbsp;
                                <a href="https://www.linkedin.com/in/famex-mexico-690450172/" class="icon-linkedin icon-small" title="Linkedin" target="_blank"></a>&nbsp;&nbsp;
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
            <!-- Section: Form -->
            <section style="margin-top: 5% ;">
                <form action="contacto.php#opinion1" method="post">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center" style="flex-direction: column;">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                Feria Aeroespacial México
                            </p>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-sm-4 m-auto">
                            <!-- Email input -->
                            <input type="hidden" id="nombre" name="nombre" value="">
                            <input type="hidden" id="asunto" name="asunto" value="">
                            <input type="hidden" id="mensaje" name="mensaje" value="">
                            <div class="mb-4 input-container-fot">
                                <input type="email" id="form5Example21" placeholder="Correo electronico" id="email" name="email" required />
                                <button type="submit" class="">
                                    ENVIAR
                                </button>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3 part2" style="border-top: white solid  0.1px;">
            <?php
            if (!isset($idUsuario)) {
            ?>
                <a href="#login"><img src="img/logofamexblanco.png" alt="Famex" style="width: 85px;"></a>
            <?php
            } else {
            ?>
                <a href="admin.php"><img src="img/logofamexblanco.png" alt="Famex" style="width: 85px;"></a>
            <?php
            }
            ?>
            &nbsp&nbsp&nbsp&nbspFAMEX - Feria Aeroespacial México®. Todos los Derechos Reservados.
            <br>
            <a style="float: right;" class="text-f" href="doc/avisodeprivacidad.pdf" target="_blank">Aviso de Privacidad</a>
            <br>
            <!-- Inicio de sesion oculto para solo administradores de FAMEX -->
            <div id="login" class="overlaylog">
                <div id="popupBodyLog">
                    <div class="popupContent">
                        <form class="form" method="post" action="php/sesion.php">
                            <div class="form-title"><span>Bienvenido</span></div>
                            <div class="title-2"><span>FAMEX</span></div>
                            <div class="input-container">
                                <input class="input-mail" type="email" id="email" name="email" placeholder="Correo Electronico" required>
                                <span> </span>
                            </div>
                            <section class="bg-stars">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </section>
                            <div class="input-container">
                                <input class="input-pwd" type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="submit">
                                <span class="sign-text">Iniciar Sesion</span>
                            </button>
                            <p class="signup-link">
                                ¿Olvidaste tu contraseña?<br>
                                <a href="" class="up">Solicitala al Admin</a>
                            </p>
                        </form>
                    </div>
                    <a id="cerrar" href="">&times;</a>
                </div>
            </div>
            <!-- Inicio de sesion oculto para solo administradores de FAMEX -->
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->