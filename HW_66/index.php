<?php
$action = "home";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}
switch($action) {
    case 'home':
        include 'controllers/homeController.php';
        exit;
    case 'add':
        include 'controllers/addSeferController.php';
        exit;
    default:
        $error = "Dont know how to $action";
        //include 'views/error.php';
        exit;
}
?>