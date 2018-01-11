(function () {
    "use strict";
    function Vehicle(color) {

        this.color = color;
    }
    Vehicle.prototype.go = function (speed) {
        this.speed = speed;
        console.log("now going at speed " + this.speed);
    };
    Vehicle.prototype.print = function () {
        console.log("color: " + this.color, " speed: " + this.speed);
    };

    function Plane(color) {

        this.color = color;

        this.go = function (speed) {
            this.speed = speed;
            console.log("now flying at speed " + this.speed);
        };


    }
    Plane.prototype = Object.create(Vehicle.prototype);
    var ford = new Vehicle("blue"),
        airbus = new Plane("white");
    ford.go(65);
    ford.print();
    airbus.go(500);
    airbus.print();
}());