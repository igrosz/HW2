(function () {
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        ants = [];

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    function Ant() {
        this.x = canvas.width / 2;
        this.y = canvas.height / 2;
    }

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    function clear() {
        context.clearRect(0, 0, canvas.width, canvas.height);

    }


    Ant.prototype.move = function () {
        //context.clearRect(this.x - 1, this.y - 1, 4, 4);
        var amount = 5,//getRandomNumberBetween(1, 5),
            x = 2,//getRandomNumberBetween(-2, 2),
            y = 2,//getRandomNumberBetween(-2, 2),
            i;
        for (i = 0; i < amount; i++) {
            setTimeout(clear(), 1000);

            this.x = (this.x + x); this.y = (this.y + y);
            context.fillRect(this.x, this.y, 2, 2);






        }
    };



    /*var ant = new Ant();
    setInterval(() => {
        ant.move();
    }, 100);*/

    for (var i = 0; i < 9; i++) {
        ants.push(new Ant());
    }
    var theAddButton = document.getElementById("add");
    theAddButton.addEventListener('click', function () {
        for (var i = 0; i < 1000; i++) {
            ants.push(new Ant());
            context.color = 'blue';
        }
    });
    //setInterval(() => {
    //context.clearRect(0, 0, canvas.width, canvas.height);
    ants.forEach(ant => ant.move());
    // }, 3000);
}());