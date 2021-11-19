<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: login_register.php");
} 

$xml = new DOMDocument();
$xml->load("cart.xml");

$carts = $xml->getElementsByTagName("cart");

echo "<div class='row'>";
$totalQty = 0;
$grandTotal = 0;

foreach($carts as $cart){
    $owner = $cart->getElementsByTagName("owner")->item(0)->nodeValue;
    $status = $cart->getElementsByTagName("status")->item(0)->nodeValue;

    if($owner == $_SESSION['email'] && $status == "Unpaid"){
        $itemID = $cart->getAttribute("id");
        $itemName = $cart->getElementsByTagName("productName")->item(0)->nodeValue;
        $itemPrice = $cart->getElementsByTagName("productPrice")->item(0)->nodeValue;
        $itemQty = $cart->getElementsByTagName("productQty")->item(0)->nodeValue;
        $itemImg = $cart->getElementsByTagName("productImage")->item(0)->nodeValue;

        $itemSRP = floatval($itemPrice);
        $qty = floatval($itemQty);
        $totalPrice = $itemSRP * $qty;

        $totalQty = $totalQty + $qty;
        $grandTotal = $grandTotal + $totalPrice;

        echo "
            <div class=\"column\">
                <img src=$itemImg id=\"itemImg\">
                <h3 id=\"itemName\">$itemName</h3>
                <h4 id=\"itemPrice\">Price: $$itemPrice</h4>
                <h4 id=\"itemQty\">Quantity: $itemQty</h4>
                <h4 id=\"totalPrice\"> Total: $$totalPrice</h4>
                <button type=\"button\" id=\"del-btn\"onclick=\"deleteCartProd('$itemName');\">Delete</button>
            </div>";
    }
}

echo "
    </div> 
        <div class=\"total-cont\">
            <div class=\"cart-total\" id=\"cart-total\">
                <p>CART ITEMS:</p>
                <h4 id=\"total-price\"><b>Grand Total:</b> $$grandTotal</h4>
                <h4 id=\"total-qty\"><b>Overall Quantity:</b> $totalQty item/s</h4>
                <button type=\"button\" id=\"cout-btn\" onclick=\"buyNow();\">Checkout Now</button>
            </div>
        </div>
    ";

?>