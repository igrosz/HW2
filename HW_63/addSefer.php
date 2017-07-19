<?php
$selectedSefer = "";
 $selectedPrice ="";
 if(isset($_POST["sefer"])) {
            if(empty($_POST["sefer"] || is_numeric($_POST["sefer"]))) {
                $error = "A valid sefer  must be submitted";
            } else {
                $selectedSefer = $_POST['sefer'];
                 
            }
 }
         if(isset($_POST['price'])) {
            if(empty($_POST['price'] || !is_numeric($_POST['price']))) {
                $error = "A valid price must be submitted";
            } else {
               $selectedPrice = $_POST['price'];
               
            }
         }

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
                            
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
   
</head>

<body>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Add Sefer</h1>
        </div>
    <form  method="post">

        <div class="form-group col-sm-4 text-center">
                <label for="sefer" >New Sefer:</label>
               
                    <input type="text"  class="form-control" id="sefer" name="sefer" >
         </div >

         <div class="form-group col-sm-4 text-center">
                <label for="price" >Price:</label>
               
                    <input type="decimal"  class="form-control" id="price" name="price" >
         </div >
        <div class=" text-center"><br>
        <input type="submit"/>
        </div>
    </form>
</body>

</html>
