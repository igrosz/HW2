<?php
class Database {
       public function __construct(){

       }
       public function getDb(){
                $cs = "mysql:host=localhost;dbname=test";
                $user = "root";
                $password = null;

                try {
                    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                    return new PDO($cs, $user, $password, $options);
                } catch (PDOException $e) {
                    $error = "Something went wrong " . $e->getMessage();
                }
       }

    }
    ?>