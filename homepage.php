<?php
// Start up your PHP Session
session_start();

include("config.php");

if ($_SESSION["Login"] != "YES") {
	header("Location: login.php");
}
?>
<html>
    <head>
        <title>Jojoe Food</title>
        <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
        <link rel="stylesheet" href="darren-css/mainPage.css">
    </head>

    <body>
          <?php
          include("header.php");
          ?>

        <div class="outside">
          <div class="grid-container">
            <div class="oneTwo">
            <div class="one">
    <h1>JOJOE FOOD</h1><br><br>
    <p>is a food ordering and delivering</p>
    <p>platform inside UTM</p><br><br>
    
<?php
    if ($_SESSION['LEVEL'] == 1) {
        echo "<div id='visitor-count'>";
            // Check if the visitor count cookie exists
            if (isset($_COOKIE['visitor_count'])) {
                $count = $_COOKIE['visitor_count'];
                echo $count. " person visited your website today";
                echo nl2br("\n");
                echo nl2br("\n");
            } else {
                echo "No visitor yet ";
                echo nl2br("\n");
                echo nl2br("\n");
            }

        
            echo "</div>";
        echo "<a class='btn signUpNow' href='servicespage.php'>EDIT NOW</a>";
    } else {
        echo "<a class='btn signUpNow' href='servicespage.php'>ORDER NOW</a>";
    }
    ?>
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
    </body>

</html>