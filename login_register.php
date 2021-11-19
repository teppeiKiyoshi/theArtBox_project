<?php
  session_start();
  if(isset($_SESSION['email'])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN/REGISTER</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="cap()">
  <div class="container">
    <div class="navbar">
        <div class="logo">
          <a href=""><img id="logo" src="images/logo.png"></a>
        </div>
        <input type="text" id="txt" name="txt" placeholder="Search">
          <nav>
            <ul id="MenuItems">
              <li><a href="">About</a></li>
              <li><a href="">Contact</a></li>
              <li><a href="">Product</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="">Wish List</a></li>
            </ul>
          </nav>
          <img id="cart" src="images/cart.png" width="30px" height="30px">
          <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>

  <div id="loginForm" style="display:block;">

    <div class="account_form">
      <div class="box">
        <h2>LOG IN</h2>
  
        <p id="errorMessage"></p>
        
        <form method="POST" id="form_id" name="myform" onsubmit="verifyLogin(this.email_login.value,this.password_login.value); return false">
  
          <label for="email">Email :</label>
          <input type="email" name="email" id="email_login" required/>
  
          <label for="password">Password :</label>
          <input type="password" name="password" id="password_login" required/>
  
          <p id="signup">New to THEARTBOX? <a id="link" onclick="registerShow();">Sign Up</a></p>
          
          <input type="submit" value="Log in" id="login_button"/>

          <a href=""><p id="forgot" onclick="forgotShow();">Forgot Password?</p></a>
  
        </form>
      </div>
    </div>

  </div>

  <div id="registerForm" style="display:none;">
  <div class="account_form">
      <div class="box">
        <h2>CREATE AN ACCOUNT</h2>
  
        <p id="errorMessageRegister"></p>
  
        <form method="POST"  name="myform" onsubmit="confirmRegister(this.firstName.value,this.lastName.value,this.email_register.value,this.contact_register.value,this.address_register.value,this.password_register.value,this.confirm_password.value,this.capt.value,this.captInput.value); return false">
  
          <label for="fname">First Name:</label>
          <input type="text" name="fname" id="firstName" required>
  
          <label for="lname">Last Name:</label>
          <input type="text" name="lname" id="lastName" required>
  
          <label for="email">Email:</label>
          <input type="email" name="email" id="email_register" required>

          <label for="contact">Contact:</label>
          <input type="text" name="contact" id="contact_register" required>

          <label for="address">Address:</label>
          <input type="text" name="address" id="address_register" required>
  
          <label for="pword">Password:</label>
          <input type="password" name="pword" id="password_register" required>
  
          <label for="cpword">Confirm Password:</label>
          <input type="password" name="cpword" id="confirm_password" required> 

          <label id="captLabel">Enter Captcha:<i onclick="cap()" class="fa fa-refresh"></i></label>
          </br>

          <input name="data" onmousedown="return false" onselectstart="return false" type="text" class="form-control" readonly id="capt">
          </br>
          <input name="input" type="text" class="form-control" id="captInput">
  
          <p id="login">Already have an account? <a id="link" onclick="registerShow();">Log in</a></p>
  
          <input type="submit" value="Register" id="register_button"/>
  
        </form>
      </div>
    </div>
  </div>

  <div id="forgotForm" style="display:none;">
    <div class="account_form">
      <div class="box">
        <h2>FORGOT PASSWORD</h2>
  
        <p id="forgotError"></p>
        
        <form method="POST" id="form_forgot" name="myform" onsubmit="forgotPass(this.email_forgot.value,this.password_forgot.value); return false">
  
          <label for="email">Email :</label>
          <input type="email" name="email" id="email_forgot" required/>

          <label for="password">Password :</label>
          <input type="password" name="password" id="password_forgot" required/>
          
          <input type="submit" value="Submit" id="forgot_button"/>
  
        </form>
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

  <script type="text/javascript">
    function cap(){
    var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
                ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
                'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '!','@','#','$','%','^','&','*','+'];
    var a = alpha[Math.floor(Math.random()*71)];
    var b = alpha[Math.floor(Math.random()*71)];
    var c = alpha[Math.floor(Math.random()*71)];
    var d = alpha[Math.floor(Math.random()*71)];
    var e = alpha[Math.floor(Math.random()*71)];
    var f = alpha[Math.floor(Math.random()*71)];

      var final = a+b+c+d+e+f;
      document.getElementById("capt").value=final;
    }
  </script>
</body>
</html>