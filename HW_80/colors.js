(function () {
    "use strict";

    
    var intervalId; 
    var i = -1;
    var x =0;
   
    var startString = 'Start';
    var stopString = 'Stop';
    var colors = ['blue','red','green', 'black','white','gray','pink' ];
   

    function changeColors() {
        if(i < colors.length-1){
            i += 1;
        }
        else{
            i = 0;
        }

        if(x < colors.length-1){
            x += 1;
        }
        else{
            x = 0;
        }
        document.body.style.backgroundColor = colors[i] ;
        document.body.style.color = colors[x] ;
        
    }


    var theColorsButton = document.getElementById("theColorsButton");
    theColorsButton.innerHTML = startString;

    theColorsButton.addEventListener('click', function () {
        //if (!running) {
        //if (!intervalId) {
        if (theColorsButton.innerHTML === startString) {
            intervalId = setInterval(changeColors, 500);
            theColorsButton.innerHTML = stopString;
            //running = true;
        } else {
            clearInterval(intervalId);
            theColorsButton.innerHTML = startString;
            //running = false;
            //intervalId = 0;
        }
    });

    

}());