<?php

$monthDays = [
"January"=>"31", 
"February"=>"", 
"March "=>"31",
"April"=>"30", 
"May "=>"31",
"June"=>"30",
"July"=>"31", 
"August"=>"31",
"September"=>"30",
"October"=>"31",
"November "=>"30",
"December "=>"31"
];
function daysInMonth($month){
   global $monthDays;
   
               foreach($monthDays[$month] as $key=> $value){   
                   
                return $value;}
            

};
function isItLeapYear($year){
    if(($year)%4==0&&($year)%100!=0 ||($year)%4==0&&($year)%100==0&&($year)%400==0){
        return "yes";
        }
    else{
        return "no";
    }
};

$selectedMonth="";
$selectedMonth=$_GET["month"];
$selectedYear="";
$selectedYear=$_GET["year"];
echo "$selectedMonth"." "."of"." ".$selectedYear ."has";
/*if($selectedMonth=="February"){
 echo "daysInMonth($selectedMonth)";
}
   else{*/
     if(isItLeapYear($selectedYear)=="yes"){
            echo"29 days";
         } 
     else{
     echo"28 days";
    };
   


 


echo "<br>"."$selectedYear"." ". "has"." ";
if(isItLeapYear($selectedYear)=="yes"){
            echo"366 days";
}
else{
    echo"365 days";
};



?>