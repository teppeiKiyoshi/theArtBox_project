<?php
session_start();

$name = $_POST['name'];
$user = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("wishlist.xml");

$wishes = $xml->getElementsByTagName("wishlist");
$response = 0;

foreach($wishes as $wish){
    $email = $wish->getElementsByTagName("owner")->item(0)->nodeValue;
    $prodname = $wish->getElementsByTagName("productName")->item(0)->nodeValue;
    
    if($email == $user && $prodname == $name){
        $xml->getElementsByTagName("wishlists")->item(0)->removeChild($wish);
        $xml->save("wishlist.xml");
        $response = 1;
        break;
    }
}
echo $response;