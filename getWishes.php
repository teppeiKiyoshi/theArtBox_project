<?php
session_start();
$xml = new DOMDocument();
$xml->load("wishlist.xml");

$wishes = $xml->getElementsByTagName("wishlist");

echo "
    <div class='row' style=\"margin-top:20px;\"> 
    ";
foreach ($wishes as $wish) {
    $id = $wish->getAttribute("id");
    $name = $wish->getElementsByTagName("productName")->item(0)->nodeValue;
    $price = $wish->getElementsByTagName("productPrice")->item(0)->nodeValue;
    $filePath = $wish->getElementsByTagName("productImage")->item(0)->nodeValue;
  
    echo "
        <div class=\"column\" id=\"selectable\">
          <img src=$filePath id=\"prodImg\">
          <h3 id=\"prodName\">$name</h3>
          <h4 id=\"prodPrice\">$$price</h4>
          <h5>Quantity: <input id=\"qty-$id\" type=\"number\" value=\"1\" min=\"1\" max=\"10\"/></h5>
          <div>
            <button type=\"button\" id=\"del-btn\" onclick=\"deleteWish('$name');\">Delete</button>
            <input id=\"searchCartButton\" type=\"button\" value=\"Add to Cart\" onclick=\"addToCart('$id'); return false\">
          </div>
        </div>
        ";
  }
echo "
      </div>
    ";
?>