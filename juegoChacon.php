<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Adventure Game</title>
    <script src="https://cdn.jsdelivr.net/npm/konva@8.0.2/konva.min.js"></script>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #6ECCD3;
            /* Puedes cambiar este color */
        }

        #olas {
            background: url('/assets/img/waves.gif') repeat-x;
        }

        #game-container {
            position: absolute;
        }
    </style>
</head>

<body>
    <div id="game-container"></div>
    <script>
        const stage = new Konva.Stage({
            container: 'game-container',
            width: window.innerWidth,
            height: window.innerHeight,
        });

        const layer = new Konva.Layer();
        stage.add(layer);

        const waterFrames = [];
        const numFrames = 5; // Número de frames de la animación de agua
        let currentFrame = 0;

        for (let i = 0; i < numFrames; i++) {
            const frame = new Konva.Rect({
                width: stage.width(),
                height: stage.height(),
                fill: '#6ECCD3', // Puedes cambiar este color
                fillPatternOffset: { x: i * 50, y: 0 },
            });

            waterFrames.push(frame);
            layer.add(frame);
        }

        const playerImage = new Image();
        playerImage.src = '/assets/img/playerpepe.png'; // Ruta de la imagen del jugador

        playerImage.onload = function () {
            const playerContainer = new Konva.Group({
                x: 50,
                y: stage.height() / 2,
            });

            const player = new Konva.Image({
                x: -playerImage.width / 2,
                y: -playerImage.height / 2,
                image: playerImage,
                width: playerImage.width,
                height: playerImage.height,
            });

            playerContainer.add(player);
            layer.add(playerContainer);

            const waveGifElement = new Image();
            waveGifElement.src = '/assets/img/waves.gif'; // Ruta del GIF de las olas
            waveGifElement.id = 'olas';

            waveGifElement.onload = function () {
                const wave = new Konva.Image({
                    x: -waveGifElement.width / 2,
                    y: -waveGifElement.height / 2,
                    image: waveGifElement,
                    width: waveGifElement.width,
                    height: waveGifElement.height,
                    opacity: 0.5, // Ajusta la opacidad según tus necesidades
                });

                playerContainer.add(wave);
                layer.batchDraw();
            };

            const obstacleImages = [];
            const obstacleSpawnInterval = 120;
            let frameCount = 0;

            function updateWaterAnimation() {
                currentFrame = (currentFrame + 1) % numFrames;
                for (let i = 0; i < numFrames; i++) {
                    waterFrames[i].fillPatternOffsetX((currentFrame + i) % numFrames * 50);
                }
                layer.batchDraw();
            }

            function spawnObstacle() {
                const obstacleImage = new Image();
                obstacleImage.src = '/assets/img/tiburon.png'; // Ruta de la imagen del obstáculo

                obstacleImage.onload = function () {
                    const obstacle = new Konva.Image({
                        x: stage.width(),
                        y: Math.random() * (stage.height() - obstacleImage.height),
                        image: obstacleImage,
                        width: obstacleImage.width,
                        height: obstacleImage.height,
                    });

                    layer.add(obstacle);
                    obstacleImages.push(obstacle);
                };
            }

            function moveObstacles() {
                for (let i = 0; i < obstacleImages.length; i++) {
                    const obstacle = obstacleImages[i];
                    obstacle.x(obstacle.x() - 5);
                    if (obstacle.x() + obstacle.width() < 0) {
                        obstacle.destroy();
                        obstacleImages.splice(i, 1);
                        i--;
                    }
                }
            }

            function checkCollision() {
                for (const obstacle of obstacleImages) {
                    if (Konva.Util.haveIntersection(playerContainer.getClientRect(), obstacle.getClientRect())) {
                        alert('Pepe está en problemas!');
                        resetGame();
                        return;
                    }
                }
            }

            function resetGame() {
                playerContainer.x(50);
                playerContainer.y(stage.height() / 2);
                for (const obstacle of obstacleImages) {
                    obstacle.destroy();
                }
                obstacleImages.length = 0;
                layer.batchDraw();
            }

            document.addEventListener('keydown', (e) => {
                if (e.code === 'ArrowUp' && playerContainer.y() - playerImage.height / 2 > 0) {
                    playerContainer.y(playerContainer.y() - 10);
                } else if (e.code === 'ArrowDown' && playerContainer.y() + playerImage.height / 2 < stage.height()) {
                    playerContainer.y(playerContainer.y() + 10);
                }
            });

            function gameLoop() {
                moveObstacles();
                checkCollision();
                updateWaterAnimation();

                frameCount++;
                if (frameCount % obstacleSpawnInterval === 0) {
                    spawnObstacle();
                }

                layer.batchDraw();
                requestAnimationFrame(gameLoop);
            }

            gameLoop();
        };
    </script>
</body>

</html>