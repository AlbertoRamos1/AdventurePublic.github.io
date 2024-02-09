<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body id="body-juegoChema">
    <div id="start-screen">
        <h1>Bienvenido a Shoot and Win with Adventure</h1>
        <p>Elige un nivel:</p>
        <button onclick="startGame('fácil')">Fácil</button>
        <button onclick="startGame('medio')">Medio</button>
        <button onclick="startGame('difícil')">Difícil</button>
    </div>
    <div id="game-container">
    </div>
    <div id="win-screen">
        <h1>¡Felicidades! Has ganado</h1>
        <p>Presiona F5 para jugar de nuevo.</p>
    </div>

    <script>
        const images = {
            startScreen: '/assets/img/fondoInicio.avif',
            background: '/assets/img/hierba.jpg',
            character: '/assets/img/arquera_clash.png',
            bullet: '/assets/img/flecha2.png',
            target: '/assets/img/dianaColores.png',
        };

        const loadedImages = {};

        function loadImages(images, callback) {
            let loadedImagesCount = 0;
            const imagesToLoad = Object.keys(images).length;

            for (const key in images) {
                const img = new Image();
                img.onload = () => {
                    loadedImages[key] = img;
                    loadedImagesCount++;

                    if (loadedImagesCount === imagesToLoad) {
                        callback();
                    }
                };
                img.src = images[key];
            }
        }

        loadImages(images, () => {
            // Todas las imágenes están cargadas, pero aún no iniciamos el juego
            console.log('Todas las imágenes cargadas:', loadedImages);
        });

        // Inicio del juego
        function startGame(selectedLevel) {
            document.getElementById('start-screen').style.display = 'none';
            document.getElementById('game-container').style.display = 'block';

            const windowWidth = 900;
            const windowHeight = 600;

            const stage = new Konva.Stage({
                container: 'game-container',
                width: windowWidth,
                height: windowHeight,
            });

            const layer = new Konva.Layer();
            stage.add(layer);

            let direction = 1; // 1 para mover hacia abajo, -1 para mover hacia arriba
            let shots = 0;
            let hits = 0;
            let level = selectedLevel;

            let speed, bulletSpeed; // Variables de velocidad

            const shotsText = new Konva.Text({
                text: `Disparos: ${shots}`,
                fontSize: 25,
                fill: 'white',
                x: 400,
                y: 10,
            });

            const hitsText = new Konva.Text({
                text: `Aciertos: ${hits}`,
                fontSize: 25,
                fill: 'white',
                x: 400,
                y: 40,
            });

            const levelText = new Konva.Text({
                text: `Nivel: ${level}`,
                fontSize: 25,
                fill: 'white',
                x: 400,
                y: 70,
            });

            const winScreen = document.getElementById('win-screen');
            winScreen.style.display = 'none';

            layer.add(shotsText);
            layer.add(hitsText);
            layer.add(levelText);

            const animation = new Konva.Animation((frame) => {
                const newY = character.y() + speed * direction;

                // Verificar límites superior e inferior y cambiar la dirección
                if (newY >= 0 && newY + character.height() <= stage.height()) {
                    character.y(newY);
                } else {
                    direction *= -1; // Invertir la dirección
                }
            }, layer);

            // Configurar velocidad según el nivel de dificultad
            switch (level) {
                case 'facil':
                    speed = 2;
                    bulletSpeed = 5;
                    break;
                case 'medio':
                    speed = 4;
                    bulletSpeed = 8;
                    break;
                case 'dificil':
                    speed = 6;
                    bulletSpeed = 12;
                    break;
                default:
                    speed = 2;
                    bulletSpeed = 5;
            }

            // Crear personaje y diana después de elegir el nivel
            const character = new Konva.Image({
                image: loadedImages.character,
                width: 60,
                height: 100,
                x: 50,
                y: stage.height() / 2 - 50,
            });

            const target = new Konva.Image({
                image: loadedImages.target,
                width: 50,
                height: 50,
                x: stage.width() - 100,
                y: stage.height() / 2 - 25,
            });

            layer.add(character);
            layer.add(target);
            // Manejar eventos de teclado para disparar
            window.addEventListener('keydown', (e) => {
                if (e.code === 'Space') {
                    shoot();
                }
            });

            function shoot() {
                shots++;

                const bullet = new Konva.Image({
                    image: loadedImages.bullet,
                    width: 40,
                    height: 10,
                    x: character.x() + character.width(),
                    y: character.y() + character.height() / 2 - 2.5,
                });

                layer.add(bullet);

                const bulletAnimation = new Konva.Animation((frame) => {
                    bullet.x(bullet.x() + bulletSpeed);

                    // Verificar colisión con la diana
                    if (
                        bullet.x() + bullet.width() > target.x() &&
                        bullet.y() > target.y() &&
                        bullet.y() < target.y() + target.height()
                    ) {
                        hits++;
                        hitsText.text(`Aciertos: ${hits}`);
                        // Eliminar la bala y restablecer la posición de la diana
                        bulletAnimation.stop();
                        bullet.destroy();
                        target.x(stage.width() - 100);
                        target.y(Math.random() * (stage.height() - target.height()));

                        // Verificar si el jugador ha ganado
                        if (hits === 10) {
                            winScreen.style.display = 'block';
                            animation.stop();
                        }
                    }

                    // Verificar si la bala sale de la pantalla
                    if (bullet.x() > stage.width()) {
                        bulletAnimation.stop();
                        bullet.destroy();
                    }
                }, layer);

                shotsText.text(`Disparos: ${shots}`);
                bulletAnimation.start();
            }

            animation.start();
        }
    </script>

</body>

</html>