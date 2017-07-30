<?php 

$months = [
"January", 
"February", 
"March ",
"April", 
"May ",
"June",
"July", 
"August",
"September",
"October",
"November ",
"December "
];


function monthOptions(){
      global $months;
      $x ="";
       foreach($months as $month) {
        $x .= "<option>".
                $month .
                "</option>";
               }
               return $x;
};
 /*function yearOptions(){   
        $y="";
        for($i =1582 $i < 2500; $i++) {
             $y.="<option>".
             $i.
              "</option>";
            }
            return $y;
 };*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       
    </style>
</head>

<body>
   
        <h1>Find The Number Of Days</h1>
   
    <form action="response.php" method="get">
        
        <label>Month:
            <select name="month">
               <?= monthOptions() ?>
            </select>
        </label>

        <div class="form-group">
                <label for="year" >Year:</label>
               
                    <input type="number" min="1" class="form-control" id="year" name="year" placeholder="Year"
                        value="<?= $year ?>">
         </div>

        <input type="submit"/>
    </form>
</body>
</html>
