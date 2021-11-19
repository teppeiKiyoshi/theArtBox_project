<?php
session_start();

$catValue="";
if(isset($_POST['category'])){
  $catValue = $_POST['category'];
} else {
  $catValue = "All";
}

$xml = new DOMDocument();
$xml->load("product.xml");

$products = $xml->getElementsByTagName("product");
$html = "<div class='row'>";

foreach ($products as $product) {
  $cat = $product->getElementsByTagName("category")->item(0)->nodeValue;
  $id = $product->getAttribute("productID");
  $name = $product->getElementsByTagName("name")->item(0)->nodeValue;
  $price = $product->getElementsByTagName("price")->item(0)->nodeValue;
  $filePath = $product->getElementsByTagName("imagePath")->item(0)->nodeValue;
  $recentStock = $product->getElementsByTagName("stock")->item(0)->nodeValue;
    if ($cat == $catValue) {
        displayAll($filePath, $name, $price, $id, $recentStock);
        checkWishlist($id);
    } else if ($catValue == "All") {
        displayAll($filePath, $name, $price, $id, $recentStock);
        checkWishlist($id);
    } else if (isset($_POST['search'])){
        $autoSearch = $_POST['search'];
        $pattern = "/".$autoSearch."/i";
      if (preg_match($pattern, $name)){
        displayAll($filePath, $name, $price, $id, $recentStock);
        checkWishlist($id);
      }
    }
  }

    function checkWishlist($id){
      $xml = new DOMDocument();
      $xml->load("wishlist.xml");
      $wishes = $xml->getElementsByTagName("wishlist");
      
      $username = $_SESSION['email'];
      foreach ($wishes as $wish) {
        $userID = $wish->getAttribute("id");
        $name = $wish->getElementsByTagName("owner")->item(0)->nodeValue;
        
        if ($userID == $id && $username == $name){
          echo "<script>
            $(\"#mywish-$id\").html(\"Remove from Wishlist\");
          </script>";
        }
    }
  }

  function displayAll($filePath, $name, $price, $id, $recentStock){
    global $html;
    $html.= "
        <div class=\"column\" id=\"selectable\">
          <img src=$filePath id=\"prodImg\">
          <h3 id=\"prodName\">$name</h3>
          <h4 id=\"prodPrice\">$$price</h4>
          <h5 style=\"width:100%;\">Quantity:<input id=\"qty-$id\" type=\"number\" value=\"1\" min=\"1\" max=\"10\"/></h5>
          <p style=\"font-size:13px;\"><b>Available Stock:</b> $recentStock</p>
            <div>
              <small style=\"cursor:pointer;\" id=\"mywish-$id\" class=\"mywish-id\" onclick=\"addToWish('$filePath', '$name', '$price', '$id'); return false\">Add to Wish List</small>
              <input id=\"searchCartButton\" type=\"button\" value=\"Add to Cart\" onclick=\"addToCart('$id'); return false\">
            </div>
        </div>
        ";
  }

  echo $html."</div>";
?>