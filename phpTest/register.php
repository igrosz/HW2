<?php 
    include 'db2.php';
    require_once "httpsonly.php";
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if(empty($_POST['name'])) {
            $errors[] = "name is a required parameter";
        } else {
            $username = $_POST['name'];
        }
        if(empty($_POST['password']) ) {
            $errors[] = "password is  required ";
        } else {
            $password = $_POST['password'];
        }
        if(!isset($_POST['admin'])) {
            $errors[] = "admin is a required parameter";
        } else {
            $admin = $_POST['admin'];
        }
       
       
        if(empty($errors)) {
            try {
                $query = "INSERT INTO users(username,password,admin) VALUES(:username,:password,:admin)";
                $statement = $db->prepare($query);
                $statement->bindValue('username', $username);
                $statement->bindValue('password', password_hash($password, PASSWORD_DEFAULT));
                $statement->bindValue('admin', $admin);
                
                
                if(!$statement->execute() || $statement->rowCount() < 1) {
                    $error = "Something went wrong, item not inserted";
                }
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }
   }
   
   include "top2.php";
?>
   

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
            <label for="admin" class="col-sm-2 control-label">admin</label>
            <div class="col-sm-10">
                <input class="form-control" id="admin" name="admin"/>
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
    <?php elseif(!empty($username)) : ?>
        <div>
            <h2 class="text-center text-success">new username successfully submitted</h2><br>
             <a class="btn-center btn-success btn-lg" href="items.php" > click here to return to the login page </a>
        </div>
    <?php
    endif; 
?>
 <?php include "bottom.php" ?>