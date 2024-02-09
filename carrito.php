<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>

    <header>
        <img class="img-fluid" src="./assets/img/cabecera_carrito.jpg" alt="carrito">
    </header>
    <main class="container page-section">
        <section class="row d-flex mx-3">
            <div class="col-12 col-lg-8 border border-radius">
                <div class="row d-none d-lg-flex border-bottom m-3">
                    <div class="col-6 text-primary letra-titulos">ACTIVIDAD</div>
                    <div class="col-2 text-primary elemento-centrado letra-titulos">PRECIO</div>
                    <div class="col-2 text-primary elemento-centrado letra-titulos">CANTIDAD</div>
                    <div class="col-2 text-primary elemento-centrado letra-titulos">SUBTOTAL</div>
                </div>

                <!--Primer producto-->
                <article>
                    <div class="row border-bottom m-3">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-4 elemento-centrado">
                                    <img src="/assets/img/escalada.jpg" alt="Escalada" class="imagen-carrito" />
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <p class=" col-12 mb-1">Escalada</p>
                                        <p class=" col-12">(20/12/2023 - 11:00 h.)</p>
                                        <div class="col-6 d-lg-none elemento-centrado">14,00 €</div>
                                        <div class="col-6 d-lg-none">
                                            <div class="row">
                                                <div class="num-block skin-2">
                                                    <div class="num-in">
                                                        <span class="minus dis"></span>
                                                        <input type="text" class="in-num" value="5">
                                                        <span class="plus"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-lg-none">
                                <div class="col-6">
                                    <p class="letra-titulos text-primary">SUBTOTAL</p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p class="letra-titulos">14,00 €</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">14,00 €</div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">
                            <div class="row">
                                <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis"></span>
                                        <input type="text" class="in-num" value="5">
                                        <span class="plus"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">70,00 €</div>
                    </div>
                </article>

                <!--Segundo producto-->
                <article>
                    <div class="row border-bottom m-3">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-4 elemento-centrado">
                                    <img src="/assets/img/kayak.jpg" alt="Escalada" class="imagen-carrito" />
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <p class=" col-12 mb-1">Kayak</p>
                                        <p class=" col-12">(24/11/2023 - 10:00 h.)</p>
                                        <div class="col-6 d-lg-none elemento-centrado">14,00 €</div>
                                        <div class="col-6 d-lg-none">
                                            <div class="row">
                                                <div class="num-block skin-2">
                                                    <div class="num-in">
                                                        <span class="minus dis"></span>
                                                        <input type="text" class="in-num" value="1">
                                                        <span class="plus"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-lg-none">
                                <div class="col-6">
                                    <p class="letra-titulos text-primary">SUBTOTAL</p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p class="letra-titulos">14,00 €</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">14,00 €</div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">
                            <div class="row">
                                <!--CF2: este row no tiene col dentro!-->
                            <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis"></span>
                                        <input type="text" class="in-num" value="5">
                                        <span class="plus"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-none d-lg-flex elemento-centrado">70,00 €</div>
                    </div>
                </article>

                <!--Botones-->
                <article>
                    <div class="row m-3">
                        <div class="col-4 mt-2 text-start">
                            <button type="" class="button-carrito">Volver</button>
                        </div>
                        <div class="col-8 mt-2 text-end">
                            <button type="" class="button-carrito">Actualizar</button>
                        </div>
                    </div>
                </article>
            </div>


            <!--Hueco entre cols-->
            <div class="col-12 col-lg-1">
                <p class="text-light"></p>
            </div>

            <!--Total carrito-->
            <article class="col-12 col-lg-3 border border-radius padding-carrito">
                <div class="row">
                    <div class="col">
                        <p class="letra-titulos titulo-carrito elemento-centrado">Total carrito</p>
                    </div>
                </div>
                <div class="row border-bottom margin-elementos-carrito">
                    <div class="col">
                        <p>Subtotal:</p>
                    </div>
                    <div class="col">
                        <p class="letra-titulos text-end">69,42 €</p>
                    </div>
                </div>
                <div class="row border-bottom margin-elementos-carrito">
                    <div class="col">
                        <p>IVA:</p>
                    </div>
                    <div class="col">
                        <p class="letra-titulos text-end">21%</p>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col">
                        <p>Total:</p>
                    </div>
                    <div class="col">
                        <p class="letra-titulos text-end">84,00 €</p>
                    </div>
                </div>
                <form action="finalizar.php" method="POST" class="row m-3">
                    <button type="submit" class="button-generic1">Confirmar</button>
                </form>
            </article>
        </section>

        <section class="row mt-3">
            <p class=" tal-vez-te-interese"> Tal vez te interese...</p>      
        </section>

        <section class="row p-3">
            <!--Card 1-->
            <article class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/tiroArco.jpg" />
                    <div class="card-body d-flex flex-column align-items-center">
                        <p class="p-titulos-index-cards">TIRO CON ARCO</p>
                        <p class="text-dark">Embárcate en la antigua disciplina del tiro con arco, donde la destreza y la concentración se encuentran. Con arco en mano, apunta con precisión y suelta la flecha, experimentando la fusión de habilidad y conexión con la naturaleza. Un desafío que une la elegancia técnica con la emoción.</p>
                        <form action="finalizar.php" method="POST">
                            <button type="submit" class="button-generic1">Reserva</button>
                        </form>
                    </div>
                </div>
            </article>

            <!--Card 2-->
            <article class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto1 overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/kayakTarjetas.jpg" />
                    <div class="card-body d-flex flex-column align-items-center">
                        <p class="p-titulos-index-cards">BARRANQUISMO</p>
                        <p class="text-dark">Adéntrate en el barranquismo, experiencia extrema que fusiona descensos, rappel y natación. Guiado por expertos, desafía cascadas y rocas, explorando barrancos ocultos. Una aventura única que combina adrenalina, exploración y conexión natural.</p>
                        <form action="finalizar.php" method="POST"> 
                            <button type="submit" class="button-generic2">Reserva</button>
                        </form>
                    </div>
                </div>
            </article>

            <!--Card 3-->
            <article class="col-12 col-lg-4 px-3 mb-3 d-flex justify-content-center">
                <div class="card tarjeta-con-texto2 overflow-hidden">
                    <img class="d-block w-100" alt="" src="./assets/img/trekking.jpg" />
                    <div class="card-body d-flex flex-column align-items-center">
                        <p class="p-titulos-index-cards">TREKKING</p>
                        <p class="text-dark">Embárcate en una emocionante aventura, explorando senderos serpenteantes y paisajes impresionantes. Sumérgete en la belleza natural mientras desafías tus límites. Desde colinas verdes hasta picos majestuosos, el trekking ofrece una experiencia inolvidable.</p>
                        <form action="trekking.php" method="POST"> 
                            <button type="submit" class="button-generic3">Reserva</button>
                        </form>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <?php include("includes/footer.php"); ?>
</body>

</html>