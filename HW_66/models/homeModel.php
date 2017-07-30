<?php
    $cs = "mysql:host=localhost;dbname=sefarimStore";
    $user = "root";
    $password = null;
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "SELECT id, name FROM priceList";
        if (!empty($category)) {
        $query.=" WHERE category = :category";
        }
          $statement = $db->prepare($query);
        if (!empty($category)) { 
        $statement->bindValue('category', $category);
         }
        $statement->execute();//$db->query($query);
        $seforim = $statement->fetchAll();
        //$results->closeCursor();


                if(isset ($theId)){
    
                $query = "SELECT id, name, price FROM priceList WHERE id = :theId";
                $statement = $db->prepare($query);
                
                $statement->bindValue('theId', $theId);
                $statement->execute();
                $selectedSefer = $statement->fetch();
                if(empty($selectedSefer)) {
                    $error = "Couldnt find sefer {$theId}";
                }
            }
        }
     catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>
