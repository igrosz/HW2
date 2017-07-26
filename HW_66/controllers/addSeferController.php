<?php
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
         include'models/addSeferModel.php';
         include'views/addSeferView.php';
 ?>        