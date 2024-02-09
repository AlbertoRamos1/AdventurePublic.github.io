<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<title>Juegos</title>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>

<body>
    <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabeceraJuegos.jpg" alt="juegos">
    </header>


    <!--Tarjetas-->

    <div class="container text-center">
        <div class="row mx-4 mt-5">
            <div class="col-12 col-lg-6 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/TarjetaArco.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">SHOOT AND WIN</p>
                        <p class="p-titulos-index-cards">José María Caballero</p>
                        <p class="text-dark">Shoot and Win es un minijuego inspirado en nuestra actividad de tiro con arco, sen el que tendrás que acertar en la diana hasta 10 veces mientras se mueve tu personaje. Practica y avanza por sus diferentes niveles de dificultad. ¿Podrás conseguirlo?</p>
                        <form action="juegoChema.php" method="POST">
                            <button type="submit" class="button-generic1">Jugar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/tarjetaBurro.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">PON LA COLA AL BURRO</p>
                        <p class="p-titulos-index-cards">Rafael Gómez</p>
                        <p class="text-dark">Versión digital del tradicional juego de fiestas infantiles 
                            y campamentos, en la que tendrás que intentar colocar la cola a través de la
                            oscuridad, arrastrandola hasta el lugar correcto. Guíate por tu intuición y                    
                            consigue puntos por tus aciertos.</p>
                        <form action="juegoRafa.php" method="POST">
                            <button type="submit" class="button-generic1">Jugar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/TarjetaArk.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">ARKADVENTTURE</p>
                        <p class="p-titulos-index-cards">Alberto Ramos</p>
                        <p class="text-dark">ArkAdventture es un juego de tipo arkanoid, en el que 
                            controlas a un hombre en una canoa que debe romper unos bloques de piedra 
                            con una pelota. El objetivo es eliminar todos los bloques de cada nivel sin perder la pelota. 
                            Es un juego divertido y desafiante que pone a prueba tu habilidad y reflejos.</p>
                        <form action="juegoAlberto.php" method="POST">
                            <button type="submit" class="button-generic1">Jugar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-4">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="card-img-top" src="/assets/img/TarjetaCanoa.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">PEPE EL PESCADOR</p>
                        <p class="p-titulos-index-cards">Antonio José Chacón</p>
                        <p class="text-dark">En este pequeño juego manejas a Pepe el pescador, 
                            a Pepe le gusta tomar sus paseos en canoa diarios, aunque algunas 
                            veces las corrientes se ponen un poco revoltosas. Esquiva los obstaculos 
                            durante el mayor tiempo posible para que Pepe pueda estar a salvo. 
                            Juego al más puro estilo Arcade, que conseguirá llevarte a la infancia.</p>
                        <form action="juegoChacon.php" method="POST">
                            <button type="submit" class="button-generic1">Jugar</button>
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