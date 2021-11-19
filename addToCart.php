<?php 

session_start();

$user = $_SESSION['email'];
$pID = $_POST['prodID'];
$pQty = $_POST['qty'];

$xml = new DOMDocument();
$xml->load("product.xml");

$products = $xml->getElementsByTagName("product");

$consStatus = "Unpaid";
$response;

foreach ($products as $product) {
    $id = $product->getAttribute("productID");
    if ($id == $pID) {
        $name = $product->getElementsByTagName("name")->item(0)->nodeValue;
        $price = $product->getElementsByTagName("price")->item(0)->nodeValue;
        $img = $product->getElementsByTagName("imagePath")->item(0)->nodeValue;
        $stock = $product->getElementsByTagName("stock")->item(0)->nodeValue;
        if($pQty > $stock){
            $response = "invalid";
            break;
        } else {
            $product->getElementsByTagName("stock")->item(0)->nodeValue = $product->getElementsByTagName("stock")->item(0)->nodeValue - $pQty;
            $xml->save("product.xml");
        }
        
        saveCart($id, $user, $name, $price, $pQty, $img, $consStatus);
        $response = "valid";
        break;
    } else {
        $response = "Product not Available";
    }
}
echo $response;

function saveCart($id, $user, $name, $price, $pQty, $img, $consStatus){
    $xml = new DOMDocument();
    $xml->load("cart.xml");
    $carts = $xml->getElementsByTagName("cart");
    $flag = false;

    foreach($carts as $cart){
        $email = $cart->getElementsByTagName("owner")->item(0)->nodeValue;
        $prodname = $cart->getElementsByTagName("productName")->item(0)->nodeValue;
        $status = $cart->getElementsByTagName("status")->item(0)->nodeValue;

        if($user == $email && $prodname == $name && $status == "Unpaid"){
            $cart->getElementsByTagName("productQty")->item(0)->nodeValue = $cart->getElementsByTagName("productQty")->item(0)->nodeValue + $pQty;
            $xml->save("cart.xml");
            $flag = false;
            break;
        } else {
            $flag = true;
        }
    }
    if($flag){
        $newUser = $xml->createElement("cart");
        $newOwner = $xml->createElement("owner", $user);
        $newProduct = $xml->createElement("productName",$name);
        $newPrice = $xml->createElement("productPrice", $price);
        $newQty = $xml->createElement("productQty", $pQty);
        $newImg = $xml->createElement("productImage", $img);
        $newStatus = $xml->createElement("status",$consStatus);
        
        $newUser->setAttribute("productID",$id);
        $newUser->appendChild($newOwner);
        $newUser->appendChild($newProduct);
        $newUser->appendChild($newPrice);
        $newUser->appendChild($newQty);
        $newUser->appendChild($newImg);
        $newUser->appendChild($newStatus);
    
        $xml->getElementsByTagName("carts")->item(0)->appendChild($newUser);
        $xml->save("cart.xml");

    }
}
?>