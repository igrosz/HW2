<?php


class Cart {
    public $item;
    public $amount;
    public function __construct() {
        session_start();
        
        if(empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    public function addItem($item, $quantity) {
        if(!empty($_SESSION['cart'][$item])) {
            $quantity += $_SESSION['cart'][$item];
        }
        $_SESSION['cart'][$item] = $quantity;
    }
    public function getItems() {
        return $_SESSION['cart'];
    }
}
$cart = new Cart();
 if(isset($_GET["paperAmount"])) {
            
  $cart->addItem("paper", $_GET['paperAmount']);
 } 
 if(isset($_GET["penAmount"])) {
  $cart->addItem("pen", $_GET['penAmount']);
 }   


print_r($cart->getItems());


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color: <?= $color ?>;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>The selection page</h1>
   
    <form action="veiwCart.php">
   paper amount<input type="number" name="paperAmount" ><br> 
  pen amount<input type="number" name="penAmount" ><br>
  <input type="submit" value="Submit"> 
  </form>
</body>
</html>