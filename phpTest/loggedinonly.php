<?php
require_once "httpsonly.php";
session_start();
if(!isset($_SESSION['username'])) {
  
    header("Location: login.php"); 
    exit;
}
?>