<?php 
session_start();

if(!isset($_SESSION['email'])){
  header("Location: login_register.php");
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>THEARTBOX</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js" integrity="sha512-9Dh726RTZVE1k5R1RNEzk1ex4AoRjxNMFKtZdcWaG2KUgjEmFYN3n17YLUrbHm47CRQB1mvVBHDFXrcnx/deDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="script.js"></script>
</head>
<body>

  <button class="tooltip" onclick="topFunction()" id="TOP">
    <i class="fa fa-chevron-up"></i>
    <span class="tooltiptext">Back to Top</span>
  </button>

  <div class="header">
    <div class="container">
      <div class="navbar">
          <div class="logo">
            <a href="index.php"><img id="logo" src="images/logo.png"></a>
          </div>
          <input type="search" id="txt" name="txt" placeholder="Search">
          <script src="getProduct.js"></script>
            <nav>
              <ul id="MenuItems">
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="account.php">Account</a></li>
                <li><a href="wishlist.php">Wish List</a></li>
              </ul>
            </nav>
            <img id="cart" src="images/cart.png" width="30px" height="30px" onclick="goToCart()">
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
      </div>
      <div class="row">
        <div class="col-2">
          <h1>Create your story.</h1>
          <p>pen paper pencil and a cup of tea</p>
        </div>
        <div class="col-2">
          <img src="images/center_image.jpg">
        </div>
      </div>
    </div>
  </div>
  
  <div class="categories">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <img src="images/Display1.jpg">
        </div>
        <div class="col-3">
          <img src="images/Display2.jpg">
        </div>
        <div class="col-3">
          <img src="images/Display3.jpg">
        </div>
      </div>
    </div>
  </div>

  <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
      <div class="col-4">
        <a href=""><img src="images/f1.jpg"></a>
        <h4>Long Life</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-half-o"></i>
        </div>
        <p>$99.99</p>
      </div>
      <div class="col-4">
        <a href=""><img src="images/f2.jpg"></a>
        <h4>Beautiful Mess</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
        </div>
        <p>$150.00</p>
      </div>
      <div class="col-4">
        <a href=""><img src="images/f3.jpg"></a>
        <h4>Cracked Open</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-half-o"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$119.99</p>
      </div>
      <div class="col-4">
        <a href=""><img src="images/f4.jpg"></a>
        <h4>Continuous Flow</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$49.99</p>
      </div>
    </div>
  </div>

  <div class="offer">
    <div class="small-container">
      <div class="row">
        <div class="col-2">
          <img src="images/Display4.jpg" class="offer-img">
        </div>
        <div class="col-2">
          <p>Exclusively Available on THE ART BOX</p>
          <h1>Crochet Multi-Color</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="testimonial">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>These are the best stickers! I highly recommend, they are so cute and high quality. Definitely my go-to sticker shop!</p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <img src="images/user-1.png">
          <h3>Gwen Silvers</h3>
        </div>
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>It came really early. Lovely selection of different width washi tapes- Love the neutral colour and images.</p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="images/user-2.png">
          <h3>Scott McCall</h3>
        </div>
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>These are the best stickers! I highly recommend, they are so cute and high quality. Definitely my go-to sticker shop!</p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <img src="images/user-3.png">
          <h3>Charlie Damion</h3>
        </div>
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
  <script src="getProduct.js"></script>
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

    //Get the button
    var mybutton = document.getElementById("TOP");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>

<div class="usercont" id="usercont">
</div>
<button id="user-btn" onclick="showUser();"><i class="fas fa-user-friends"></i></button>

<div class="chat-container" id="chat-container">
  <div class="chat-header" id="chat-header">
  </div>
  <div class="chat-body" id="chat-body">
  </div>
    <div class="chat-funcs" id="chat-funcs">
        <input type="text" class="chat-message" id="chat-message" placeholder="Send a message here..."/>
        <i class="far fa-paper-plane" id="send-chat" onclick="createMessage();"></i>
    </div>
</div>
</body>
</html>