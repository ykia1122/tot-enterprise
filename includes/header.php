<!DOCTYPE html>
<html>
<head>
  <script src="../js/script.js" type="text/javascript"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <?php
  ini_set('error_reporting', 0);
  ini_set('display_errors', 0);
    session_start();
 
      if(!isset($_COOKIE[$_SESSION["cookie_name"]])){
  ?>
    <div id=header-bar>
        <a href="./home.php"><img src="./images/tot.png" alt="logo"></a>
        <ul>
            <li><a href="./home.php">Home</a></li>
            <div class="profile-dropdown">
            <li><a href="./product.php" class="profile-dropbtn">Products</a>
            <div class="profile-dropdown-content">
              <a href="./product.php?cat=mouse">Mouse</a>
              <a href="./product.php?cat=keyboard">Keyboard</a>
              <a href="./product.php?cat=graphiccard">Graphic Card</a>
              <a href="./product.php?cat=ram">RAM</a>
              <a href="./product.php?cat=casing">Casing</a>
            </div>
            </li>
            </div>
        </ul>
      
        

        <div id="search-bar">
        <form action="" method="POST">        
          <input type="text" id="search" placeholder="search product">
          <button type="submit" id="searchbtn"><i class="fa fa-search"></i></button>
        </form>
        </div>

        <div id=upper-right-corner>
        
            <button id="signupbtn" onclick="openRegisterModal()">Sign Up</button>
            <button id="loginbtn" onclick="openLoginModal()">Log In</button>
        </div>

    </div>

    
    <?php 
    }
  
    else{ ?>
      <div id=header-bar>
        <a href="./home.php"><img src="./images/tot.png" alt="logo"></a>
        <ul>
            <li><a href="./home.php">Home</a></li>
            <div class="profile-dropdown">
            <li><a href="./product.php" class="profile-dropbtn">Products</a>
            <div class="profile-dropdown-content">
              <a href="./product.php?cat=mouse">Mouse</a>
              <a href="./product.php?cat=keyboard">Keyboard</a>
              <a href="./product.php?cat=graphiccard">Graphic Card</a>
              <a href="./product.php?cat=ram">RAM</a>
              <a href="./product.php?cat=casing">Casing</a>
            </div>
            </li>
            </div>
        </ul>
        
        <div id="search-bar">
        <form action="" method="POST">        
          <input type="text" id="search" placeholder="search product">
          <button type="submit" id="searchbtn"><i class="fa fa-search"></i></button>
        </form>
        </div>

        <div id=upper-right-corner>
            <a href="shoppingcart.php" id="cart" style='font-size:24px'>Cart <i class='fas fa-shopping-cart'></i></a>
            <a href="shoppingcart.php" id="cart-item"><?php echo count($_SESSION["cart_item"]); ?></a>
            <div class="dropdown">
            <button id="profile" class="dropbtn"><img src="./images/img_avatar2.png" alt="Avatar" class="profile_avatar"></button>
              <div class="dropdown-content">
              <a href="javascript:;" onclick="openProfileModal();">Edit Profile</a>
              <a href="includes/auth.php?action=logout">Logout</a>
            </div>
          </div>
        </div>
        
    </div>



    <?php
    }
    ?>


      <div id="login-modal" class="modal">  
        <!-- Modal Content -->
        <form class="modal-content animate" action="includes/auth.php? method="POST">
          <span onclick="closeLoginModal()" class="close" title="Close Modal">&times;</span>
          <div class="imgcontainer">
            <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
          </div>
          <input type="hidden" name="action" value="login">
          <div class="container">
            <label class="label1" for="uname"><b>Username</b></label> <label id="err1" style="color: red;display:none;padding-left:15px;"> <b>*<?php if(isset($_SESSION["loginerr"])){ ?><script>document.getElementById('err1').style.display='inline'; </script><?php echo $_SESSION["loginerr"];} ?></b> </label>
            <input type="text" placeholder="Enter Username" name="uname" required>
      
            <label class="label1" for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
      
            <button class="submitbtn" type="submit">Login</button>
            <label>
              <input type="checkbox" name="remember">Remember me
            </label>
            <br/>
            <label class="signuphere">Didn't have an account? <button onclick="closeLoginModal();openRegisterModal();">Sign Up Here</button></label>
          </div>
      
          <div class="container" style="background-color:#f1f1f1;position:absolute; bottom:0px;margin:0;width: 100%;height: 90px;">
            <button type="button" onclick="closeLoginModal();" class="cancelbtn">Cancel</button>
            <span class="psw"> <a href="#">Forgot password?</a></span>
          </div>
        </form>
      </div>
      
      
      
      <div id="signup-modal" class="modal">
        <form class="modal-content animate" action="includes/auth.php? method="POST">
          <span onclick="closeRegisterModal()" class="close" title="Close Modal">&times;</span>
          <div class="imgcontainer">
            <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
          </div>
          <input type="hidden" name="action" value="register">
          <div class="container">
            <label class="label1" for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter your email address" name="email" required>
      
            <label class="label1" for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
      
            <label class="label1" for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
      
            <button class="submitbtn" type="submit">Sign Up</button>
          </div>
      
          <div class="container" style="background-color:#f1f1f1;position:absolute; bottom:0px;margin:0;width: 100%;height: 90px;">
            <button type="button" onclick="closeRegisterModal()" class="cancelbtn">Cancel</button>
            <button type="button" onclick="closeRegisterModal();openLoginModal();" class="AlreadyhaveAnAcc">Already Have An Account? Click here</button>
          </div>
        </form>
      </div>
      </div>


      <div id="profile-modal" class="modal">
        <form class="modal-content animate" action="includes/update.php? method="POST">
          <span onclick="closeProfileModal()" class="close" title="Close Modal">&times;</span>
          <div class="imgcontainer">
            <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
          </div>
          <input type="hidden" name="action" value="updpfl">
          <div class="container">
            <label class="label" for="email"><b>Email</b></label>
            <input type="text" style="width:70%;display:inline-block;" name="chgemail" id="chgemail" value="<?php echo $_SESSION["userinfo"][2]?>" required disabled>
            <button type="button" class="btnemail" onclick="editEmail()">Edit</button>
      
            <label class="label" for="uname"><b>Username</b></label>
            <input type="text" style="width:70%;display:inline-block;" name="chguname" id="chguname" value="<?php echo $_SESSION["userinfo"][1]?>" required disabled>
            <button type="button" class="btnuname" onclick="editUname()">Edit</button>

            <button type="button" onclick="openPasswordModal()" class="chgpwdbtn">Change Password</button>
            
          </div>
      
          <div class="container" style="background-color:#f1f1f1;position:absolute; bottom:0px;margin:0;width: 100%;height: 90px;">
            <button type="button" onclick="closeProfileModal()" class="cancelbtn">Cancel</button>
            <button class="savebtn" type="submit">Save</button>
          </div>
        </form>
      </div>
      </div>
      
      <div id="password-modal" class="modal">
        <form class="modal-content animate" action="includes/update.php? method="POST">
          <span onclick="closePasswordModal()" class="close" title="Close Modal">&times;</span>
          <input type="hidden" name="action" value="chgpwd">
          <div class="container" style="margin-top: 20%;">
            <label class="label" for="oldpassword"><b>Old Password</b></label>
            <input type="password" name="oldpwd" id="oldpwd" placeholder="Enter old password" required>
      
            <label class="label" style="margin-top:8%" for="newpassword"><b>New Password</b></label>
            <input type="password" name="newpwd" id="newpwd" placeholder="Enter new password" required>
           
            <label class="label" style="margin-top:8%" for="confirmpassword"><b>Confirm New Password</b></label>
            <input type="password" name="confpwd" id="confpwd" placeholder="Confirm new password" required>
            
          </div>
      
          <div class="container" style="background-color:#f1f1f1;position:absolute; bottom:0px;margin:0;width: 100%;height: 90px;">
            <button type="button" onclick="closePasswordModal();openProfileModal()" class="cancelbtn">Cancel</button>
            <button class="savebtn" type="submit">Update Password</button>
          </div>
        </form>
      </div>
      </div>
</body>
</html>