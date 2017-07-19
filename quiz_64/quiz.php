 <?php
 $selectedStudent = "";
 if(isset($_POST["student"])) {
            
                $selectedStudent = $_POST['student'];
            }
 
    $cs = "mysql:host=localhost;dbname=students";
    $user = "root";
    $password = null;
    try {
         $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
       
       
        $query = "SELECT DISTINCT name FROM grades ;";
        $query .= "SELECT  grade FROM grades";
        $results = $db->query($query);
        $studentGrades = $results->fetchAll();

               /* $query1 = "SELECT grade FROM grades";
                $results1 = $db->query($query1);
                $studentGrades1 = $results1->fetchAll();*/
      
           foreach($studentGrades as $studentGrade) {
             echo"$studentGrade[name]";
               foreach($studentGrades as $studentGrade) {
                    echo "$studentGrade[grade]";} 
                    } 
              
           
            
             $delete = "DELETE  FROM grades WHERE name = '$selectedStudent' ";
             $rowsDeleted = $db->exec($delete);
             echo "Deleted $rowsDeleted rows<br/>";
            
        
        
    } catch(PDOException $e) {
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

    
            <h1>Delete Student</h1>
       
    <form  method="post">

        <div class="form-group col-sm-4 text-center">
                <label for="student" >Student Name:</label>
               
                    <input type="text"  class="form-control" id="student" name="student" >
         </div >

        <div class=" text-center">
        <input type="submit"/>
        </div>
    </form>
</body>

</html>
