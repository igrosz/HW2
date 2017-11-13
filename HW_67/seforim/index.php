<?php
$action = "home";

if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

if(file_exists("controllers/" . $action . "Controller.php")) {
    include "controllers/" . $action . "Controller.php";
} else {
    $errors[] = "Dont know how to $action";
    include "views/errorView.php";
}
/*
switch($action) {
    case 'home':
        include 'controllers/homeController.php';
        exit;
    case 'addSefer':
        include 'controllers/addSeferController.php';
        exit;
    default:
        exit("Dont know how to $action");
*/
?>