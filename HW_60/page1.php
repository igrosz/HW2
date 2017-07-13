<?php
$color = '';
$font='';

 $color = $_GET["color"];
 $font = $_GET["font"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
             color:<?=$color?>;
             font-family:<?=$font?>;
        }
       
      
    </style>
</head>

<body>

    <nav>
		<ul>
			<li><a href="page1.php?color=<?=$color?>;font=<?=$font?>">Page 2</a></li>
         </ul>
      </nav>      
    <div class="jumbotron">
        <div class="container text-center">
            <h1>PAGE 1</h1>
        </div>
    </div>
    <div class="container">
       

        <form class="form-horizontal" method="get">
            <div class="form-group
            
                <label for="color" class="col-sm-2 control-label">Color</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="color" name="color" placeholder="color" xrequired
                        value="<?=$color?>"
                    >
                </div>
            </div>
            <div class="form-group 
                <label for="font" class="col-sm-2 control-label">Font</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="font" name="font" placeholder="font" xrequired
                        value="<?=$font?>"
                    >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>