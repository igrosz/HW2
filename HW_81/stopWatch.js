(function () {
    "use strict";

   
    var startString = 'Start';
    var stopString = 'Stop';
    var start;
    var intervalId;
    var elapsedTime;
    var d;
    var time;
    function get(id) {
        return document.getElementById(id);
    }
    function pad(n) { return ("0" + n).slice(-2); }
    function displayElapsedTime(){
        elapsedTime = new Date() - start;
        d=new Date(elapsedTime);
      time= pad(d.getHours()) +':'+ pad(d.getMinutes())+':'+pad(d.getSeconds())+':'+pad(d.getSeconds()*100);
        div.innerHTML= time;



    }
    

       
    


    var theStartButton = get("theStartButton");
    var theResetButton = get("theResetButton");
    var div=get("div");

    div.style.backgroundColor = 'lightblue';
    div.style.padding = '20px';
    div.style.width = '400px';
    div.style.height = '100px';
    div.style.border = '1px solid blue';
    div.style.position = 'absolute';
    div.style.left = '50%';
    div.style.top = '50%';
    div.style.marginLeft = '-200px';
    div.style.marginTop = '-50px';
    div.style.boxSizing = 'border-box';
    div.style.display = 'inline-block';

    theStartButton.innerHTML = startString;

    theStartButton.addEventListener('click', function () {
        
        
        if (theStartButton.innerHTML === startString) {
         start = new Date();
         
             
           intervalId = setInterval(displayElapsedTime, 10);
           theStartButton.innerHTML = stopString;
                
            
            
        } else {
            clearInterval(intervalId);
            
            theStartButton.innerHTML = startString;
        }
    });
    theResetButton.addEventListener("click", function () {
        clearInterval(intervalId);
        theStartButton.innerHTML = startString;
        div.innerHTML= " ";
       
    });

}());