<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<title>Actividades Naturaleza</title>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>

<body>
    <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_actividadesNaturaleza.jpg" alt="actividades en naturaleza">
    </header>  

    <!--Tarjetas-->

    <div class="container text-center">
        <div class="row mx-4 mt-5">
            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/senderismo.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">SENDERISMO</p>
                        <p class="text-dark">Descubre la belleza natural con el senderismo, 
                            un deporte que te invita a explorar paisajes, fusionando ejercicio físico 
                            con la serenidad de la naturaleza. Sumérgete en experiencias al aire libre mientras caminas 
                            por la naturaleza.</p>
                        <form action="senderismo.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/paseoCaballo.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">PASEO A CABALLO</p>
                        <p class="text-dark">Embárcate en una conexión única con la nobleza equina al disfrutar de un paseo a caballo. 
                            Este deporte combina la destreza y el respeto por el animal, permitiéndote explorar entornos rurales mientras 
                            experimentas la elegancia del caballo.</p>
                        <form action="paseoCaballo.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/paseoBurro.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">PASEO EN BURRO</p>
                        <p class="text-dark">Con un encanto peculiar, el paseo en burro es una experiencia relajante 
                            que te lleva a un ritmo tranquilo por pintorescos paisajes. Ideal para toda la familia, 
                            esta actividad ofrece una forma tranquila y nostálgica de disfrutar de la naturaleza.</p>
                        <form action="paseoBurro.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/tiroArco.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">TIRO CON ARCO</p>
                        <p class="text-dark">La precisión y concentración se unen en el tiro con arco, 
                            un deporte ancestral que desafía tu habilidad para apuntar con precisión a un blanco. 
                            Experimenta la fusión de destreza física y mental mientras perfeccionas tu técnica en 
                            un entorno de competición o recreativo.</p>
                        <form action="tiroArco.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/airsoft.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">AIRSOFT</p>
                        <p class="text-dark">Sumérgete en emocionantes batallas simuladas con el airsoft, 
                            un deporte táctico que utiliza réplicas de armas de fuego para disparar proyectiles 
                            no letales. Fomentando la estrategia y el trabajo en equipo, el airsoft ofrece una 
                            experiencia de combate realista en entornos diversos.</p>
                        <form action="airsoft.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/gymkanas.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">GYMKANAS</p>
                        <p class="text-dark">Las gymkanas agregan un toque lúdico y competitivo a la actividad física, 
                            combinando pruebas divertidas y desafíos en un formato de juego. Perfectas para eventos 
                            sociales o actividades de team-building, las gymkanas promueven la colaboración y la diversión.</p>
                        <form action="gymkanas.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Footer-->
    <?php include("includes/footer.php"); ?>
    <script src="video-controls.js"></script>

</body>

</html>