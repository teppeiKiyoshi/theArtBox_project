<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONTACT</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <div class="container">
    <div class="navbar">
        <div class="logo">
          <a href="index.php"><img id="logo" src="images/logo.png"></a>
        </div>
        <input type="text" id="txt" name="txt" placeholder="Search">
          <nav>
            <ul id="MenuItems">
              <li><a href="about.php">About</a></li>
              <li><a class="active" href="contact.php">Contact</a></li>
              <li><a href="product.php">Product</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="wishlist.php">Wish List</a></li>
            </ul>
          </nav>
          <img id="cart" src="images/cart.png" width="30px" height="30px">
          <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <div class="small-container">
    <div class="row">
      <div class="col-2">
        <img src="images/Display5.jpg" class="offer-img">
      </div>
      <div class="col-2">
      <h3>Corporate Office</h3>
      <p>13000 E. Control Tower Rd. <br> Suite 216, Box L3 <br> Englewood, CO 80112</p>
      <br>
      <h3>Direct Contact</h3>
      <p>Phone: 720-974-7878 <br> Toll Free: 1-877-929-7878 <br> Email: project@theartbox.com</p>
      <br>
      <h3>Departments</h3>
      <p>customerservice@theartbox.com <br> sales@theartbox.com <br> disputes@theartbox.com <br> compliance@theartbox.com <br> careers@theartbox.com</p>
      </div>
    </div>
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