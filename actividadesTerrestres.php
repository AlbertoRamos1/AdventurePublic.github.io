<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<title>Actividades Terrestres</title>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>


<body>

    <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_actividadesMontana.jpg" alt="actividades terrestres">
    </header>

    <!--Tarjetas-->

    <div class="container text-center">
        <div class="row mx-4 mt-5 justify-content-center">
            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/downhill.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">DOWNHILL</p>
                        <p class="text-dark">Sumérgete en la adrenalina del downhill, un vertiginoso deporte 
                            de descenso en bicicleta que desafía la velocidad y la destreza técnica. Desciende 
                            pendientes empinadas y terrenos accidentados, sorteando obstáculos y curvas cerradas, 
                            para una experiencia emocionante y llena de aventura.</p>
                        <form action="downhill.php" method="POST">
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/alpinismo.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">ALPINISMO</p>
                        <p class="text-dark">El alpinismo es la conquista de altas cumbres y paisajes majestuosos. 
                            Este deporte combina resistencia física, habilidades técnicas y determinación para ascender 
                            montañas, enfrentando terrenos rocosos, glaciares y condiciones climáticas extremas, 
                            ofreciendo una conexión única con la naturaleza y el desafío personal.</p>
                        <form action="alpinismo.php" method="POST">
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/barranquismo.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">BARRANQUISMO</p>
                        <p class="text-dark">Aventúrate en los cañones y desfiladeros con el barranquismo, una fusión de 
                            senderismo, escalada y natación. Desciende por cursos de agua, salta a pozas naturales y 
                            rappela por cascadas, experimentando la emoción de explorar entornos acuáticos escarpados 
                            de manera única.</p>
                        <form action="barranquismo.php" method="POST">
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/escaladaTarjetas.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">ESCALADA</p>
                        <p class="text-dark">La escalada es un desafío vertical que combina fuerza, resistencia 
                            y habilidad. Tanto en paredes naturales como en rocódromos artificiales, los escaladores 
                            superan obstáculos verticales, utilizando manos y pies para ascender con precisión, 
                            concentración y valentía.</p>
                        <form action="escalada.php" method="POST">
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/trekking.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">TREKKING</p>
                        <p class="text-dark">Embárcate en una jornada de exploración con el trekking, 
                            un deporte que te lleva a través de senderos naturales y paisajes remotos. Ya sea en 
                            montañas o bosques, el trekking ofrece una experiencia de conexión con la naturaleza, 
                            permitiéndote disfrutar mientras superas desafíos físicos.</p>
                        <form action="trekking.php" method="POST">
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--Footer-->
    <?php include("includes/footer.php"); ?>
</body>

</html>