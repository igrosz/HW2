<?php
$selectedSefer = $_POST['sefer'];


    $cs = "mysql:host=localhost;dbname=sefarimStore";
    $user = "root";
    $password = null;
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        echo"<h1>Our Price</h1>";
        print_r( password_hash(123, PASSWORD_DEFAULT)<br>
       {password_hash(456, PASSWORD_DEFAULT)}<br>
        {password_hash(789, PASSWORD_DEFAULT)}<br>
        {password_hash(012, PASSWORD_DEFAULT)}<br>
        {password_hash(345, PASSWORD_DEFAULT)});
        $query = "SELECT * FROM priceList WHERE name = '$selectedSefer'";
        $results = $db->query($query);
        $response = $results->fetch();
       
            echo "<h2> {$response['name']} is $ {$response['price']};</h2>";
            
            
            
        }
       
    catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }
     
?>
