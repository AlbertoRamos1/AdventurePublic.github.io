<?php
include("includes/a_config.php");
//session_start();
if (isset($_GET['code'])) {
	$google_client->authenticate($_GET['code']);
	$_SESSION['token'] = $google_client->getAccessToken();

	if (isset($_SESSION['token'])) {
		$google_client->setAccessToken($_SESSION['token']);

		if ($google_client->getAccessToken()) {
			// Get user profile data from google 
			$google_oauthV2 = new Google\Service\Oauth2($google_client);

			$gUser = $google_oauthV2->userinfo->get();
			$gName = $gUser['given_name'];
			$gSurname = $gUser['family_name'];
			$gEmail = $gUser['email'];
			$gAvatar = $gUser['picture'];

			try {
				require("conexion.php");
                $conn = new Conexion;

				if ($conn) {
					$result = $conn->query("SELECT * FROM usuario WHERE Correo = '$gEmail'");

					if ($row = $result->fetch_object()) {
						$_SESSION["user"] = $gEmail;
						$_SESSION["avatar"] = $gAvatar;

						header("Location: index.php");
					}
				}
			} catch (Exception $e) {
				echo $e;
			}


		}
	}
}
function validatePhone($phone)
{
	$phone = preg_replace('/[^0-9]/', '', $phone);
	if (strlen($phone) >= 9) {
		return true;
	}
	return false;
}

