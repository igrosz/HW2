<?php
    
include 'db2.php';
require_once'loggedinonly.php';
try {
    $query = "SELECT * FROM items LIMIT 20";
    $results = $db->query($query);
    $items = $results->fetchAll();
    $results->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}

    
    include 'top.php';
?>
    <div class="row">
        <?php foreach($items as $item) :?>
            <div class="col-md-3 col-sm-4 house">
                
                <figcaption class="text-center">
                <h1><?= $item['name'] ?></h1>
                <h5><?= $item['description'] ?></h5>
                <h3>$<?= number_format($item['price'], 2) ?></h3>
                <figure>
                    <img src="<?= $item['url'] ?>" alt="picture of the item"/>
                </figure>
                    
                    
                </figcaption>
            </div>
        <?php endforeach ?>
    </div>

    <?php include "bottom.php" ?>
?>