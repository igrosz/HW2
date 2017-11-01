(function () {
    "use strict";
    
    var submitButton = document.getElementById("submitButton");
    
    submitButton.addEventListener('click', function () {
        var backgroundColor = document.getElementById('backgroundColor').value;
        var textColor = document.getElementById('textColor').value;
      document.body.style.backgroundColor = backgroundColor;
      document.body.style.color = textColor;
    });
      

 }());