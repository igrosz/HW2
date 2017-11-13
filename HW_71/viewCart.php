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