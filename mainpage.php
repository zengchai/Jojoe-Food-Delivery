<!DOCTYPE html>
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
                  <div class="header"><a data-active="home" href="mainpage.php">HOME</a></div> 
                  <div class="header"><a data-active="service" href="#">SERVICE</a></div> 
                  <div class="header"><a data-active="order" href="#">ORDER</a></div> 
                  <div class="header"><a data-active="about" href="#">ABOUT</a></div> 
                </div> 
                <div class="login">
                  <img src="headerImage/login (1) 1.png" style="text-align: center; padding: 10px 0;">
                  <a href="login.php">LOGIN</a>
                </div>          
            </div>
        </div>

        <div class="outside">
            <div class="grid-container">
            <div class="oneTwo">
                    <div class="one">
                        <h1>JOJOE FOOD</h1><br><br>
                        <p>is a food ordering and delivering</p>
                        <p>platform inside UTM</p><br><br>
                        <button class="btn signUpNow" onclick="location.href='signup.php'">SIGN UP NOW</a></button>
                    </div>
                    <div class="two">
                        <img src="image/platefood.png" class="image1">
                    </div>
            </div>
                <div class="three">
                    <img src="image/cendolbanner.png" class="image2">
                </div>
                <div class="four">
                    <br><br><br>
                    <p>Good food within minutes</p>
                    <p>Your favourite food delivery partner</p>
                    <p>The food of your choice</p>
                </div>
            </div>
        </div>

        <div class="position">
            <a data-active="customer" href="serviceCustomerPage.html">Customer</a>
            /
            <a data-active="seller" href="serviceSellerPage.html">Seller</a>
        </div>

    </body>

</html>