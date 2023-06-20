<?php
// Start up your PHP Session
session_start();

include("config.php");

if ($_SESSION["Login"] != "YES") {
	header("Location: guest_form.php");
}
?>
<html>
    <head>
        <title>Jojoe Food</title>
        <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
        <link rel="stylesheet" href="darren-css/mainPage.css">
    </head>

    <body>
        <div class='menu-container'>
            <div class='menu'>
                <div class="logo">
                  <img src="headerImage/IMG_4380 1.png" style="height: 50px; width: 50px; text-align: center">
                </div>  
                <div class="header1"> 
                  <div class="header"><a data-active="home" href="homepage.php">HOME</a></div> 
                  <div class="header"><a data-active="service" href="serviceSellerPage.html">SERVICE</a></div> 
                  <div class="header"><a data-active="order" href="orderhistorySeller.html">ORDER</a></div> 
                  <div class="header"><a data-active="about" href="about.html">ABOUT</a></div> 
                </div> 
                <div class="login">
                    <img src="headerImage/login (1) 1.png" style="text-align: center; padding: 10px 0;">
                    <button id="logoutButton" onclick="document.getElementById('id03').style.display='block'" style="background-color: white; width:auto; cursor: pointer">LOGOUT</button>
                    <div id="id03" class="modal">
            
                      <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                        
                        <div class = "logoutText">
                          <p>Are you sure you want to logout?</p>
                        </div>
                    
                        <div class="logoutContainer">
                            <div class="logoutButton">
                              <button type="button" id="logoutButton" onclick="location.href='login.php'">Logout</button>
                              <button type="button"	id="cancelButton" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
                          </div>
                        </div>
                    
                        <div class="logoutContainer" style="background-color:#f1f1f1"></div>
                    
                      </form>
                    </div>
                  </div>                  
            </div>
        </div>

        <div class="grid-container">
            <div class="one">
                <h1>JOJOE FOOD</h1><br><br>
                <p>is a food ordering and delivering</p>
                <p>platform inside UTM</p><br><br>
                <?php
                if($_SESSION['LEVEL']== 1)
                echo "<a class='btn signUpNow' href='servicespage.php'>EDIT NOW</a>";
                else{
                echo "<a class='btn signUpNow' href='servicespage.php'>ORDER NOW</a>";
                }?>
            </div>
            <div class="two">
                <img src="image/platefood.png" class="image1">
            </div>
            <div class="three">
                <img src="image/cendolbanner.png" class="image2">
            </div>
            <div class="four"></div>
            <div class="five">
                <br><br><br>
                <p>Good food within minutes</p>
                <p>Your favourite food delivery partner</p>
                <p>The food of your choice</p>
            </div>
            <div class="six"></div>
        </div>

        <div class="position">
            <a data-active="customer" href="#">Customer</a>
            /
            <a data-active="seller" href="serviceSellerPage.html">Seller</a>
        </div>

    </body>

</html>