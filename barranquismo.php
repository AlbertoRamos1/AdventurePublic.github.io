<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<title>Barranquismo</title>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>


<body>
    <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_barranquismo.jpg" alt="barranquismo">
    </header>

    <section class="row mt-5 mb-4 text-center">

        <div class="col-12 col-lg-8">
            <img class="img-fluid" src="assets\img\barranquismo.jpg" alt="">
        </div>

        <div class="col-12 col-lg-3 border border-radius padding-carrito">
            <h1>RESERVA</h1>
            <div class="row margin-elementos-carrito">
                <div class="col">
                    <p>Fecha:</p>
                </div>
                <div class="col"><i class="fa-regular fa-calendar-days"></i></div>
            </div>
            <div class="row margin-elementos-carrito">
                <div class="col">
                    <p>Hora:</p>
                </div>
                <div class="col">
                    <select class="form-select">
                        <option>10:00h</option>
                        <option>12:00h</option>
                        <option>18:00h</option>
                        <option>20:00h</option>
                    </select>
                </div>
            </div>
            <div class="row m-3">
                <div class="col">
                    <p>Dificultad:</p>
                </div>
                <div class="col">
                    <div class="col">
                        <select class="form-select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col">
                    <p>Cantidad:</p>
                </div>
                <div class="col"><input type="number" class="form-control border border-primary border-radius"></div>
            </div>
            <div class="row m-3">
                <h2>37,50€</h2>
            </div>
            <form action="finalizar.php" method="POST" class="row m-3">
                <button type="submit" class="button-generic1">Confirmar</button>
            </form>
        </div>

        <div class="container text-center mt-3 px-5">
            <p>Aventúrate en los cañones y desfiladeros con el barranquismo, una fusión de 
                            senderismo, escalada y natación. Desciende por cursos de agua, salta a pozas naturales y 
                            rappela por cascadas, experimentando la emoción de explorar entornos acuáticos escarpados 
                            de manera única.</p>
        </div>
    </section>

    <section class="container mb-5">
        <section class="row">
            <p class=" tal-vez-te-interese"> Tal vez te interese...</p>
        </section>

        <section class="row p-3">
            <!--Card 1-->
            <div class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/tiroArco.jpg"/>
                    <div class="card-body d-flex flex-column align-items-center">
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
            
            <!--Card 2-->
            <div class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/barranquismo.jpg"/>
                    <div class="card-body d-flex flex-column align-items-center">
                        <p class="p-titulos-index-cards">BARRANQUISMO</p>
                        <p class="text-dark">Aventúrate en los cañones y desfiladeros con el barranquismo, una fusión de 
                            senderismo, escalada y natación. Desciende por cursos de agua, salta a pozas naturales y 
                            rappela por cascadas, experimentando la emoción de explorar entornos acuáticos escarpados 
                            de manera única.</p>
                        <form action="barranquismo.php" method="POST"> 
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </div>

            <!--Card 3-->
            <div class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/trekking.jpg"/>
                    <div class="card-body d-flex flex-column align-items-center">
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
        </section>
    </section>
    <!--Footer-->
    <?php include("includes/footer.php"); ?>

</body>

</html>