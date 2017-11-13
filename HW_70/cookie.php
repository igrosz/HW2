<?php
    date_default_timezone_set('America/New_York');
    $myDate=date('m/d/Y h:i:s a', time());
    if(!empty($_COOKIE["DateCookie"])) {
       $date = $_COOKIE["DateCookie"];
    } else {
        $date = "null";
    }
    
    setCookie("DateCookie", "$myDate", time() + (60 * 60*24*30*12*3));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
</head>
<body>
    <h1>The cookie website</h1>
    <h2>
        <?php if ($date==="null"){
                echo "We hope you'll enjoy your first visit to our website ! ";
                }else{
                    echo"Welcome back!<br>Your last visit was:  ". "$date";
                } 
                
            ?>
    </h2>
               
    
</body>
</html>