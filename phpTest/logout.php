<?php
require_once "loggedinonly.php";
unset($_SESSION['username']);
http_response_code(302);
header("Location: login.php");
exit;
?>