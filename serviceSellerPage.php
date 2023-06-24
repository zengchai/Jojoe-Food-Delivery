<!DOCTYPE html>
<html lang="en">

<head>
   <title>Some Web Page</title>
   <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
   <link rel='stylesheet' href='yam-css/serviceSeller.css'/>
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
        <h2><u>EDIT MENU</u></h2>
      </div>

      <div class="date">
        <div><img src="servicePageImage/calendar.png" style="height: 30px; width: 30px; margin-right: 10px"></div>
        <div><text style="font-size: 1.1rem;" id="currentDate">dd/mm/yyyy</text></div>
      </div>
    </div>

    <div class="grid-container2" id="grid-container2">

      <!--place to insert food-->
      <div class="food">
        <div class="thumb">
          <div class="image"><img src="servicePageImage/sweetSourChicken.png"></div>
        </div>
        <div class="details">
          <div class="foodID">A.</div>
          <div class="name">酸甜鸡丁</div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="price">RM3.00</div>
          <button type="button" class="edit allbutton">Edit</button>
          <button type="button" class="delete allbutton">Delete</button>
        </div>
      </div>

      <div class="food">
        <div class="thumb">
          <div class="image"><img src="servicePageImage/sweetSourChicken.png"></div>
        </div>
        <div class="details">
          <div class="foodID">A.</div>
          <div class="name">酸甜鸡丁</div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="price">RM3.00</div>
          <button type="button" class="edit allbutton">Edit</button>
          <button type="button" class="delete allbutton">Delete</button>
        </div>
      </div>
    
      <div class="food">
        <div class="thumb">
          <div class="image"><img src="servicePageImage/sweetSourChicken.png"></div>
        </div>
        <div class="details">
          <div class="foodID">A.</div>
          <div class="name">酸甜鸡丁</div>
          <div class="engName">Sweet & Sour Chicken</div>
          <div class="price">RM3.00</div>
          <a class="edit allbutton" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Edit</a>
          <button type="button" class="delete allbutton">Delete</button>
        </div>
      </div>

    </div>

  </div>

</div> 

<!--=========================================================================-->
<button id="plusButton" class="allbutton" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> + </button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h1>Add Item</h1>
    </div>

    <div class="input-container">
      <label for="foodCname"><b>Food's Image: </b></label>
      <input type="file" accept="image/jpeg, image/png, image/jpg"><br><br>

      <label for="foodID"><b>Food's ID</b></label>
      <input type="foodID" placeholder="" id="foodid" >

      <label for="foodCname"><b>Food's Chinese Name</b></label>
      <input type="foodCname" placeholder="" id="foodCName" >

      <label for="foodEngName"><b>Food's English Name</b></label>
      <input type="foodEngName" placeholder="" id="foodEngName" >
        
      <label for="foodPrice"><b>Food Price:</b></label>
      <input type="foodPrice" placeholder="" id="foodPrice" >

      <!--ltr need to change to submit-->
      <button type="button" class="allbutton" id="addButton">ADD</button>
      <!--<input type="button" id="addButton" value="ADD" >-->
      
    </div>

  </form>
</div>


<div id="id02" class="modal">
  <form class="modal-content animate" action="validateUpdateMenu.php" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h1>Edit Item</h1>
    </div>

    <div class="input-container">
      <label for="foodCname"><b>Food's Image: </b></label>
      <input type="file" name="uploadfile" accept="image/jpeg, image/png, image/jpg"><br><br>

      <label for="foodID"><b>Food's ID</b></label>
      <input type="foodID" name="menucode" placeholder="" id="foodid" >

      <label for="foodCname"><b>Food's Chinese Name</b></label>
      <input type="foodCname" name="menuname" placeholder="" id="foodCName" >

      <label for="foodEngName"><b>Food's English Name</b></label>
      <input type="foodEngName" name="menudesc" placeholder="" id="foodEngName" >
        
      <label for="foodPrice"><b>Food Price:</b></label>
      <input type="foodPrice" name="menuprice" placeholder="" id="foodPrice" >

      <!--ltr need to change to submit-->
      <button type="submit" name="upload" class="allbutton" id="addButton">EDIT</button>
      <!--<input type="button" id="addButton" value="ADD" >-->
      
    </div>
  </form></div>


<!--<input type="file" accept="image/jpeg, image/png, image/jpg"> -->

<!--<input type="button" id="addButton" value="+">-->


<div class="position">
  <div class = "cORs">
    <a data-active="customer" href="serviceCustomerPage.php">Customer</a>
    <a data-active="seller" href="serviceSellerPage.php">Seller</a>
  </div>
  <div class="visitor">
          <?php
        // Check if the visitor count cookie exists
        if (isset($_COOKIE['visitor_count'])) {
            $count = $_COOKIE['visitor_count'];
            echo nl2br("\n");
            echo "Visitor count: " . $count;
        } else {
            echo "No visitor count available.";
        }
        ?> 
  </div>
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
<script type="text/javascript" src="yam-script/serviceSellerScript.js"></script>


</body>
</html>