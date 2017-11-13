<?php
include 'utils/dbClass.php';
    
    $db2 = new Database();
    $db=$db2->getDb();
   

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

$myPage=0;
  if(!empty($_GET['page'])&&($_GET['page'])>=1){
      $myPage=$_GET['page'];
  }
$perPage=2;
  if(!empty($_GET['perPage'])&& ($_GET['perPage']>=1) &&($_GET['perPage']<=8)){
       $perPage=$_GET['perPage'];
 }
$offset=($myPage*$perPage);

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT $offset, $perPage";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
   
    $statement->execute();
    $houses = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>