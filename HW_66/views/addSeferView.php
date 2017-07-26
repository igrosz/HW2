

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
   <?php include 'top.php';?>

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

         <div class="form-group col-sm-4 text-center">
                <label for="price" >Category:</label>
               
                    <input type="text"  class="form-control" id="category" name="category" >
         </div >
        <div class=" text-center"><br>
        <input type="submit"/>
        </div>
    </form>
</body>

</html>
