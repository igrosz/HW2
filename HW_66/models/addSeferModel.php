<?php
$selectedSefer = "";
 $selectedPrice ="";
 if((isset($_POST["sefer"]))&&(isset($_POST['price']))) {

                    $cs = "mysql:host=localhost;dbname=sefarimStore";
                    $user = "root";
                    $password = null;
                    try {
                        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                        $db = new PDO($cs, $user, $password, $options);
                      if(isset($_POST["sefer"])) {  
                        $query = "INSERT INTO priceList (name,price)VALUES(:theSefer,:thePrice)";
                        $statement = $db->prepare($query);
                        $statement->bindValue('theSefer',$selectedSefer);
                        $statement->bindValue('thePrice',$selectedPrice);
                        
                        $statement->execute();
                        echo "<h2> You have successfully added to the database $selectedSefer-$selectedPrice</h2>";
                        }
                        
                    
         
    
            
            
            
        
       
                        }catch(PDOException $e) {
                            die("Something went wrong " . $e->getMessage());
                        }
         }  
                            
?>