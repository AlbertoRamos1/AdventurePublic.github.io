<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php //include("includes/design-top.php");?>
    <?php include("includes/navigation.php"); ?>
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_adventure.jpg" alt="adventure">
    </header>
    <main>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 imgV text-center">
                    <img class="img-fluid" alt="" src="./assets/img/principalbienvenidos-1@2x.png" />
                    <div class="centered-text">
                        <p class="p-titulos-index title-gradient">Bienvenido a Adventure,</p>
                        <p class="p-titulos-index title-gradient">Disfruta la experiencia.</p>
                    </div>
                </div>
            </div>
            <div class="textos mt-5">
                <p class="p-titulos-index-grandes">Descubre nuestros 3 tipos de actividades</p>
                <div>
                    <p class="p-titulos-index">
                        Comprometidos con el medio ambiente en cada una:
                    </p>
                    <p class="mt-3 p-titulos-index">
                        <span>de </span>
                        <span class="montaa">montaña</span>
                        <span class="span-index">, </span>
                        <span class="acuticas">acuáticas</span>
                        <span class="span-index"> y de </span>
                        <span class="naturaleza">naturaleza</span>
                        <span class="span-index">.</span>
                    </p>
                </div>
            </div>
            <div class="mt-5 row">
                <div class="col-lg-4">
                    <!--CF2: ¿Dónde está la clase card?-->
                    <div class="tarjeta-con-texto overflow-hidden mb-4">
                        <img class="d-block w-100 img-1" alt="" src="./assets/img/act-naturaleza-index.jpg" />

                        <div class="card-text mb-3 me-3 ms-3">
                            <p class="p-titulos-index-cards">ACTIVIDADES EN</p>
                            <p class="p-titulos-index-cards">NATURALEZA</p>
                            <div class="mt-3 p-card">
                                Se refieren a aquellas prácticas que tienen lugar en entornos naturales, como bosques,
                                montañas, ríos o playas, y que involucran la interacción directa con la flora y fauna
                                del lugar. Las actividades que ofrecemos tienen como objetivo principal disfrutar y
                                apreciar la belleza del entorno natural, promoviendo la conservación y el respeto.
                            </div>
                        </div>
                        <button type="submit" class="button-generic1">Descúbrelas</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tarjeta-con-texto1 overflow-hidden mb-4">
                        <img class="img-2 d-block w-100" alt="" src="./assets/img/Tarjeta_acua.jpg" />

                        <div class="card-text mb-3 me-3 ms-3">
                            <p class="p-titulos-index-cards">ACTIVIDADES</p>
                            <p class="p-titulos-index-cards">ACUÁTICAS</p>
                            <div class="mt-3 p-card">
                                Se refieren a cualquier forma de recreación o deporte que se realiza en el agua o algún
                                simil como ofrecemos. Las
                                actividades pueden tener lugar en diversas fuentes de agua, como océanos, mares, lagos,
                                ríos, piscinas y otros cuerpos de agua. La variedad de actividades acuáticas
                                puede incluir deportes, entretenimiento y recreativas.
                            </div>
                        </div>
                        <button type="submit" class="button-generic2">Descúbrelas</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tarjeta-con-texto2 overflow-hidden mb-4">
                        <img class="img-3 d-block w-100" alt="" src="./assets/img/act-montana-index.jpg" />

                        <div class="card-text mb-3 me-3 ms-3">
                            <p class="p-titulos-index-cards">ACTIVIDADES DE</p>
                            <p class="p-titulos-index-cards">MONTAÑA</p>
                            <div class="mt-3 p-card">
                                Engloban un conjunto diverso de prácticas recreativas y deportivas que tienen lugar en
                                ambientes montañosos. Las actividades suelen llevarse a cabo en áreas con elevaciones
                                significativas, como cordilleras, picos montañosos. Las
                                actividades de montaña ofrecen a los participantes la oportunidad de disfrutar de las
                                montañas.
                            </div>
                        </div>
                        <button type="submit" class="button-generic3">Descúbrelas</button>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-lg-4">
                    <div class="carrousel-izq imgV mb-3">
                        <img class="img-1 d-block w-100 img-fluid" src="./assets/img/rectangle@2x.png" alt="Slide 1">
                        <div class="centered-text-valoraciones1">
                            <p class="p-valoraciones-index mt-3">~ Una experiencia inolvidable que repetiría.~</p>
                            <p class="p-valoraciones-index">- Virginia (16/05/2023)</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="carrousel-centro imgV mb-3">
                        <img class="img-2 img-fluid d-block w-100 img-fluid" src="./assets/img/rectangle1@2x.png"
                            alt="Slide 2">
                        <div class="centered-text-valoraciones2">
                            <p class="p-valoraciones-index mt-3">~ De las mejores escapadas que hemos hecho mi mujer y
                                yo
                                agradecidísimos
                                con Adventure</p>
                            <p class="p-valoraciones-index">- José Miguel (5/08/2023)</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="carrousel-der imgV mb-3">
                        <img class="img-3 d-block w-100 img-fluid" src="./assets/img/rectangle2@2x.png" alt="Slide 3">
                        <div class="centered-text-valoraciones3">
                            <p class="p-valoraciones-index mt-3">~ Gracias al guía personal la ruta se hizo mil veces
                                mejor!</p>
                            <p class="p-valoraciones-index">- Que alegría de compañía.~ </p>
                            <p class="p-valoraciones-index">- Antonio (10/09/2023) </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carouselExample" class="carousel slide d-none d-lg-block mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/carrousel-index-1.jpg" class="d-block w-100 " width="1024" height="600">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/carrousel-index-2.jpg" class="d-block w-100" width="1024" height="600">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/carrousel-index-3.jpg" class="d-block w-100" width="1024" height="600">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/Carousel-index-4.png" class="d-block w-100" width="1024" height="600">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>

</body>

</html>