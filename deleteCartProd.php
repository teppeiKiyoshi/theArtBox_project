<?php
session_start();
$name = $_POST['name'];
$user = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("cart.xml");
$carts = $xml->getElementsByTagName("cart");
$response = 0;

foreach($carts as $cart){
    $email = $cart->getElementsByTagName("owner")->item(0)->nodeValue;
    $prodname = $cart->getElementsByTagName("productName")->item(0)->nodeValue;
    if($user == $email && $prodname == $name){
        $xml->getElementsByTagName("carts")->item(0)->removeChild($cart);
        $xml->save("cart.xml");
        $response = 1;
        break;
    }
}
echo $response;