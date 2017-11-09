(function () {
    "use strict";

    
    var intervalId; 
    
   
    var startString = 'Start';
    var stopString = 'Stop';
    //var colors = ['blue','red','green', 'black','white','gray','pink' ];

    function makeRandomColor(){
        var c = '';
        while (c.length < 7) {
          c += (Math.random()).toString(16).substr(-6).substr(-1);
        }
        return '#'+c;
      }
   

    function changeColors() {
       /*  if(i < colors.length-1){
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
        } */
        document.body.style.backgroundColor = makeRandomColor()  ;
        document.body.style.color = makeRandomColor() ;
        
    }


    var theColorsButton = document.getElementById("theColorsButton");
    theColorsButton.innerHTML = startString;

    theColorsButton.addEventListener('click', function () {
        //if (!running) {
        //if (!intervalId) {
        if (theColorsButton.innerHTML === startString) {
            intervalId = setInterval(changeColors, 1500);
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