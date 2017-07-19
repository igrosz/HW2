<?php
$selectedSefer = "";

 if(isset($_POST["sefer"])) {
            if(empty($_POST["sefer"] || is_numeric($_POST["sefer"]))) {
                $error = "A valid sefer  must be submitted";
            } else {
                $selectedSefer = $_POST['sefer'];
                echo "<h2> You have successfully deleted from the database $selectedSefer</h2>";
            }
 }
         

    $cs = "mysql:host=localhost;dbname=sefarimStore";
    $user = "root";
    $password = null;
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        
        $query = $delete = "DELETE FROM pricelist WHERE NAME = :theSefer";
        
         $statement = $db->prepare($query);
         $statement->bindValue('theSefer',$selectedSefer);
         $statement->execute();
        
        
         
     
            
            
            
        }
       
    catch(PDOException $e) {
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
            <h1>Delete Sefer</h1>
        </div>
    <form  method="post">

        <div class="form-group col-sm-4 text-center">
                <label for="sefer" > Sefer:</label>
               
                    <input type="text"  class="form-control" id="sefer" name="sefer" >
         </div >

         
        <div class=" text-center"><br>
        <input type="submit"/>
        </div>
    </form>
</body>

</html>
