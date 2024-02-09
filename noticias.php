<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head-tag-contents.php"); ?>

    <!-- Agregamos los estilos y scripts necesarios para el modal y Quill -->
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
</head>

<body>
    <?php include("includes/navigation.php"); ?>
    <header>
        <img class="img-fluid" src="./assets/img/cabecera_noticias.jpg" alt="noticias">
    </header>
    <?php
    // Conectar a la base de datos y obtener las noticias
    include './includes/conexion.php';

    $sql = "SELECT * FROM noticia";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error en la consulta: " . $conn->error;
        exit; // Si hay un error, detenemos la ejecución del script
    }

    // Obtener el rol del usuario actual
    $rolUsuario = ""; // Inicializa la variable

    if (isset($_SESSION['user'])) {
        $usuarioEmail = $_SESSION['user'];

        // Consulta para obtener el rol del usuario
        $rolConsulta = "SELECT Rol FROM usuario WHERE Correo = ?";
        $stmt = $conn->prepare($rolConsulta);
        $stmt->bind_param("s", $usuarioEmail);
        $stmt->execute();
        $rolResult = $stmt->get_result();

        if ($rolResult->num_rows == 1) {
            $row = $rolResult->fetch_assoc();
            $rolUsuario = $row['Rol'];
        }
    }


    ?>
    <main class="main_noticias">
        <section>
            <article>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg">
                            <h1 class="titulo fw-bold">LO ÚLTIMO EN <span class="palabra">ADVENTURE</span></h1>
                        </div>
                    </div>
                </div>
            </article>

            <?php
            // Mostrar las noticias
            $contador = 0;
            while ($row = $result->fetch_assoc()) {
                $imagen_posicion = $row['Imagen_posicion'];
                $cuerpo = $row['Cuerpo'];
                $imagen_col = ($imagen_posicion == 'izquierda') ? '8' : '4';
                $texto_col = ($imagen_posicion == 'izquierda') ? '4' : '8';
            ?>
                <article class="noticiaEntera">
                    <div class="row mb-3">
                        <div class="col-lg-<?php echo $imagen_col; ?> <?php echo ($imagen_posicion == 'derecha') ? 'order-lg-2' : ''; ?>" style="height: 250px;">
                            <img src="<?php echo $row['Imagen']; ?>" class="imagen">
                        </div>
                        <div class="col-lg-<?php echo $texto_col; ?> <?php echo ($imagen_posicion == 'derecha') ? 'order-lg-1' : ''; ?>">
                            <div class="contenidoNoticia">
                                <p class="texto text-dark"><?php echo $row['Titulo']; ?></p>
                                <a href="<?php echo $cuerpo ?>" class="enlace texto2 text-dark">Leer más <img src="/assets/img/noticiasFlecha.png" class="flecha"></a>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Obtener las valoraciones para la noticia actual
                    $noticia_id = $row['NoticiaId']; // Ajusta el nombre según tu base de datos
                    $valoraciones_sql = "SELECT * FROM valoracion WHERE NoticiaId = ?";
                    $stmt = $conn->prepare($valoraciones_sql);
                    $stmt->bind_param("i", $noticia_id);
                    $stmt->execute();
                    $valoraciones_result = $stmt->get_result();

                    if ($valoraciones_result === false) {
                        echo "Error en la consulta de valoraciones: " . $conn->error;
                        exit; // Si hay un error, detenemos la ejecución del script
                    }

                    // Mostrar las valoraciones
                    while ($valoracion = $valoraciones_result->fetch_assoc()) {
                        // Mostramos las valoraciones sin cambios, solo para visualización
                    ?>
                        <form action="" method="POST">
                            <p><span class="palabra">Comentario: </span><?php echo $valoracion['Comentario']; ?></p>
                            <p><span class="palabra">Puntuación: </span><?php echo $valoracion['Puntuacion']; ?></p>
                            <p><span class="palabra">Fecha de valoración: </span><?php echo $valoracion['FechaValoracion']; ?></p>
                            <p><span class="palabra">Usuario correspondiente: </span><?php echo $valoracion['Usuario']; ?></p>
                            <input type="hidden" name="valoracion_id" value="<?php echo $valoracion['ValoracionId']; ?>">
                            <input type="hidden" name="nuevaValoracionHidd" value="<?php echo $valoracion['Comentario'] ?>">
                            <input type="hidden" name="puntuacionHidd" value="<?php echo $valoracion['Puntuacion'] ?>">
                            <input type="hidden" name="fechaValoracionHidd" value="<?php echo $valoracion['FechaValoracion'] ?>">
                            <input type="hidden" name="usuarioHidd" value="<?php echo $valoracion['Usuario'] ?>">
                            <?php
                            // Verificar el rol del usuario para permitir edición y eliminación
                            if ($rolUsuario == 'Admin' || $usuarioEmail == $valoracion['Usuario']) {
                            ?>
                                <input type="submit" name="editar<?php echo $contador ?>" value="Editar valoración">
                                <input type="submit" name="borrar" value="Borrar valoración">
                            <?php
                            } else {
                                // No eres un administrador y no puedes editar/eliminar otras valoraciones
                                echo "<p>No tienes permiso para editar/eliminar esta valoración.</p>";
                            }
                            ?>
                            <hr>
                        </form>
                    <?php
                    }

                    // Liberar el resultado de las valoraciones
                    $valoraciones_result->free_result();
                    ?>

                    <button class="btn-agregar-valoracion button-generic1 mb-3" data-bs-toggle="modal" data-bs-target="#editorModal" data-noticia-id="<?php echo $noticia_id; ?>">Agregar Valoración</button>

                    <!-- Modal para agregar/editar valoración -->
                    <div class="modal fade" id="editorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar/Edita Valoración</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario de valoración -->
                                    <?php $fechaVal = time();

                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nueva_valoracion">Nuevo Comentario:</label>
                                            <div id="editor-container" style="height: 400px;"></div>
                                        </div>
                                        <input type="hidden" id="hidden-comentario" name="hidden_comentario">
                                        <div class="form-group">
                                            <label for="usuarioEmail">Email del usuario:</label>
                                            <input type="text" class="form-control" name="usuarioEmail" value="<?php echo $_SESSION['user'] ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="puntuacion">Puntuación:</label>
                                            <input type="number" class="form-control" name="puntuacion" required min="1" max="5">
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_valoracion">Fecha de Valoración:</label>
                                            <input type="text" class="form-control" name="fecha_valoracion" value="<?php echo date('d-m-Y', $fechaVal) ?>" required readonly>
                                        </div>
                                        <input type="hidden" name="noticia_id" id="modal-noticia-id" value="">
                                        <input type="hidden" name="fechaVal" value="<?php echo $fechaVal ?>">
                                        <input type="submit" class="btn btn-primary" name="submit_valoracion" value="Enviar Valoración">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Procesar el formulario de nueva valoración
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_valoracion'])) {
                        // Recuperar los datos del formulario
                        $usuarioEmail = $_POST['usuarioEmail'];
                        $puntuacion = $_POST['puntuacion'];
                        $fecha_valoracion = $_POST['fecha_valoracion'];
                        $noticia_id = $_POST['noticia_id'];

                        // Obtener el contenido del comentario desde el campo oculto
                        $nueva_valoracion = $_POST['hidden_comentario'];

                        // Verificar si el email del usuario está registrado
                        $selectUsuarios_sql = "SELECT Correo FROM usuario WHERE Correo = ?";
                        $stmt = $conn->prepare($selectUsuarios_sql);
                        $stmt->bind_param("s", $usuarioEmail);
                        $stmt->execute();
                        $selectUsuarios_result = $stmt->get_result();

                        // Verificar si la consulta fue exitosa
                        if (!$selectUsuarios_result) {
                            echo "Error en la consulta de usuarios: " . $conn->error;
                        } else {
                            // Verificar si hay al menos una fila en el resultado
                            if ($selectUsuarios_result->num_rows == 0) {
                                echo "El email introducido no está registrado, no puede valorar.";
                            } else {
                                // Preparar la consulta de inserción con marcadores de posición
                                $insert_valoracion_sql = "INSERT INTO valoracion (Usuario, NoticiaId, Comentario, Puntuacion, FechaValoracion) VALUES (?, ?, ?, ?, ?)";

                                // Preparar la sentencia
                                $stmt = $conn->prepare($insert_valoracion_sql);
                                $stmt->bind_param("sssss", $usuarioEmail, $noticia_id, $nueva_valoracion, $puntuacion, $fecha_valoracion);

                                // Ejecutar la sentencia
                                $result = $stmt->execute();

                                // Verificar si la inserción fue exitosa
                                if ($result === true) {
                                    // Redirigir con JavaScript para evitar la reenviación del formulario
                                    echo '<script>window.location.href = "noticias.php";</script>';
                                    exit();
                                } else {
                                    echo "Error al insertar la valoración: " . $stmt->error;
                                }
                            }
                        }
                        echo '<script>window.location.href = "noticias.php";</script>';
                        exit();
                    }

                    if (isset($_POST["editar$contador"])) {
                        // Recuperar el ValoracionId desde el formulario
                        $valoracionId = $_POST['valoracion_id'];
                        // Verificar que el ValoracionId no esté vacío y sea un número
                        if (!empty($valoracionId) && is_numeric($valoracionId)) {
                            // Obtener los datos actualizados del formulario
                            $nueva_valoracion = $_POST['nuevaValoracionHidd'];
                            $puntuacion = $_POST['puntuacionHidd'];
                            $fecha_valoracion = $_POST['fechaValoracionHidd'];
                            $usuarioEmail = $_POST['usuarioHidd'];

                    ?>
                            <form action="" method="post" id="form-<?php echo $noticia_id; ?>">
                                <label for="nueva_valoracion">Nuevo Comentario:</label>
                                <input type="text" name="nueva_valoracionUpdt" required value="<?php echo $nueva_valoracion ?>">

                                <label for="usuarioEmail">Email del usuario:</label>
                                <input type="text" name="usuarioEmailUpdt" required value="<?php echo $usuarioEmail ?>" readonly>

                                <label for="puntuacion">Puntuación:</label>
                                <input type="number" name="puntuacionUpdt" required min="1" max="5" value="<?php echo $puntuacion ?>">

                                <label for="fecha_valoracion">Fecha de Valoración:</label>
                                <input type="text" name="fecha_valoracion" value="<?php echo date('d-m-Y', $fechaVal) ?>" required readonly>

                                <!-- Agrega más campos según tu estructura -->
                                <input type="hidden" name="noticia_id" value="<?php echo $noticia_id ?>">
                                <input type="hidden" name="valoracionIdUpdt" value="<?php echo $valoracionId ?>">
                                <input type="hidden" name="valoracion_id" value="<?php echo $valoracionId ?>">
                                <input type="hidden" name="editar<?php echo $contador ?>" value="Editar valoracion">
                                <input type="submit" name="submit_valoracionUpdt" value="Actualizar Valoración">
                            </form>

                    <?php
                            if (isset($_POST['submit_valoracionUpdt'])) {
                                $valoracionIdUpdt = $_POST['valoracionIdUpdt'];
                                $nueva_valoracionUpdt = $_POST['nueva_valoracionUpdt'];
                                $puntuacionUpdt = $_POST['puntuacionUpdt'];
                                $fecha_valoracionUpdt = $_POST['fecha_valoracionUpdt'];

                                // Construir la consulta de actualización para la tabla 'valoracion'
                                $update_sql = "UPDATE valoracion SET Comentario = ?, Puntuacion = ?, FechaValoracion = ? WHERE ValoracionId = ?";

                                // Preparar la sentencia
                                $stmt = $conn->prepare($update_sql);
                                $stmt->bind_param("sssi", $nueva_valoracionUpdt, $puntuacionUpdt, $fecha_valoracionUpdt, $valoracionIdUpdt);

                                // Ejecutar la sentencia
                                $update_result = $stmt->execute();

                                // Verificar si la actualización fue exitosa
                                if ($update_result === true) {
                                    // Éxito: realizar acciones adicionales si es necesario
                                    echo "Valoración actualizada con éxito.";
                                    echo '<script>window.location.href = "noticias.php";</script>';
                                } else {
                                    // Error al ejecutar la consulta de actualización
                                    echo "Error al actualizar la valoración: " . $stmt->error;
                                }
                            }
                        }
                    }
                    if (isset($_POST['borrar'])) {
                        // Recuperar el ValoracionId desde el formulario
                        $valoracionId = $_POST['valoracion_id'];
                        // Verificar que el ValoracionId no esté vacío y sea un número
                        if (!empty($valoracionId) && is_numeric($valoracionId)) {
                            // Construir la consulta de eliminación para la tabla 'valoracion'
                            $delete_sql = "DELETE FROM valoracion WHERE ValoracionId = ?";

                            // Preparar la sentencia
                            $stmt = $conn->prepare($delete_sql);
                            $stmt->bind_param("i", $valoracionId);

                            // Ejecutar la sentencia
                            $delete_result = $stmt->execute();

                            // Verificar si la eliminación fue exitosa
                            if ($delete_result === true) {
                                // Éxito: realizar acciones adicionales si es necesario
                                echo "Valoración eliminada con éxito.";
                                echo '<script>window.location.href = "noticias.php";</script>';
                            } else {
                                // Error al ejecutar la consulta de eliminación
                                echo "Error al eliminar la valoración: " . $stmt->error;
                            }
                        } else {
                            // ValoracionId no válido o no proporcionado
                            echo "ValoracionId no válido o no proporcionado.";
                        }
                    }

                    ?>
                </article>
            <?php
                $contador++;
            }
            ?>
        </section>
    </main>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>

    <?php include("includes/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // Manejar el evento 'show.bs.modal' para inicializar Quill antes de que el modal se muestre
        $('#editorModal').on('show.bs.modal', function(event) {
            // Obtener el botón que activó el modal
            var button = $(event.relatedTarget);

            // Obtener el valor del atributo data-noticia-id del botón
            var noticiaId = button.data('noticia-id');

            // Asignar el valor al campo oculto en el formulario del modal
            $('#modal-noticia-id').val(noticiaId);

            // Inicializar Quill
            var quill = new Quill('#editor-container', {
                theme: 'snow'
            });

            // Evento al enviar el formulario
            $('form').submit(function(e) {
                // Obtener el contenido de Quill y asignarlo a un campo oculto del formulario
                var contenido = quill.root.innerHTML;
                $('#hidden-comentario').val(contenido);
            });
        });
    </script>

    <script>
        function mostrarFormulario(id) {
            var formulario = document.getElementById('formulario-' + id);
            formulario.style.display = 'block';
        }
    </script>
</body>

</html>