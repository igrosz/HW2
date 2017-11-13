<?php 
     $cs = "mysql:host=localhost;dbname=login";
    $user = "root";
    $password = null;
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
       
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if(empty($_POST['name'])) {
            $errors[] = "name is a required parameter";
        } else {
            $name = $_POST['name'];
        }
        if(empty($_POST['password']) ) {
            $errors[] = "password is  required ";
        } else {
            $password = $_POST['password'];
        }
        if(empty($errors)) {
            try {
                $query = "INSERT INTO passwords(id,username,password) VALUES('null',:name, :password)";
                $statement = $db->prepare($query);
                $statement->bindValue('name', $name);
                $statement->bindValue('password', password_hash($password, PASSWORD_DEFAULT));
                $statement->execute();
                }
            catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }
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
    </style>
</head>

<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Register</h1>
        </div>
    </div>
    <div class="container">

    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="name" name="name"/>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">password</label>
            <div class="col-sm-10">
                <input class="form-control" type="text"  id="password" name="password"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">register</button>
            </div>
        
    </form>

    <?php if(!empty($errors)) : ?>
        <h2 class="text-center alert alert-danger">
            <ul>
                <?php foreach($errors as $error) :?>
                <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </h2>
    <?php elseif(!empty($name)) :?>
        <h2 class="text-center text-success">info successfully added</h2>
    <?php
    endif; 
?>
 </div>
    </body>
</html>