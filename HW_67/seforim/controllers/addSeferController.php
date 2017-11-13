<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(empty($_POST['name'])) {
        $errors[] = "name is a required parameter";
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['price']) || !is_numeric($_POST['price']) || $_POST['price'] < 0) {
        $errors[] = "price is a required parameter and must be a number greater then 0";
    } else {
        $price = $_POST['price'];
    }

    if(empty($errors)) {
        include 'models/addSeferModel.php';
    }
}

include 'views/addSeferView.php';
?>