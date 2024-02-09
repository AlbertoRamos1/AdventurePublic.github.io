<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <meta charset="utf-8" />
    <title>ArkAdventture</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        canvas {
            background-image: url('/assets/img/fondoAlberto.jpg');
            background-size: cover;
            display: block;
            margin: 0 auto;
        }

        #startScreen,
        #levelSelection {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        #startScreen button,
        #levelSelection button {
            font-size: 18px;
            padding: 10px;
            margin: 10px;
        }
        button{
            background-color: aqua;
        }
        button:hover{
            background-color: rgb(0, 94, 94);
        }
    </style>
</head>

<body>
    <div id="startScreen">
        <button onclick="startGame()">Empezar</button>
    </div>

    <div id="levelSelection" style="display:none;">
        <button onclick="startLevel('easy')">Nivel Fácil</button>
        <button onclick="startLevel('adventure')">Nivel Adventure</button>
    </div>

    <canvas id="myCanvas" width="480" height="320"></canvas>

    <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var ballRadius = 10;
        var x = canvas.width / 2;
        var y = canvas.height - 30;
        var dx = 2;
        var dy = -2;
        var paddleHeight = 40;
        var paddleWidth = 100;
        var paddleX = (canvas.width - paddleWidth) / 2;
        var rightPressed = false;
        var leftPressed = false;
        var brickRowCount = 5;
        var brickColumnCount = 3;
        var brickWidth = 75;
        var brickHeight = 20;
        var brickPadding = 10;
        var brickOffsetTop = 30;
        var brickOffsetLeft = 30;
        var score = 0;
        var lives = 3;

        var ballImage = new Image();
        ballImage.src = '/assets/img/balon.png';

        var brickImage = new Image();
        brickImage.src = '/assets/img/ladrillos.jpg';

        var paddleImage = new Image();
        paddleImage.src = '/assets/img/canoaAlberto.png';

        var bricks = [];
        for (var c = 0; c < brickColumnCount; c++) {
            bricks[c] = [];
            for (var r = 0; r < brickRowCount; r++) {
                bricks[c][r] = { x: 0, y: 0, status: 1 };
            }
        }

        var gameStarted = false;
        var currentLevel = '';

        function startGame() {
            document.getElementById("startScreen").style.display = "none";
            document.getElementById("levelSelection").style.display = "flex";
        }

        function startLevel(level) {
            document.getElementById("levelSelection").style.display = "none";
            document.getElementById("myCanvas").style.display = "block";
            gameStarted = true;
            currentLevel = level;
            init();
            draw();
        }

        function init() {
            if (gameStarted) {
                if (currentLevel === 'easy') {
                    dx = 2;
                    dy = -2;
                    paddleWidth = 100;
                } else if (currentLevel === 'adventure') {
                    dx = 3;
                    dy = -3;
                    paddleWidth = 75;
                }
            }
        }

        document.addEventListener("keydown", keyDownHandler, false);
        document.addEventListener("keyup", keyUpHandler, false);
        document.addEventListener("mousemove", mouseMoveHandler, false);

        function keyDownHandler(e) {
            if (e.code == "ArrowRight") {
                rightPressed = true;
            }
            else if (e.code == 'ArrowLeft') {
                leftPressed = true;
            }
        }
        function keyUpHandler(e) {
            if (e.code == 'ArrowRight') {
                rightPressed = false;
            }
            else if (e.code == 'ArrowLeft') {
                leftPressed = false;
            }
        }
        function mouseMoveHandler(e) {
            var relativeX = e.clientX - canvas.offsetLeft;
            if (relativeX > 0 && relativeX < canvas.width) {
                paddleX = relativeX - paddleWidth / 2;
            }
        }
        function collisionDetection() {
            for (var c = 0; c < brickColumnCount; c++) {
                for (var r = 0; r < brickRowCount; r++) {
                    var b = bricks[c][r];
                    if (b.status == 1) {
                        if (x > b.x && x < b.x + brickWidth && y > b.y && y < b.y + brickHeight) {
                            dy = -dy;
                            b.status = 0;
                            score++;
                            if (score == brickRowCount * brickColumnCount) {
                                alert("Enhorabuena!! Has Ganado!!");
                                document.location.reload();
                            }
                        }
                    }
                }
            }
        }

        function drawBall() {
            ctx.drawImage(ballImage, x - ballRadius, y - ballRadius, ballRadius * 2, ballRadius * 2);
        }
        function drawPaddle() {
            ctx.drawImage(paddleImage, paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
        }
        function drawBricks() {
            for (var c = 0; c < brickColumnCount; c++) {
                for (var r = 0; r < brickRowCount; r++) {
                    if (bricks[c][r].status == 1) {
                        var brickX = r * (brickWidth + brickPadding) + brickOffsetLeft;
                        var brickY = c * (brickHeight + brickPadding) + brickOffsetTop;
                        bricks[c][r].x = brickX;
                        bricks[c][r].y = brickY;
                        ctx.drawImage(brickImage, brickX, brickY, brickWidth, brickHeight);
                    }
                }
            }
        }
        function drawScore() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "#0095DD";
            ctx.fillText("Puntuación: " + score, 8, 20);
        }
        function drawLives() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "#0095DD";
            ctx.fillText("Vidas: " + lives, canvas.width - 65, 20);
        }

        function draw() {
            if (gameStarted) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                drawBricks();
                drawBall();
                drawPaddle();
                drawScore();
                drawLives();
                collisionDetection();

                if (x + dx > canvas.width - ballRadius || x + dx < ballRadius) {
                    dx = -dx;
                }
                if (y + dy < ballRadius) {
                    dy = -dy;
                }
                else if (y + dy > canvas.height - ballRadius) {
                    if (x > paddleX && x < paddleX + paddleWidth) {
                        dy = -dy;
                    }
                    else {
                        lives--;
                        if (!lives) {
                            alert("GAME OVER");
                            document.location.reload();
                        }
                        else {
                            x = canvas.width / 2;
                            y = canvas.height - 30;
                            dx = 2;
                            dy = -2;
                            paddleX = (canvas.width - paddleWidth) / 2;
                        }
                    }
                }

                if (rightPressed && paddleX < canvas.width - paddleWidth) {
                    paddleX += 7;
                }
                else if (leftPressed && paddleX > 0) {
                    paddleX -= 7;
                }

                x += dx;
                y += dy;
                requestAnimationFrame(draw);
            }
        }

        draw();
    </script>

</body>

</html>