<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

    <title>Actividades</title>

    <head>
        <?php include("includes/head-tag-contents.php"); ?>
    </head>
    <?php include("includes/navigation.php"); ?>

    <body>
        <!--Cabecera-->
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_actividades.jpg" alt="actividades">
    </header>
        <!--Texto-->
        <div class="text-primary mt-4 texto-titulo">
                <p class="text-dark">En Adventure podrás disfrutar con distintos tipos de actividades:</p>
                <p class="text-dark"><span class="text-secondary resaltar-Actividades">Acuáticas</span>, <span class="text-info resaltar-Actividades">Terrestres</span>
                y de <span class="text-primary resaltar-Actividades">Naturaleza</span>.</p>
            </div>

        <!--Tarjetas Actividades-->
        <div class="container text-center">
            <nav class="row mx-4 mb-5">
                <!--Tarjeta acuáticas-->
                <div class="card rounded-5 tarjeta-con-texto1 mx-3" style="width:400px">
                        <img class="card-img-top rounded-top-5" src="/assets/img/tarjetaAcuatica.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title text-secondary">ACTIVIDADES<br>ACUÁTICAS</h4>
                            <a href="actividadesAcuaticas.php" class="btn btn-secondary rounded-3">Descúbrelas</a>
                        </div>
                </div>

                <!--Tarjeta terrestres-->
                <div class="card rounded-5 tarjeta-con-texto2 mx-3" style="width:400px">
                        <img class="card-img-top rounded-top-5" src="/assets/img/tarjetaNaturaleza.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title text-info">ACTIVIDADES<br>TERRESTRES</h4>
                            <a href="actividadesTerrestres.php" class="btn btn-info rounded-3">Descúbrelas</a>
                        </div>
                </div>

                <!--Tarjeta naturaleza-->
                <div class="card rounded-5 tarjeta-con-texto mx-3" style="width:400px">
                        <img class="card-img-top rounded-top-5" src="/assets/img/tarjetaTerrestre.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title text-primary">ACTIVIDADES<br>NATURALEZA</h4>
                            <a href="actividadesNaturaleza.php" class="btn btn-primary rounded-3">Descúbrelas</a>
                        </div>
                </div>
            </nav>
        </div>

        <!--Footer-->
        <?php include("includes/footer.php"); ?>
    </body>

</html>