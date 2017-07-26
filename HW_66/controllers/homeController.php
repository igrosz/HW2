<?php
            if(isset($_GET["sefer"])) {
                    if(empty($_GET["sefer"] || !is_numeric($_GET["sefer"]))) {
                        $error = "A valid sefer id must be submitted";
                    } else {
                        $theId = $_GET['sefer'];
                
                    }
            }

             if(isset($_GET['category'])){
                 $category = $_GET['category'];
             }

            include 'models/homeModel.php';
          include 'views/homeView.php';

?>