<?php
    $cs = "mysql:host=localhost;dbname=test";
    $user = "phpuser";
    $password = 'p@$$w0rd';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
        include "views/errorView.php";
        exit;
    }
?>