<!DOCTYPE html>
<html lang="en">

<?php
// Check if the visitor count cookie exists
if (!isset($_COOKIE['visitor_count'])) {
    // Create a new cookie with an initial count of 1
    $count = 1;
    setcookie('visitor_count', $count, time() + 86400); // Expires in 24 hours
} else {
    // Increment the visitor count by 1
    $count = $_COOKIE['visitor_count'] + 1;
    setcookie('visitor_count', $count, time() + 86400); // Expires in 24 hours
}
?>

<head>
   <title>Some Web Page</title>
   <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
   <link rel='stylesheet' href='yam-css/serviceCustomer.css'/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--windows size responsive-->
 </head>

<body id="service">

<div class='menu-container'>
    <div class='menu'>
      <div class ='left_menu'>
          <div class="logo">
            <img src="headerImage/image (1).png" style="height: 50px; width: 50px; text-align: center">
          </div>  
          <div class="header1"> 
            <div class="header"><a data-active="home" href="homeSeller.html">HOME</a></div> 
            <div class="header"><a data-active="service" href="serviceSellerPage.html">SERVICE</a></div> 
            <div class="header"><a data-active="order" href="orderhistorySeller.html">ORDER</a></div> 
          </div> 
      </div>
      <div class="login">
        <img src="headerImage/image.png" style="text-align: center; padding: 15px 0;">
        <button id="logoutButton" onclick="document.getElementById('id03').style.display='block'" style="color:white; background-color: black; width:auto; cursor: pointer">LOGOUT</button>
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
                  <button type="button" id="logoutButton" onclick="location.href='mainPage.html'">Logout</button>
                  <button type="button"	id="cancelButton" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
              </div>
            </div>
        
            <div class="logoutContainer" style="background-color:#f1f1f1"></div>
        
          </form>
        </div>
      </div>                 
  </div>
</div>

<div class="body-container">
  <div>
    <div class="grid-container">
      <div class="editMenu">
        <h2><u>MENU</u></h2>
      </div>

      <div class="date">
        <div><img src="servicePageImage/calendar.png" style="height: 30px; width: 30px; margin-right: 10px"></div>
        <div><text style="font-size: 1.1rem;" id="currentDate">dd/mm/yyyy</text></div>
      </div>

      <div class="cart">
        <span class="count">
          <div id="total-count">0</div>
        </span>
        <a data-active="cart" class="material-icons" href="cart.html"><img src="servicePageImage/shopping-cart.png" style="height: 40px; width: 40px; margin-right: 10px"></a></i>
      </div>

    </div>

      <div class="grid-container2" id="grid-container2">
        

        <!--place to insert food-->
        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="food">
          <div class="images">
            <img class="picturesize" src="servicePageImage/sweetSourChicken.png">
          </div>
        <div class="details">
          <div class="foodIDs"><p class="foodcode">A.</p><p>酸甜鸡丁</p></div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="lastrow">
            <div class="prices">RM30.00</div>
          <div class="num"><input type="number" name="quantity" class="quantity" value="0"/></div>
        </div>
            <div class="addfunction">
              <button type="button" class="addcart addToCart allbutton">Add to Cart</button>
            </div>
          </div>
        </div>
        
      </div>

  </div>
</div>  

<!--==============================================================-->

  
<div class="position">
  <a data-active="customer" href="serviceCustomerPage.php">Customer</a>
  <a data-active="seller" href="serviceSellerPage.php">Seller</a>
  
</div>


<script>
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();

  today = dd + '/' + mm + '/' + yyyy;
  document.getElementById('currentDate').innerHTML = today;
</script>

<script type="text/javascript" src="yam-script/script.js"></script>
<script type="text/javascript" src="yam-script/serviceCustomerScript.js"></script>

</body>
</html>