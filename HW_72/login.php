<?php
    require "httpsonly.php";

    $cs = "mysql:host=localhost;dbname=login";
    $user = "root";
    $password = null;
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "SELECT username FROM passwords";
        
          $statement = $db->prepare($query);
        
        $statement->execute();
        $seforim = $statement->fetch(PDO::FETCH_ASSOC);
        echo"$seforim";
        
        //$results->closeCursor();


                /*if(isset ($theId)){
    
                $query = "SELECT id, name, price FROM priceList WHERE id = :theId";
                $statement = $db->prepare($query);
                
                $statement->bindValue('theId', $theId);
                $statement->execute();
                $selectedSefer = $statement->fetch();
                if(empty($selectedSefer)) {
                    $error = "Couldnt find sefer {$theId}";
                }
            }*/
        }
     catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
    
    
?>

$hash = password_hash($password, PASSWORD_DEFAULT);
echo "$password = $hash<br>";
if(!password_verify($password, $hash)) {
    die("Password no good");
}
?>
My social is 123-45-6789