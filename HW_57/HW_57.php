<?php 
    
$name= "Donald Trump";
$name2="Barak Obama";
$name3="George W Bush";
$years= "2017-";
$years2="2009-2016";
$years3="2001-2008";

 $presidents = [
        $name => [
            "$name" ,
            "$years"
         ],
       "$name2" => [
            "$name2",
             "$years2"
        ],
       "$name3" => [
            "$name3",
             "$years3"
        ]
    ];

    $presidents = [
        $name => [
            "name" =>"$name" ,
           "years"=> "$years",
           "age"=>"70"
         ],
       $name2 => [
            "name" =>"$name2",
             "years"=>"$years2",
              "age"=>"60"
        ],
       $name3 => [
           "name" => "$name3",
            "years"=> "$years3",
             "age"=>"50"
        ]
    ];
    print_r( $presidents);
    echo "<br/>";
?>
      
      
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">  
      
  
    <title>Document</title>
    <style>

    </style>
</head>
<body>
  <div class="col-md-6 col-md-push-3" > 
 <table class=" table table-bordered table-striped table-hover ">
   <thead>
    <tr>
        <?php
            foreach($presidents[$name] as $key=>$value)
            {
                echo "<th>".$key."</th>";
            }
        ?>
     
    </tr>
    </thead>
    <tbody> 
        <?php
         foreach ($presidents as $president) {
     echo    "<tr>";
        foreach ($president as $property){
            echo "<td>".$property."</td>";
        }
            echo"</tr>" ;
            }  
       ?>  
    </tbody>
    </table>
    </div>
 </body>

 </html>
