<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABOUT</title>
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
              <li><a class="active" href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
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
    <div class="about">
      <img src="images/about.jpg">
      <h2>Our Story</h2>
      <p>
        THE ART BOX is an American e-commerce website focused on handmade or vintage items and craft supplies. These items fall under a wide range of categories, including jewelry, bags, clothing, home décor and furniture, toys, art, as well as craft supplies and tools. All vintage items must be at least 20 years old. The site follows in the tradition of open craft fairs, giving sellers personal storefronts where they list their goods for a fee of US$0.20 per item. As of December 31, 2018, THE ART BOX had over 60 million items in its marketplace, and the online marketplace for handmade and vintage goods connected 2.1 million sellers with 39.4 million buyers. At the end of 2018, THE ART BOX had 874 employees. In 2018, THE ART BOX had total sales, or Gross Merchandise Sales (GMS), of US$3.93 billion on the platform. 
      </p>
      <p>
        In 2018, THE ART BOX garnered a revenue of US$603.7 million and registered a net income of US$41.25 million. The platform generates revenue primarily from three streams: its Marketplace revenue includes a fee of 5% of final sale value, which an Etsy seller pays for each completed transaction, on top of a listing fee of 20 cents per item; Seller Services, THE ART BOX's fastest growing revenue stream, includes fees for services such as "Promoted Listings", payment processing, and purchases of shipping labels through the platform; while Other revenue includes fees received from third-party payment processors. 
      </p>
      <p>
        In November 2016, THE ART BOX disclosed that it paid US$32.5 million to purchase Blackbird Technologies, a startup that developed AI software used for shopping context/search applications. 
      </p>
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