<?php
    include 'utils/db.php';

    if(empty($categoryFilter)) {
        $categoryFilter = []; //'';
    }
    
    try {
        /*$query = "SELECT id, name FROM seforim";
        if(! empty($category)) {
            $query .= " WHERE category = :category";
        }
        $statement = $db->prepare($query);
        if(! empty($category)) {
            $statement->bindValue('category', $category);
        }*/

        /*$query = "SELECT id, name FROM seforim WHERE :category = '' OR category = :category";*/
        
        $query = "SELECT id, name FROM seforim";
        if(!empty($categoryFilter)) {
            $qm = array_fill(0, count($categoryFilter), '?');
            $in = join(",", $qm);

            print_r($qm);
            echo "<br>";
            print_r($in);

            $query .= " WHERE category IN ($in)";
        }
        $statement = $db->prepare($query);
        
        $statement->execute($categoryFilter);
        $seforim = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement->closeCursor();
    
        if(isset($theId)) {
            $query = "SELECT id, name, price FROM seforim WHERE id = :theId";
            $statement = $db->prepare($query);
            $statement->bindValue('theId', $theId);
            $statement->execute();
            
            $selectedSefer = $statement->fetch();
            if(empty($selectedSefer)) {
                $errors[] = "Couldnt find sefer {$theId}";
            }
        }
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
?>