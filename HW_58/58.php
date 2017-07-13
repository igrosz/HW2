<?php
    $name  = "";
    $email = "";
    $age ="";
    $rating="";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(empty($_POST['name'])) {
          $errors[] = "Amount is a required field";
        }
           $name = $_POST['name'];

           if(empty($_POST['email'])) {
          $errors[] = "email is a required field";
        }
           $email = $_POST['email'];

           if(empty($_POST['age'])) {
          $errors[] = "age is a required field";
        }
            if ( $_POST['age'] < 1 ||$_POST['age'] >120) {
              $errors[] = "Age must be a number greater than 0 and less than 120"; 
            }  
           $age = $_POST['age'];

           if(empty($_POST['rating'])) {
          $errors[] = "rating is a required field";
        }
         if ( $_POST['rating'] < 1 ||$_POST['rating'] >10) {
              $errors[] = "rating must be a number greater than 0 and less than 10"; 
            }  
           $rating = $_POST['rating'];
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
            <h1>Rating Form Imput</h1>
        </div>

        <form class="form-horizontal" method="post">
            <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="name" name="name" placeholder="name" xrequired
                        value="<?= $name ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email"  class="form-control" id="email" name="email" placeholder="email" xrequired
                        value="<?= $email ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Age:</label>
                <div class="col-sm-10">
                    <input type="number" min="1" step="1" class="form-control" id="age" name="age" 
                    placeholder="age" xrequired
                     value="<?= $age ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="rating" class="col-sm-2 control-label">Rating:</label>
                <div class="col-sm-10">
                    <input type="number" min="1" step="1" class="form-control" id="rating" name="rating" placeholder="rating" xrequired
                        value="<?= $rating ?>"
                    >
                </div>
            </div>
        
           <!-- <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>-->
        </form>

    </div>
            
            
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>