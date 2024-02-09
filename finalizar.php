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
        <img class="img-fluid" src="./assets/img/cabecera_finalizar.jpg" alt="finalizar">
    </header>
    <main class="container my-5">
        <section class="row d-flex">
            <article class="col-12 col-lg-8 border border-radius p-3">
                <form action="" method="POST">
                    <div class="row border-bottom">
                        <div class="col letra-titulos titulo-carrito">Información de facturación</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-lg-4">
                            <label class="letra-titulos w-100">Nombre</label>
                            <input type="text" class="texto-facturacion mb-3 w-100" name="nombre" value=""
                                placeholder="Nombre">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label class="letra-titulos w-100">Apellidos</label>
                            <input type="text" class="texto-facturacion mb-3 w-100" name="apellidos" value=""
                                placeholder="Apellidos">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label class="letra-titulos w-100">Empresa</label>
                            <input type="text" class="texto-facturacion mb-3 w-100" name="empresa" value=""
                                placeholder="Empresa">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="letra-titulos w-100">Dirección</label>
                            <input type="text" class="w-100 texto-facturacion mb-3" name="direccion" value=""
                                placeholder="Dirección">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label class="w-100 letra-titulos">País</label>
                            <select class="w-100 texto-facturacion mb-3">
                                <option value="">Elige</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label class="w-100 letra-titulos">Provincia</label>
                            <select class="w-100 texto-facturacion mb-3">
                                <option value="">Elige</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label class="w-100 letra-titulos">Email</label>
                            <input type="text" class="texto-facturacion w-100 mb-3" name="email" value=""
                                placeholder="Email">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label class="w-100 letra-titulos">Teléfono</label>
                            <input type="text" class="w-100 texto-facturacion mb-3" name="telefono" value=""
                                placeholder="Teléfono">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">


                            <label class="w-100 col letra-titulos">Información adicional <label
                                    class="texto-facturacion">(opcional)</label></label>
                            <textarea class="w-100 col texto-facturacion mi-textarea" name="infoAdicional"
                                placeholder="Introduzca aquí la información que considere necesaria"></textarea>
                        </div>
                    </div>
            </article>

<<<<<<< HEAD
                <!--Hueco entre cols-->
                <!--CF2: Los huecos no se deben expresar como columnas sin o con margin-->
                <div class="col-lg-1 text-light">-</div> 
=======
            <!--Hueco entre cols-->
            <div class="col-lg-1 text-light">-</div>
>>>>>>> f21b0fed3b570765ee4559122555d6fd9e814331

            <!--Su compra-->
            <article class="col-12 col-lg-3 border border-radius padding-sucompra">
                <div class="row">
                    <div class="col">
                        <p class="letra-titulos titulo-carrito elemento-centrado">Su compra</p>
                    </div>
                </div>
                <!--Producto 1-->
                <div class="row elemento-centrado mb-3">
                    <div class="col-4 col-lg-2 elemento-centrado"><img class="imagen-finalizar"
                            src="assets/img/escalada.jpg" alt="Escalada"></div>
                    <div class="col-8 col-lg-5 align-items-center p-0">
                        <p class="letra-sucompra mb-0 mt-2">Escalada</p>
                        <p class="letra-sucompra">(20/12/2023-11:00 h.)</p>
                        <div class="row d-lg-none">
                            <div class="col-4 d-lg-none text-start letra-sucompra">
                                <p>14,00€</p>
                            </div>
                            <div class="col-4 text-start letra-sucompra">
                                <p>x5</p>
                            </div>
                            <div class="col-4 text-start letra-titulos">
                                <p>70,00€</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-flex col-lg-2 text-start letra-sucompra">
                        <p>x5</p>
                    </div>
                    <div class="d-none d-lg-flex col-lg-3 text-start">
                        <p>70,00€</p>
                    </div>
                </div>

                <!--Producto 2-->
                <div class="row elemento-centrado mb-3">
                    <div class="col-4 col-lg-2 elemento-centrado"><img class="imagen-finalizar"
                            src="assets/img/kayak.jpg" alt="Escalada"></div>
                    <div class="col-8 col-lg-5 align-items-center p-0">
                        <p class="letra-sucompra mb-0 mt-2">Kayak</p>
                        <p class="letra-sucompra">(24/11/2023-10:00 h.)</p>
                        <div class="row d-lg-none">
                            <div class="col-4 d-lg-none text-start letra-sucompra">
                                <p>14,00€</p>
                            </div>
                            <div class="col-4 text-start letra-sucompra">
                                <p>x1</p>
                            </div>
                            <div class="col-4 text-start letra-titulos">
                                <p>14,00€</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-flex col-lg-2 text-start letra-sucompra">
                        <p>x5</p>
                    </div>
                    <div class="d-none d-lg-flex col-lg-3 text-start">
                        <p>70,00€</p>
                    </div>
                </div>

                <!--Totales-->
                <section class="mx-4">
                    <div class="row border-bottom mt-5">
                        <div class="col">
                            <p>Subtotal:</p>
                        </div>
                        <div class="col">
                            <p class="letra-titulos text-end">69,42 €</p>
                        </div>
                    </div>
                    <div class="row border-bottom mt-3">
                        <div class="col">
                            <p>IVA:</p>
                        </div>
                        <div class="col">
                            <p class="letra-titulos text-end">21%</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <p>Total:</p>
                        </div>
                        <div class="col">
                            <p class="letra-titulos text-end">84,00 €</p>
                        </div>
                    </div>
                </section>

                <div class="row m-3">
                    <span class="col-12 elemento-centrado letra-titulos">Método de pago</span>
                    <div class="my-2">
                        <label class="col-12">
                            <input type="radio" name="metodoPago" value="tarjetaCredito"> Tarjeta de Crédito
                        </label>
                        <label class="col-12">
                            <input type="radio" name="metodoPago" value="paypal"> PayPal
                        </label>
                    </div>
                    <button type="submit" class="button-generic1 mt-3">Confirmar</button>
                </div>
                </form>
            </article>
        </section>

    </main>

    <?php include("includes/footer.php"); ?>
</body>

</html>