
(function () {
    "use strict";


    var canvas = document.getElementById("theCanvas"),
        gameOver = document.getElementById("gameOver"),
        score = document.getElementById("score"),
        context = canvas.getContext('2d'),
        xSnake,
        ySnake,
        xApple,
        yApple,
        points = 0;

    function resizeCanvas() {
        canvas.width = window.innerWidth - 10;
        canvas.height = window.innerHeight - 110;
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();


    var img = document.createElement('img'),
        img2 = document.createElement('img'),
        direction = 39;
    img.src = "snake.png";
    img2.src = "apple.png";


    img.onload = function () {

        xSnake = 0;
        ySnake = 0;
        xApple = 200;
        yApple = 0;

        function move() {

            context.clearRect(xSnake, ySnake, 64, 64);
            if (direction === 39) {
                xSnake += 64;
            }


            if (direction === 40) {
                ySnake += 64;

            }
            if (direction === 37) {
                xSnake -= 64;
            }
            if (direction === 38) {
                ySnake -= 64;

            }




            if (xSnake < 0) {
                xSnake = 0;
                gameOver.style.display = 'inline-block';
            } else if (xSnake > canvas.width - 64) {
                xSnake = canvas.width - 64;
                gameOver.style.display = 'block';
            }

            if (ySnake < 0) {
                ySnake = 0;
                gameOver.style.display = 'inline-block';
            } else if (ySnake >= canvas.height - 64) {
                ySnake = canvas.height - 64;
                gameOver.style.display = 'inline-block';
            }


            context.drawImage(img, xSnake, ySnake, 64, 64);
            context.drawImage(img2, xApple, yApple, 64, 64);
            if (xSnake + 32 === xApple + 32 && ySnake + 32 === yApple + 32) {
                console.log("hit");
                points += 10;

            }
            score.innerHTML = points;



        }
        setInterval(move, 1000);




        document.addEventListener('keydown', (event) => {
            const keycode = event.keyCode;
            direction = keycode;
            points += 10;


        });


    };
    //img2.onload = function () {


    // };


}());