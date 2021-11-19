<?php
session_start();

$user = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("cart.xml");

$carts = $xml->getElementsByTagName("cart");
$response = 0;

foreach($carts as $cart){
    $email = $cart->getElementsByTagName("owner")->item(0)->nodeValue;
    $prodname = $cart->getElementsByTagName("productName")->item(0)->nodeValue;
    $status = $cart->getElementsByTagName("status")->item(0)->nodeValue;
    if($user == $email){
        $cart->getElementsByTagName("status")->item(0)->nodeValue = "Paid";
        $xml->save("cart.xml");
        $response = 1;
    }
}
echo $response;

function createTransac($email, $prodname){
    if($email == $_SESSION['email']){
        $transacID = mt_rand();
        $datePurchased = date("l jS \of F Y h:i:s A");
    }
    
    
}