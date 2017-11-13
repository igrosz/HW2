<?php
$ini = parse_ini_file("../settings.ini");

    $cs =$ini['dbname'] ;
    $user = $ini['user'];
    $password =$ini['password'];
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>