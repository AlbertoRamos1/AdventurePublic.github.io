<?php
require_once('Usuario.php');
require_once('conexion.php');
include("includes/a_config.php");
//session_start();

$usuario = '';
$mensaje = '';

if (isset($_POST['acceder'])) {
    try {
        $conn = new Conexion;

        if ($conn) {
            $result = $conn->query("SELECT * FROM usuario WHERE Correo = '" . $_POST['correo'] . "'");
            if ($fila = $result->fetch_object()) {
                $usuario = new Usuario(
                    $fila->Correo,
                    $fila->Pass,
                    $fila->Nombre,
                    $fila->Apellido1,
                    $fila->Apellido2,
                    $fila->FechaNacimiento,
                    $fila->Pais,
                    $fila->CP,
                    $fila->Telefono,
                    $fila->Rol
                );

                if (password_verify($_POST["pass"], $usuario->Pass)) {
                    $_SESSION["user"] = $usuario->Correo;
                    $_SESSION["avatar"] = "assets/img/avatar.png";
                    var_dump($_SESSION);
                    header("Location: index.php");
                } else
                    $mensaje = "Usuario o contraseña incorrectos";
            }
        }
    } catch (Exception $e) {
        echo $e;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navigation.php"); ?>

    <header>
        <img class="img-fluid" src="./assets/img/cabecera_login.jpg" alt="login">
    </header>
    <main class="page-section login-signUp-background">
        <!-- Login Section-->
        <section class="container-fluid justify-content-center">
            <div class="row justify-content-center align-items-center">
                <div class="col-8 col-lg-5">
                    <article class=" form card text-center border-3 border-primary">
                        <div class="card-body mt-5 mb-3">
                            <div class="text-center">
                                <?php
                                $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="../loginWithGoogle/sign-in-with-google.png" class="googlebtn mb-3" style="width: 35%;"/></a>';
                                echo $login_button;
                                ?>
                            </div>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="row border-bottom mx-3">
                                        <div class="col-9"><input type="text" class="form-control text-primary" name="correo" id="correo" placeholder="E-mail"></div>
                                        <i class="form-icon-size fa-solid fa-envelope col-2 text-primary d-flex align-items-center justify-content-end"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row border-bottom mx-3">
                                        <div class="col-9"><input type="password" class="form-control text-primary" id="password" name="pass" placeholder="Contraseña"></div>
                                        <i class="form-icon-size fa-solid fa-eye-slash col-2 text-primary d-flex align-items-center justify-content-end"></i>
                                    </div>
                                    <div><span><?php echo $mensaje ?></span></div>
                                    <button type="submit" name="acceder" class="my-4 button-generic1">ACCEDER</button>
                            </form>
                            <div class="text-center">
                                <p><a class="text-primary" href="registro.php">Crear cuenta</a></p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            </div>
        </section>
    </main>

    <?php include("includes/footer.php"); ?>
</body>

</html>