<?php 
    require_once'loggedinonly.php';
    include 'db2.php';
    
    if( $_SESSION['admin']!=1){
        echo "<h2 class=\"text-center alert alert-danger\">You must be an admin to be authorized to add items.</h2>";
        echo" <a class=\"btn btn-success btn-lg\" href=\"items.php\" >click here to return to home page</a>";
        //exit;
    }
    else{
    
       if($_SERVER["REQUEST_METHOD"] === "POST") {
            if(empty($_POST['name'])) {
                $errors[] = "name is a required parameter";
            } else {
                $name = $_POST['name'];
            }
            if(empty($_POST['description'])) {
                $errors[] = "description is a required parameter";
            } else {
                $description = $_POST['description'];
            }
            if(empty($_POST['price']) || !is_numeric($_POST['price']) || $_POST['price'] < 0) {
                $errors[] = "price is a required parameter and must be a number greater then 0";
            } else {
                $price = $_POST['price'];
            }
            if(empty($_POST['url'])) {
                $errors[] = "url is a required parameter";
            } else {
                $url = $_POST['url'];
            }
            if(empty($errors)) {
                try {
                    $query = "INSERT INTO items(name,description, price,url) VALUES(:name,:description, :price,:url)";
                    $statement = $db->prepare($query);
                    $statement->bindValue('name', $name);
                    $statement->bindValue('description', $description);
                    $statement->bindValue('price', $price);
                    $statement->bindValue('url', $url);
                    
                    if(!$statement->execute() || $statement->rowCount() < 1) {
                        $error = "Something went wrong, item not inserted";
                    }
                } catch (PDOException $e) {
                    $error = "Something went wrong " . $e->getMessage();
                }
            }
       }
    }   
    include 'top.php'
    ?>
    <?php if(!empty($errors)) : ?>
        <h2 class="text-center alert alert-danger">
            <ul>
                <?php foreach($errors as $error) :?>
                <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </h2>
    <?php elseif(!empty($name)) :?>
        <h2 class="text-center text-success">Item successfully added</h2>
    <?php
    endif;
    ?> 
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="name" name="name"/>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input class="form-control" id="description" name="description"/>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" step=".01" id="price" name="price"/>
            </div>
        </div>

        <div class="form-group">
            <label for="url" class="col-sm-2 control-label">Url</label>
            <div class="col-sm-10">
                <input class="form-control" id="url" name="url"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
        </div>
        
    </form>

    
</div>
    </body>
</html>
