<?php 
    include 'utils/db.php';

    if (!empty($name) && !empty($price)) {
        try {
            $query = "INSERT INTO seforim(name, price) VALUES(:name, :price)";
            $statement = $db->prepare($query);
            $statement->bindValue('name', $name);
            $statement->bindValue('price', $price);
            if(!$statement->execute() || $statement->rowCount() < 1) {
                $error = "Something went wrong, sefer not inserted";
            }
        } catch (PDOException $e) {
            $errors[] = "Something went wrong " . $e->getMessage();
        }
    } else {
        $errors[] = "Name and price are required";
    }
?>