<?php
session_start();

if(isset($_POST["username"])&&isset($_POST["userid"])&&isset($_POST["email"])&&isset($_POST["matric"])&&isset($_POST["phone"])&&isset($_POST["password"])){
// Q1: get all fieldnames using $_POST
 $userName = $_POST["username"];
 $userId = $_POST["userid"];
 $email = $_POST["email"];
 $matric = $_POST["matric"];
 $phone = $_POST["phone"];
 $password = $_POST["password"];

//Q2: call config.php to open connection to database before performing insert data
require_once('config.php');

//Q3: input all fieldnames into table myguests using INSERT INTO 
$sql = "INSERT INTO user(user_id,user_name,user_email,user_matricno,user_phonenumber,user_password,user_level) VALUES ('$userId','$userName','$email','$matric','$phone','$password',0)";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
    $_SESSION['USER'] = $userName;
    $_SESSION['ID'] = $userId;
    $_SESSION['LEVEL'] = 0;
    $_SESSION["Login"] = "YES";
    header("Location: ../homeSeller.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}}
?>
<html>
<head>
<title>Jojoe food ordering system sign up page</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style1.css" id="stylesheet">
<link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
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
            <form method="post" action="validatesignup.php">
                <p class="signup">SIGN UP</p>
                
                <p class="username">Username: <br>
                <input class="inputtype" type="text" name="username" size="30", placeholder="Create a username" maxlength="10"  ><br></p>
                <p class="userid">User ID: <br>
                  <input class="inputtype" type="text" name="userid" size="30", placeholder="Create a userid" maxlength="10"  ><br></p>
                <p class="emailaddress"> Email Address: <br>
                <input class="inputtype" type="text" name="email" size="30", placeholder="Enter your email address" maxlength="30"><br></p>
                <p class="matricno">Matric Number: <br>
                <input class="inputtype" type="text" name="matric" size="30", placeholder="Enter your matricno" maxlength="10"><br></p>
                <p class="phonenumber" >Phone Number: <br>
                <input class="inputtype" type="text" name="phone" size="30", placeholder="Enter your phone number" maxlength="15" onkeypress="return isNumberKey(event)"><br></p>
                <p class="password">Password: <br>
                <input class="inputtype" type="password" name="password" size="30", placeholder="Enter your password" maxlength="10"><br></p>
               
                <p class="button"><input class="inputtype" type="submit" name="signup" value="Sign Up"></p>
            </form>
            
        </div>
        <div class="rightcontainer">
            <img class="foodlogo" src="image/platefood.png">
            <h1>Jojoe Food</h1>
        </div>
    </div>
    
    <div class="position">
      <a data-active="customer" href="serviceCustomerPage.html">Customer</a>
      /
      <a data-active="seller" href="serviceSellerPage.html">Seller</a>
    </div>


</body>
</html>
