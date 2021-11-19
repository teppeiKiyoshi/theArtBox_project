<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: login_register.php");
  }

  $xml = new DOMDocument();
  $xml->load("product.xml");
  $products = $xml->getElementsByTagName("product");

  $category = array();
  foreach($products as $product){
    $cat = $product->getElementsByTagName("category")->item(0)->nodeValue;
    if(!in_array($cat, $category)){
      array_push($category, $cat);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRODUCT</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js" integrity="sha512-9Dh726RTZVE1k5R1RNEzk1ex4AoRjxNMFKtZdcWaG2KUgjEmFYN3n17YLUrbHm47CRQB1mvVBHDFXrcnx/deDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="script.js"></script>
</head>
<body onload="getProduct();">
  <div class="container">
    <div class="navbar">
        <div class="logo">
          <a href="index.php"><img id="logo" src="images/logo.png"></a>
        </div>
            <input type="search" id="txt" name="txt" placeholder="Search">
          <nav>
            <ul id="MenuItems">
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a class="active" href="product.php">Product</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="wishlist.php">Wish List</a></li>
            </ul>
          </nav>
          <img id="cart" src="images/cart.png" width="30px" height="30px">
          <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <div class="small-container">
    <div class="row row-2">
      <div id="btnContainer">
        <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
        <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
      </div>
      <select id="prodCategory" onchange="getProduct(this.value);">
        <?php 
          $html = "<option value=\"All\">All</option>";
          foreach($category as $cat){
            $html.="<option value=\"$cat\">".ucfirst($cat)."</option>";
          }
          echo $html;
        ?>
      </select>
    </div>
    <div id="output"></div>
    <div class="page-cont" id="page-cont"></div>
    
    <script src="getProduct.js"></script>
    
  </div>

  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Download Our App</h3>
          <p>Available in Play Store and App Store</p>
          <div class="app-logo">
            <img src="images/play-store.png">
            <img src="images/app-store.png">
          </div>
        </div>
        <div class="footer-col-2">
          <img src="images/logo.png" alt="">
          <p>We take pride on conveying hard-to-discover crafts and materials since we realize that each individual’s needs contrast. Regardless of whether you’re experiencing issues looking over our vast determination of different stationery or you have a straightforward inquiry, our client benefit group is prepared and willing to help.</p>
        </div>
        <div class="footer-col-3">
          <h3>Useful Links</h3>
          <ul>
            <li>Coupons</li>
            <li>Blog Post</li>
            <li>Return Policy</li>
            <li>Join Affiliate</li>
          </ul>
        </div>
        <div class="footer-col-4">
          <h3>Follow Us</h3>
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>
            <li>Youtube</li>
          </ul>
        </div>
      </div>
      <hr>
      <p class="copyright">Copyright 2021</p>
    </div>
  </div>

  <script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
      }
      else {
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>

<script>
  // Get the elements with class="column"
  var elements = document.getElementsByClassName("column");
  
  // Declare a loop variable
  var i;
  
  // List View
  function listView() {
    for (i = 0; i < elements.length; i++) {
      elements[i].style.width = "100%";
    }
  }
  
  // Grid View
  function gridView() {
    for (i = 0; i < elements.length; i++) {
      elements[i].style.width = "50%";
    }
  }
  
  /* Optional: Add active class to the current button (highlight it) */
  var container = document.getElementById("btnContainer");
  var btns = container.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace("active", "");
      this.className += " active";
    });
  }
  </script>
  
</body>
</html>