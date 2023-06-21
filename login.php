<html>
<head>
<?php
session_start();

// If the user is not logged in send him/her to the login form
if(isset($_SESSION["Login"])){
if ($_SESSION["Login"] == "NO") {
    echo "hi";
}

unset($_SESSION["Login"]);}


?>

<html>
<head>
<title>Jojoe food ordering system login page</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
<link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
<link rel="stylesheet" type="text/css" href="ks-css/style2.css" id="stylesheet">
<script>
    function isNumberKey(event) {
      var charCode = (event.which) ? event.which : event.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
    </script>
</head>
<body> 
  <div class='menu-container'>
    <div class='menu'>
        <div class="logo">
          <img src="headerImage/IMG_4380 1.png" style="height: 50px; width: 50px; text-align: center">
        </div>  
        <div class="header1"> 
          <div class="header"><a data-active="home" href="mainPage.html">HOME</a></div> 
          <div class="header"><a data-active="service" href="#">SERVICE</a></div> 
          <div class="header"><a data-active="order" href="#">ORDER</a></div> 
          <div class="header"><a data-active="about" href="#">ABOUT</a></div> 
        </div> 
        <div class="login">
          <img src="headerImage/login (1) 1.png" style="text-align: center; padding: 10px 0;">
          <a href="#">LOGIN</a>
        </div>          
    </div>
  </div>

    <div class="container">
        <div class="leftcontainer">
            <form method="post" action="check_login.php">
                <div class="logina">LOGIN </div>
                <div class="userid">User ID: <br>
                <input class="inputtype" type="text" id="userid" name="username" size="30", placeholder="Create a userid" maxlength="10"><br></div>                               
                <div class="password">Password: <br>
                <input class="inputtype" type="password" id="password" name="password" size="30", placeholder="Enter your password" maxlength="10"></div>
               <div class="resetpwd"> <a href="#"onclick="ResetPwd()">Forgot password?<br></a></div>
               <div class="signup"> <a href="signup.php">Existing account??<br>SignupNow</a> </div> <!-- link to sign up page-->
                <input class="inputtype" type="submit" id="login" value="Login">
            </form>
            
        </div>
        <div class="rightcontainer">
            <img class="foodlogo" src="image/platefood.png">
            <h1>Jojoe Food</h1>
        </div>
    </div>
    
    <div class="position">
      <a data-active="customer" href="serviceCustomerPage.html">Customer</a>
      <a data-active="seller" href="serviceSellerPage.html">Seller</a>
    </div>


</body>
</html>