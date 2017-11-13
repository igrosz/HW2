<?php 
include 'db2.php';
require_once "httpsonly.php";
session_start();
$username = '';
$password = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
    }
    if(!empty($username) && !empty($password)) {
       
        $query = "SELECT password, admin  FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue("username", $username);
    
        try {
            $statement->execute();
            $hash = $statement->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password, $hash['password'])) {
                $_SESSION['username'] = $username;
                 $_SESSION['admin'] = $hash['admin'];
               
                
                header("Location: items.php");
                exit;
            }
            $errors[] = "Username and password did not match our records. Please try again";
        } catch(PDOException $e){
            $errors[] = $e->getMessage();
        }
    } else {
        $errors[] = "Username and password are required";
    }
}

if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif; 
include "top2.php";
?>
     <div class="container">
     <h2>Please login</h2><br>
     <a class="btn btn-success btn-lg" href="register.php" >first visit? click here to register</a>
    
<form method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input class="form-control" id="username" name="username" placeholder="Enter username" value="<?= $username ?>">
</div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $password ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include "bottom.php" ?>