function validateCode($code)
{
	$code = preg_replace('/[^0-9]/', '', $code);
	if (strlen($code) === 5) {
		return true;
	}
	return false;
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateAge($birthdate)
{
    $minAge = 14;
    $minTimestamp = strtotime("-$minAge years");

    $birthdateTimestamp = strtotime($birthdate);

    return $birthdateTimestamp <= $minTimestamp;
}

if (isset($_POST["register"])) {
    if ($_POST['captcha_challenge'] == $_SESSION['captcha_text']) {
        // Captcha correcto, continua con el procesamiento del formulario.
    } else {
        // Captcha incorrecto, muestra un mensaje de error.
        header("Location: registro.php?captchaerror=true");
        exit();
    }
	if (!validatePhone($_POST["telf"])) {
        $wrongPhone = true;
    } else if (!validateCode($_POST["codPos"])) {
        $wrongCode = true;
    } else if (!validateEmail($_POST["email"])) {
        $wrongEmail = true;
    } else if (!validateAge($_POST["f_nac"])) {
        $wrongAge = true;
    } else {
		try {
			require("conexion.php");
            $conn = new Conexion;

			if ($conn) {
				$result = $conn->query("SELECT * FROM usuario WHERE Correo = '$_POST[email]'");

				if ($row = $result->fetch_object()) {
					$wrongEmail = true;
				} else {
					$apellidos = explode(" ", $_POST["apellido1"]);

					if ($_POST["pass"] == "")
						$hash_pass = "";
					else
						$hash_pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
					if ($_SESSION["captcha_text"] == $_POST["captcha_challenge"]) {

						$result = $conn->query("INSERT INTO usuario (Correo, Pass, Nombre, Apellido1, Apellido2, FechaNacimiento, Pais, CP, Telefono) VALUES ('$_POST[email]', '$hash_pass', '$_POST[nombre]', '$_POST[apellido1]', '$_POST[apellido2]', '$_POST[f_nac]', '$_POST[paises]', '$_POST[codPos]', '$_POST[telf]')");

						$_SESSION["user"] = $_POST["email"];
						$_SESSION["avatar"] = "./public/defaultAvatar.png";

						header("Location: index.php");
					} else
						$wrongCaptcha = true;
				}
			}
		} catch (PDOException $e) {
			die("" . $e->getMessage());
		}
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
        <img class='img-fluid' src='./assets/img/cabecera_registro.jpg' alt='registro'>
    </header>
    <main class='page-section login-signUp-background'>
        <!-- Login Section-->
        <section class='container-fluid justify-content-center align-items-top'>
            <div class='row justify-content-center align-items-center'>
                <div class='col-9 col-lg-5'>
                    <article class=' form card text-center border-3 border-primary'>
                        <div class='card-body mt-5 mb-3'>
                            <form action="" method="POST">
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='email' placeholder='Email' name='email'
                                        <?php if (isset($gEmail)) echo "value='$gEmail' readonly" ?> required>
                                        <label for='email' class='text-primary' style='font-size: 1em;'>Email* </label>
                                        <?php
                                        if (isset($wrongEmail)) {
                                            echo "<font color=red>Ya hay un usuario registrado con este correo.</font>";
                                        }
                                        ?>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-envelope col-2 text-primary d-flex align-items-center justify-content-end'>
                                    </i>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='password' class='form-control ms-5' style='font-size: 1.1em;' id='pass' placeholder='Contraseña' name='pass' required>
                                        <label for='pass' class='text-primary' style='font-size: 1em;'>Contraseña* </label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-lock col-2 text-primary d-flex align-items-center justify-content-end'>
                                    </i>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='nombre' placeholder='Nombre' name='nombre'
                                        <?php if (isset($gName)) echo "value='$gName' readonly"; ?> required>
                                        <label for='nombre' class='text-primary' style='font-size: 1em; display:inline'>Nombre* </label>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-user col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='apellido1' placeholder='1º Apellido' name='apellido1'
                                        <?php if (isset($gSurname)) echo "value='$gSurname' readonly" ?> required>
                                        <label for='apellido1' class='text-primary' style='font-size: 1em; display:inline'>1º Apellido* </label>
                                    </div>
                                </div>

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='apellido2' placeholder='2º Apellido' name='apellido2'>
                                        <label for='apellido2' class='text-primary' style='font-size: 1em; display:inline'>2º Apellido </label>
                                    </div>
                                </div>

                                <!-- Fecha nacimiento -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-10'>
                                        <input type='date' class='form-control ms-5' style='font-size: 1em;' id='f_nac' placeholder='Fecha Nacimiento' name='f_nac' required>
                                        <label for='f_nac' class='text-primary' style='font-size: 1em; display:inline'>Fecha Nacimiento </label>
                                        <?php
											if (isset($wrongAge)) {
												echo "<font color=red>El Usuario debe ser mayor de 14 años.</font>";
											}
											?>
                                    </div>
                                </div>

                                <!-- País -->
                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <select class='form-select ms-5 border-0' style='font-size: 1em;' id='paises' name='paises'>
                                            <option value='de'>Alemania</option>
                                            <option value='es'>España</option>
                                            <option value='fr'>Francia</option>
                                            <option value='gb'>Reino Unido</option>
                                            <option value='it'>Italia</option>
                                            <option value='pt'>Portugal</option>
                                        </select>
                                        <label for='paises' class='text-primary' style='font-size: 1em; display:inline'>País </label>
                                    </div>
                                    <i class='form-icon-size fa-solid fa-earth-europe col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>
                                <!-- Código postal -->

                                <div class='row border-bottom mx-3'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='codPos' placeholder='Código Postal' name='codPos' required>
                                        <label for='codPos' class='text-primary' style='font-size: 1em; display:inline'>Código Postal*</label>
                                        <?php
											if (isset($wrongCode)) {
												echo "<font color=red>Código postal inválido.</font>";
											}
                                        ?>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-hashtag col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <div class='row border-bottom mx-3 mb-5'>
                                    <div class='form-floating col-9'>
                                        <input type='text' class='form-control ms-5' style='font-size: 1.1em;' id='telf' placeholder='Nº Teléfono' name='telf' required>
                                        <label for='telf' class='text-primary' style='font-size: 1em; display:inline'>Nº Teléfono*</label>
                                        <?php
											if (isset($wrongPhone)) {
												echo "<font color=red>Número de teléfono inválido.</font>";
											}
                                        ?>
                                    </div>

                                    <i class='form-icon-size fa-solid fa-phone col-2 text-primary d-flex align-items-center justify-content-end'></i>
                                </div>

                                <input type="hidden" name="avatar" <?php if (isset($gAvatar)) echo "value='$gAvatar'"; ?>>

                                <!-- Captcha -->
                                <div>
                                    <label for="captcha" class="mb-3 color-captcha"><b>
                                            <?php if (isset($_GET["captchaerror"]))
                                                echo '<p style="color: red;">Código inválido. Por favor revuelve el captcha.</p>';
                                            else
                                                echo "Por favor resuelve el captcha solicitado para avanzar.<b>";
                                            ?>
                                        </b></label><br>
                                    <img src="captcha.php" alt="CAPTCHA" class="captcha-image" id="captcha-image"><i class="refresh-captcha"></i>
                                    <button type="button" class="button fa fa-redo" onclick="refreshCaptcha()"></button><br><br> <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z0-9]{6}">
                                </div>

                                <button type='submit' class='button-generic1 mt-4' name='register'>Registrar</button>
                            </form>
                            <script>
                                function refreshCaptcha() {
                                    var captchaImage = document.getElementById("captcha-image");
                                    captchaImage.src = 'captcha.php?' + Date.now();
                                }
                            </script>
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