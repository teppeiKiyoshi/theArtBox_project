<?php
session_start();
$user = $_SESSION['email'];
$file = $_POST['file'];
$name = $_POST['name'];
$price = $_POST['price'];
$id = $_POST['id'];

$xml = new DOMDocument();
$xml->load("wishlist.xml");
$wishlists = $xml->getElementsByTagName("wishlist");
$response = 0;
$flag = false;
if($wishlists->length > 0){
    foreach($wishlists as $wishlist){
        $wishid = $wishlist->getAttribute("id");
        $owner = $wishlist->getElementsByTagName("owner")->item(0)->nodeValue;
        if($user == $owner && $id == $wishid){
            $xml->getElementsByTagName("wishlists")->item(0)->removeChild($wishlist);
            $xml->save("wishlist.xml");
            $response = 2;
            $flag = false;
            break;
        }
        else{
            $flag = true;
        }
    }
    if($flag){
        $newUser = $xml->createElement("wishlist");
        $newOwner = $xml->createElement("owner", $user);
        $newProduct = $xml->createElement("productName",$name);
        $newPrice = $xml->createElement("productPrice", $price);
        $newImg = $xml->createElement("productImage", $file);
    
        $newUser->appendChild($newOwner);
        $newUser->appendChild($newProduct);
        $newUser->appendChild($newPrice);
        $newUser->appendChild($newImg);
        $newUser->setAttribute("id", $id);
    
        $xml->getElementsByTagName("wishlists")->item(0)->appendChild($newUser);
        $xml->save("wishlist.xml");
        $response = 1;
    }
}
else{
        $newUser = $xml->createElement("wishlist");
        $newOwner = $xml->createElement("owner", $user);
        $newProduct = $xml->createElement("productName",$name);
        $newPrice = $xml->createElement("productPrice", $price);
        $newImg = $xml->createElement("productImage", $file);
    
        $newUser->appendChild($newOwner);
        $newUser->appendChild($newProduct);
        $newUser->appendChild($newPrice);
        $newUser->appendChild($newImg);
        $newUser->setAttribute("id", $id);
    
        $xml->getElementsByTagName("wishlists")->item(0)->appendChild($newUser);
        $xml->save("wishlist.xml");
        $response = 1;
}
echo $response;