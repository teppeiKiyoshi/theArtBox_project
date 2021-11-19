<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: login_register.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ACCOUNT</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="editUser()">
  <p><?php echo $_SESSION['email']; ?></p>

  <div class="container">
    <div class="navbar">
        <div class="logo">
          <a href="index.php"><img id="logo" src="images/logo.png"></a>
        </div>
        <input type="text" id="txt" name="txt" placeholder="Search">
          <nav>
            <ul id="MenuItems">
              <li><a href="about.php">About</a></li>
              <li><a href="">Contact</a></li>
              <li><a href="product.php">Product</a></li>
              <li><a class="active" href="account.php">Account</a></li>
              <li><a href="">Wish List</a></li>
            </ul>
          </nav>
          <img id="cart" src="images/cart.png" width="30px" height="30px">
          <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <div class="edit-disp" id="editAccountDisp">
  </div>

  <div class="edit-container" id="editMessage">
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
</body>
</html>