<?php
    $lang_array =["java","javascript","php"];
    $name  = "";
    $years = "";
    $language ="";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
       if(empty($_POST['name'])) {
          $errors[] = "Name is a required field";
        }
           $name = $_POST['name'];

           if(empty($_POST['years'])) {
          $errors[] = "years is a required field";
        }
            if ( $_POST['years'] < 0 ||$_POST['years'] >50) {
              $errors[] = "years must be a number from 0 till 50"; 
            }  
           $years = $_POST['years'];

             if(empty($_POST['language'])) {
          $errors[] = "language is a required field";
        }
         if (!in_array("$_POST['language'] ", $lang_array)) {        
              $errors[] = " language must be a real programming language";
         } 
           $language = $_POST['language'];
    }
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
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Favorite Language</h1>
        </div>

        <form class="form-horizontal" method="post">
            <?php if (isset($errors)) {?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) :?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php }
            else{
                echo "Thanks for submitting your data";
                };
            
            ?>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="name" name="name" placeholder="name" xrequired
                        value="<?= $name ?>"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="years" class="col-sm-2 control-label">Years Coding:</label>
                <div class="col-sm-10">
                    <input type="number" min="1" step="1" class="form-control" id="years" name="years" 
                    placeholder="years" xrequired
                     value="<?= $years ?>"
                    >
                </div>

            <div class="form-group">
                <label for="language" class="col-sm-2 control-label">Favorite Programming Language:</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="language" name="language" placeholder="language" xrequired
                        value="<?= $language ?>"
                    >
                </div>
            </div>
            
        
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
            
            
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>