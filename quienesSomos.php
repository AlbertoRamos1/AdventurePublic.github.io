<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_quienesSomos.jpg" alt="quienes somos">
    </header>
    <main class="main_quienes">
        <section>

            <div class="container cuadrado mt-5 mb-5">
                <div class="row">
                    <div class="col-lg elemento">
                        <img src="/assets/img/logoNegativo.png" class="img-fluid ancho">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg elemento">
                        <p class="texto text-light">Si te gustan las aventuras de riesgo, ésta es tu página.<br>
                            Somos una empresa dedicada a deportes de riesgo,<br>
                            date una vuelta por nuestra página y descúbrenos.<br>
                            <br>
                            Échale un vistazo a nuestro RSC puede interesarte<br>
                            y podrás descubrir nuestro compromiso<br>
                            social.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg elemento">
                        <button type="submit" class="button-quienes-somos"><a href="rsc.php">RSC</a></button>
                    </div>
                </div>
            </div>
            <div class="container cuadrado mt-5 mb-5">
                <div class="row">
                    <div class="col-lg textoDos">
                        <p class="texto text-light">Esta empresa se inició entre 4 entusiastas de las
                            aventuras, por
                            eso
                            hacemos nuestro
                            trabajo con toda la pasión e ilusión.
                            Tenemos un montón de actividades:
                            acuáticas, terrestres o en la naturaleza.</p>
                    </div>
                    <div class="col-lg">
                        <img src="/assets/img/quienessomosfree.jpg" class="img-fluid">
                    </div>
                </div>
            </div>

            <!--Video-->
            <div class="container">
                <p class="p-titulos-index-cards text-primary">DISFRUTA DE LA BELLEZA DE NUESTRAS SIERRAS SUBBÉTICAS Y
                    DEL EMBALSE MÁS GRANDE DE ANDALUCÍA</p>
                <div class="row justify-content-center">
                    <div class="col-8 px-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="miVideo" class="embed-responsive-item img-fluid">
                                <source src="assets/video/Canoa.mp4" type="video/mp4">
                                Tu navegador no soporta la etiqueta de video.
                            </video>
                            <div id="misControles" class="d-flex justify-content-between">
                                <button class="ms-2 video-control <?php echo "text-" . $NAVBAR_CLASS; ?>"
                                    onclick="playPause()">
                                    <i id="playPauseIcon" class="fas fa-play"></i>
                                </button>

                                <div class="d-flex me-2">
                                    <button class="video-control <?php echo "text-" . $NAVBAR_CLASS; ?>"
                                        onclick="toggleMute()">
                                        <i id="muteIcon" class="fas fa-volume-off"></i>
                                    </button>

                                    <button class="video-control <?php echo "text-" . $NAVBAR_CLASS; ?>"
                                        onclick="bajarVolumen()">
                                        <i class="fas fa-volume-down"></i>
                                    </button>
                                    <button class="video-control <?php echo "text-" . $NAVBAR_CLASS; ?>"
                                        onclick="subirVolumen()">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container cuadrado text-light mt-5 mb-5">
                <div class="row">
                    <div class="col-lg">
                        <h1>Integrantes</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="texto">Diseñador Web</p>
                        <p>
                            Jose Maria Caballero Muñoz<br>
                            josemariacm23@gmail.com
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="texto">Diseñador Web</p>
                        <p>
                            Rafael Gómez Cruz<br>
                            rafa@gmail.com
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p class="texto">Diseñador Web</p>
                        <p>
                            Antonio José Chacón Serrano<br>
                            antonio@gmail.com
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="texto">Diseñador Web</p>
                        <p>
                            Alberto Ramos Campos<br>
                            alberto@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="video-controls.js"></script>
    <?php include("includes/footer.php"); ?>
</body>

</html>