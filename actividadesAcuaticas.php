<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<title>Actividades Acuáticas</title>


<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>

<body>
    <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_actividadesAcuaticas.jpg" alt="actividades acuaticas">
    </header>


    <!--Tarjetas-->

    <div class="container text-center">
        <nav class="row mx-4 mt-5">
        <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/rafting.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">RAFTING</p>
                        <p class="text-dark">El rafting es una emocionante aventura acuática que implica 
                            descender ríos tumultuosos en balsas inflables. Experimenta la intensidad de 
                            los rápidos mientras trabajas en equipo para sortear obstáculos acuáticos, 
                            sumergiéndote en la naturaleza.</p>
                        <form action="rafting.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/kayakTarjetas.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">KAYAK</p>
                        <p class="text-dark">Tanto para navegantes solitarios como para equipos, el 
                            kayak ofrece una experiencia única en aguas tranquilas o bravas. Con destreza 
                            y agilidad, los kayakistas exploran ríos, lagos y mares, fusionando la conexión 
                            con el entorno acuático y la emoción de deslizarse sobre las olas.</p>
                        <form action="kayak.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/motosDeAgua.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">MOTOS DE AGUA</p>
                        <p class="text-dark">Acelera tu aventura con las motos de agua, 
                            experimentando la velocidad y la libertad mientras surfeas sobre las olas. 
                            Desde emocionantes travesías hasta giros audaces, esta actividad náutica 
                            proporciona mucha adrenalina para los amantes de la velocidad.</p>
                        <form action="motosAgua.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/pesca.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">PESCA</p>
                        <p class="text-dark">Sumérgete en la paz y la paciencia de la pesca, 
                            ya sea en serenos lagos, ríos caudalosos o en alta mar. Este deporte 
                            combina la conexión con la naturaleza y la habilidad técnica, ofreciendo 
                            a los pescadores la oportunidad de disfrutar de la tranquilidad mientras 
                            esperan la captura perfecta.</p>
                        <form action="pesca.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/canoa.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">CANOA</p>
                        <p class="text-dark">La canoa brinda una experiencia de navegación versátil, 
                            ya sea para disfrutar de un paseo relajante o enfrentar corrientes desafiantes. 
                            Con su diseño abierto, la canoa permite explorar ríos y lagos, ofreciendo una fusión única 
                            de ejercicio físico, conexión con la naturaleza y diversión acuática en equipo.</p>
                        <form action="canoa.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="card-img-top" src="/assets/img/vela.jpg" alt="Card image">
                    <div class="card-body">
                        <p class="p-titulos-index-cards">VELA</p>
                        <p class="text-dark">Embárcate en una travesía serena con la vela. 
                            Los navegantes exploran cuerpos de agua de manera ecoamigable, 
                            combinando destreza náutica con la belleza de la navegación. Ya sea en pequeñas embarcaciones 
                            o veleros más grandes, la vela ofrece una experiencia relajante en el medio acuático.</p>
                        <form action="vela.php" method="POST">
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    </div>



    <!--Footer-->
    <?php include("includes/footer.php"); ?>

</body>

</html>