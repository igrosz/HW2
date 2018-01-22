(function () {
    "use strict";

    const LEFT = 37,
        UP = 38,
        RIGHT = 39,
        DOWN = 40,
        SNAKE_SIZE = 64;

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        crunchSound = document.getElementById("crunch"),
        direction = RIGHT,
        snake = [{ x: -64, y: 0 }],
        appleX,
        appleY,
        score = 0,
        timeout,
        speed = 400,
        ballX = getRandomNumberBetween(0, canvas.width),
        ballY = getRandomNumberBetween(0, canvas.height),
        changeY = 50,
        changeX = 50;


    function resizeCanvas() {
        var width = window.innerWidth - 10;
        var height = window.innerHeight - 10;

        canvas.width = width - width % SNAKE_SIZE;
        canvas.height = height - height % SNAKE_SIZE;

        if (appleX) {
            placeApple();
        }
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();

    function renderScore() {
        context.font = '48px cursive';
        if (score > 0) {
            context.fillStyle = 'white';
            context.fillText((score - 1).toString(), canvas.width - 100, 50);
        }
        context.fillStyle = 'black';
        context.fillText(score.toString(), canvas.width - 100, 50);
    }

    function gameLoop() {
        timeout = setTimeout(() => {
            var x = 0,
                y = 0,
                grew = false;

            switch (direction) {
                case LEFT:
                    x = -SNAKE_SIZE;
                    break;
                case UP:
                    y = -SNAKE_SIZE;
                    break;
                case RIGHT:
                    x = SNAKE_SIZE;
                    break;
                case DOWN:
                    y = SNAKE_SIZE;
                    break;
            }

            if (snake[0].x + x < 0 || snake[0].y + y < 0 || snake[0].x + x >= canvas.width || snake[0].y + y >= canvas.height) {
                crunchSound.currentTime = 0;
                crunchSound.play(); // should be a crash sound
                clearInterval(bouncingBall);
                return;
            }

            for (var i = 3; i < snake.length; i++) {
                if (snake[0].x + x === snake[i].x && snake[0].y + y === snake[i].y) {
                    crunchSound.currentTime = 0;
                    crunchSound.play(); // should be a crash sound
                    return;
                }
            }

            if (snake[0].x + x === appleX && snake[0].y + y === appleY) {
                crunchSound.currentTime = 0;
                crunchSound.play();
                score++;
                speed *= 0.9;
                snake.push({ x: snake[0].x, y: snake[0].y });
                grew = true;
                placeApple();
            }

            let head = snake[0],
                tail = snake.pop();

            snake.unshift({ x: head.x + x, y: head.y + y });

            if (!grew) {
                context.clearRect(tail.x, tail.y, SNAKE_SIZE, SNAKE_SIZE);
            }

            if (snake.length > 1) {
                context.fillStyle = "green";
                var body = context.fillRect(head.x, head.y, SNAKE_SIZE, SNAKE_SIZE);
                //body.style.zIndex = "-1";
            }

            context.drawImage(snakeHead, snake[0].x, snake[0].y, SNAKE_SIZE, SNAKE_SIZE);



            renderScore();

            gameLoop();
        }, speed);
    }
    setInterval(bouncingBall, 1000);

    var snakeHead = document.createElement('img');
    snakeHead.src = "snake.png";

    snakeHead.onload = gameLoop;

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    // TBD - ensure not under snake
    function placeApple() {
        appleX = getRandomNumberBetween(0, canvas.width);
        appleY = getRandomNumberBetween(0, canvas.height);
        appleX = appleX - appleX % SNAKE_SIZE;
        appleY = appleY - appleY % SNAKE_SIZE;
        var applePic = context.drawImage(apple, appleX, appleY, SNAKE_SIZE, SNAKE_SIZE);
        //applePic.style.zIndex = "100";
    }
    function bouncingBall() {

        context.clearRect(ballX - 50, ballY - 50, 100, 100);
        ballX += changeX;
        ballY += changeY;
        context.beginPath();
        context.arc(ballX, ballY, 50, 0, Math.PI * 2);
        context.fill();
        context.closePath();
        if (ballX - 75 < 0 || ballX + 75 >= canvas.width) {

            changeX = -changeX;
        }
        else if (ballY - 100 < 0 || ballY + 75 >= canvas.height) {
            changeY = -changeY;
        }


    }



    var apple = document.createElement('img');
    apple.src = "apple.png";

    apple.onload = placeApple;

    renderScore();


    window.addEventListener('keydown', function (event) {
        switch (event.keyCode) {
            case LEFT:
                if (direction !== RIGHT || snake.length === 1) {
                    direction = LEFT;
                }
                break;
            case UP:
                if (direction !== DOWN || snake.length === 1) {
                    direction = UP;
                }
                break;
            case RIGHT:
                if (direction !== LEFT || snake.length === 1) {
                    direction = RIGHT;
                }
                break;
            case DOWN:
                if (direction !== UP || snake.length === 1) {
                    direction = DOWN;
                }
                break;
        }
    });
}());