<?php
    include 'utils/db.php';

    try {
        $query = "SELECT category FROM seforim GROUP BY category";
        $results = $db->query($query);
        $categories = $results->fetchAll(PDO::FETCH_COLUMN);

        $results->closeCursor();
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
?>