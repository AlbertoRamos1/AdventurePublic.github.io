<?php include("includes/a_config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_contacto.jpg" alt="contacto">
    </header>
    <main class="main_contact main_contact_small">
        <div class="container-fluid">
            <h1 class="tituloH1">ADVENTURE</h1>
            <section class="row m-3">
                <div class="col-lg col-12 border border-radius margen_centro mb-5 ">
                    <div class="row border-bottom m-3">
                        <div class="col-lg letra-titulos-principal-contact titulo-carrito">Rellene el formulario para
                            cualquier consulta
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos-contacto mt-3">Nombre</span>
                            <div class="col-2"></div>
                            <span class="col-4 letra-titulos-contacto mt-3">Apellidos</span>
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-x-facturacion">
                            <div class="col-1"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="nombre" value=""
                                placeholder="Nombre">
                            <div class="col-2"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="apellidos" value=""
                                placeholder="Apellidos">
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos">Dirección</span>
                        </div>
                        <div class="row margin-x-facturacion">
                            <div class="col-1"></div>
                            <input type="text" class="col-10 texto-facturacion mb-3" name="direccion" value=""
                                placeholder="Dirección">
                        </div>
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos-contacto">E-mail</span>
                            <div class="col-2"></div>
                            <span class="col-4 letra-titulos-contacto">Teléfono</span>
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-x-facturacion">
                            <div class="col-1"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="mail" value=""
                                placeholder="E-mail">
                            <div class="col-2"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="telefono" value=""
                                placeholder="Teléfono">
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos-contacto">Ciudad</span>
                            <div class="col-2"></div>
                            <span class="col-4 letra-titulos-contacto">Código postal</span>
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-x-facturacion">
                            <div class="col-1"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="ciudad" value=""
                                placeholder="Ciudad">
                            <div class="col-2"></div>
                            <input type="text" class="col-4 texto-facturacion mb-3" name="cp" value=""
                                placeholder="Código postal">
                            <div class="col-1"></div>
                        </div>
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos-contacto">Cuéntanos tu consulta</span>
                        </div>
                        <div class="row margin-x-facturacion">
                            <div class="col-1"></div>
                            <textarea type="text" class="col-10 texto-facturacion mb-3" name="consulta" value=""
                                placeholder="Escribe tu consulta"></textarea>
                        </div>
                        <div class="row margin-facturacion-titulos">
                            <div class="col-1"></div>
                            <span class="col-4 letra-titulos-contacto">Sube tu archivo</span>
                        </div>
                        <div class="row margin-x-facturacion ">
                            <input type="file" class="col-12 archivo" id="archivo" name="archivo"
                                accept=".pdf, .doc, .jpg, .png">
                            <p class="text-danger col-12 archivo">Tiene que tener un tamaño máximo de 10 MB.</p>
                        </div>

                        <div class="col-12 boton mb-3">
                            <button type="submit" class="button-generic1">ENVIAR</button>
                        </div>

                    </form>
                </div>
                <div class="col-lg contact_foto d-none d-lg-block">
                    <!-- <img src="/assets/img/pruebamapa.png" class="img-fluid" alt="Mapa de la Sede">-->
                    <!--CF2: prohibido width y estilos en línea!!!-->
                    <iframe class="borde"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.2427740128082!2d-5.973558088866513!3d37.384090534452895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126ebd0479b657%3A0x62ff222e3173860!2zRXN0YWRpbyBSYW3Ds24gU8OhbmNoZXogUGl6anXDoW4!5e0!3m2!1ses!2ses!4v1700224749437!5m2!1ses!2ses"
                        width="550" height="435" style="border: 1;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>