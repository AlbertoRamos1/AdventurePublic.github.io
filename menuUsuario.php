<?php

use Google\Service\Adsense\Alert;

require_once('Usuario.php');
require_once('conexion.php');
include_once('includes/a_config.php');
//session_start();


// Función para encontrar un usuario por su correo
$correo = $_SESSION['user'];
function findUsuarioByCorreo($correo)
{
    $usuario = '';
    try {
        $conn = new Conexion();
        $result = $conn->query("SELECT * FROM usuario WHERE Correo = '$correo'");
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
        }
    } catch (Exception $ex) {
        echo 'Error en findUsuarioByCorreo';
    }
    return $usuario;
}
$usuario = findUsuarioByCorreo($correo);

//var_dump($usuario);
// Verifica si 'user' está presente en la sesión
/*if (isset($_SESSION['user'])) {
    $correo_usuario = $_SESSION['user'];
} else {
    // Manejar el caso en el que 'user' no está presente en la sesión
    echo "La sesión de usuario no está iniciada.";
}*/

function update($correo, $nombre, $ap1, $ap2, $fecha, $pais, $cp, $tel)
{
    try {
        $conn = new Conexion();
        $fila = $conn->query("UPDATE usuario SET Nombre='$nombre', Apellido1='$ap1', Apellido2='$ap2', FechaNacimiento='$fecha', Pais='$pais', CP='$cp', Telefono='$tel' WHERE Correo='$correo'");
        if ($conn->affected_rows > 0) {
            return true;
        }
    } catch (Exception $ex) {
        echo "Fallo en update";
    }
}

if (isset($_POST['modificar'])) {
    // Realiza la actualización
    $actualizado = update($_POST['email'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['f_nac'], $_POST['paises'], $_POST['codPos'], $_POST['telf']);
    
    // Si la actualización fue exitosa, redirige a la misma página
    if ($actualizado) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        // Manejar el caso de error en la actualización
        // Puedes establecer un mensaje de error para mostrarlo en la página
        $mensaje_error = "Error al actualizar los datos.";
    }
}




?>
<!DOCTYPE html>
<html>

<head>
    <?php include('includes/head-tag-contents.php');
    ?>
</head>

<body>
    <?php include('includes/navigation.php');
    ?>

    <header>
        <img class='img-fluid' src='./assets/img/cabecera_perfil_usuario.png' alt='perfilUsu'>
    </header>
    <main class='page-section login-signUp-background'>
        <section class='container-fluid justify-content-center align-items-top'>
            <div class='row justify-content-center align-items-center'>
                <div class='col-9 col-lg-5'>
                    <article class=' form card text-center border-3 border-primary'>
                        <div class='card-body mt-5 mb-3'>
                            <form action="" method="post">
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='email' placeholder='Email' name='email' value='<?php echo $usuario->Correo; ?> ' readonly>
                                        <label for='email' class='text-primary' style='font-size: 1em;'>Email* </label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-envelope col-2 text-primary d-flex align-items-center justify-content-end'>
                                    </i>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='nombre' placeholder='Nombre' name='nombre' value='<?php echo $usuario->Nombre ?>'>
                                        <label for='nombre' class='text-primary' style='font-size: 1em; display:inline'>Nombre* </label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-user col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='apellido1' placeholder='1º Apellido' name='apellido1' value='<?php echo $usuario->Apellido1 ?>'>
                                        <label for='apellido1' class='text-primary' style='font-size: 1em; display:inline'>1º Apellido* </label>
                                    </div>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='apellido2' placeholder='2º Apellido' name='apellido2' value='<?php echo $usuario->Apellido2 ?>'>
                                        <label for='apellido2' class='text-primary' style='font-size: 1em; display:inline'>2º Apellido </label>
                                    </div>
                                </div>

                                <!-- Fecha nacimiento -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-10'>
                                        <input type='date' class='form-control ms-5' style='font-size: 1em;' id='f_nac' placeholder='Fecha Nacimiento' name='f_nac' value='<?php echo $usuario->FechaNacimiento ?>'>
                                        <label for='f_nac' class='text-primary' style='font-size: 1em; display:inline'>Fecha Nacimiento </label>
                                    </div>
                                </div>

                                <!-- País -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <select class='form-select ms-5 border-0' style='font-size: 1em;' id='paises' name='paises'>
                                            <option value='de' <?php echo ($usuario->Pais === 'de') ? 'selected' : ''; ?>>Alemania</option>
                                            <option value='es' <?php echo ($usuario->Pais === 'es') ? 'selected' : ''; ?>>España</option>
                                            <option value='fr' <?php echo ($usuario->Pais === 'fr') ? 'selected' : ''; ?>>Francia</option>
                                            <option value='gb' <?php echo ($usuario->Pais === 'gb') ? 'selected' : ''; ?>>Reino Unido</option>
                                            <option value='it' <?php echo ($usuario->Pais === 'it') ? 'selected' : ''; ?>>Italia</option>
                                            <option value='pt' <?php echo ($usuario->Pais === 'pt') ? 'selected' : ''; ?>>Portugal</option>
                                        </select>
                                        <label for='paises' class='text-primary' style='font-size: 1em; display:inline'>País </label>
                                    </div>
                                    <i class='form-icon-size fa-solid fa-earth-europe col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <!-- Código postal -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='codPos' placeholder='Código Postal' name='codPos' value='<?php echo $usuario->CP ?>'>
                                        <label for='codPos' class='text-primary' style='font-size: 1em; display:inline'>Código Postal*</label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-hashtag col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <!-- Teléfono -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='telf' placeholder='Nº Teléfono' name='telf' value='<?php echo $usuario->Telefono ?>'>
                                        <label for='telf' class='text-primary' style='font-size: 1em; display:inline'>Nº Teléfono*</label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-phone col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <button type='submit' class='button-generic1 mt-4' name='modificar'>Modificar</button>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
            </div>
        </section>
    </main>

    <?php include('includes/footer.php');
    ?>
</body>

</html>