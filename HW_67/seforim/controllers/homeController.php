<?php

include 'controllers/categorySelectionController.php';

if(isset($_GET["sefer"])) {
    if(empty($_GET["sefer"] || !is_numeric($_GET["sefer"]))) {
        $error = "A valid sefer id must be submitted";
    } else {
        $theId = $_GET['sefer'];
    }
}

include "models/categoryModel.php";
include "models/seforimModel.php";
include "views/homeView.php";
?>