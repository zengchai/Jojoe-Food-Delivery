<?php
session_start();
include("config.php");
if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];}


if ($_SESSION['LEVEL']==2||$_SESSION['LEVEL']==0){
  if(isset($_SESSION["ADDTOCART"])){
    if($_SESSION["ADDTOCART"] == "NO")
        if (isset($_GET['sub'])){
            echo $_GET['sub'];
        }
    
    unset($_SESSION["ADDTOCART"]);
}

if(isset($_SESSION["PAID"])){
    if($_SESSION["PAID"] == "YES")
        if (isset($_GET['sub'])){
            echo $_GET['sub'];
        }
    
    unset($_SESSION["PAID"]);
    
}
if(!isset($_SESSION['COUNTER'])){
    $createOrder = "insert into orders (user_id) VALUES ('{$_SESSION['ID']}');";
    mysqli_query($conn,$createOrder);
    $findOrderID = "SELECT * FROM orders WHERE user_id = '{$_SESSION['ID']}'";
    $orderID = mysqli_query($conn,$findOrderID);
    if (mysqli_num_rows($orderID) > 0) {
    while($order_ID = mysqli_fetch_assoc($orderID)){
    $_SESSION['COUNTER'] = $order_ID['order_id'];
    }}
}
}
?>

<html lang="en">   
<head>
   <title>Some Web Page</title>
   <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
   <?php if($_SESSION['LEVEL']==1):?>
   <link rel='stylesheet' href='yam-css/serviceSeller.css'/>
   <link rel='stylesheet' href='yam-script/serviceSellerScript.js'/>
   <?php endif;?>
   <?php if($_SESSION['LEVEL']==2||$_SESSION['LEVEL']==0):?>
   <link rel='stylesheet' href='yam-css/serviceCustomer.css'/>
   <?php endif;?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--windows size responsive-->
 </head>

<body id="service">

<?php 
include("header.php");
?>

<?php if($_SESSION['LEVEL']==1):?>
<div class="body-container">
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
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sort = $_POST['sort'];
        $sql = "SELECT * FROM menu ORDER BY $sort";
        $res = mysqli_query($conn, $sql);
    }
    else{
        $sql = "SELECT * FROM menu ORDER BY menu_code";
        $res = mysqli_query($conn, $sql);
    }
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { 
            echo "
            <div class='food'>
            <div class='thumb'>";?>

            <img class="image" src="menuimages/<?=$row['menu_img']?>">
            
    <?php echo "</div><div class='details'>
    <div class='foodID'> $row[menu_code]   $row[menu_name]</div>
    <div class='engName'> $row[menu_description] </div>
    <div class='price'> RM$row[menu_price] </div>
    <div class='edit allbutton'>
    <form method='get' action='servicespage.php'>
      <input name='menucode' type='hidden' value='$row[menu_code]'/>
      <button type='submit' onclick='display();'class='edit allbutton'>Edit</button>
    </form></div>
	<a class='delete allbutton' href='operation.php?pass=$row[menu_code]'>Delete</a>
  </div></div>";
    } } ?>
    <?php
    if (isset($_GET['sub'])){
      echo $_GET['sub'];
        unset($_GET['sub']);}?>
<button id="plusButton" class="allbutton" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> + </button>

<div id="id01" class="modal">
  <form class="modal-content animate" action="validateUpdateMenu.php" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h1>Add Item</h1>
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
      <button type="submit" name="upload" class="allbutton" id="addButton">ADD</button>
      <!--<input type="button" id="addButton" value="ADD" >-->
      
    </div>

  </form></div>
  <?php if(isset($_GET['menucode'])):
    $menu_code = $_GET["menucode"];?>
    <div id="id02" class="modal2" >
  <form class="modal-content animate" action="operation.php" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span  onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h1>Edit Item</h1>
    </div>
    <?php 
    $sql = "SELECT * FROM menu WHERE menu_code = '$menu_code'";
    $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { 
            
                $menu_code = $row["menu_code"];
                $menu_name = $row["menu_name"];
                $menu_price = $row["menu_price"];
                $menu_description = $row["menu_description"]; 
    } } 
    ?>
    <div class="input-container">
      <label for="foodCname"><b>Food's Image: </b></label>
      <input type="file" name="uploadfile" accept="image/jpeg, image/png, image/jpg"><br><br>

      <label for="foodID"><b>Food's ID <?php echo $menu_code; ?></b></label>
      <input type="foodID" name="menucode" value="<?php echo $menu_code; ?>" type="hidden" id="foodID" >

      <label for="foodCname"><b>Food's Chinese Name</b></label>
      <input type="foodCname" name="menuname" value="<?php echo $menu_name; ?>" id="foodCName" >

      <label for="foodEngName"><b>Food's English Name</b></label>
      <input type="foodEngName" name="menudesc" value="<?php echo $menu_description; ?>" id="foodEngName" >
        
      <label for="foodPrice"><b>Food Price:</b></label>
      <input type="foodPrice" name="menuprice" value="<?php echo $menu_price; ?>" id="foodPrice" >

      <!--ltr need to change to submit-->
      <button type="submit" name="upload" class="allbutton" id="addButton">Edit</button>
      <!--<input type="button" id="addButton" value="ADD" >-->
      
    </div>

  </form></div>
  <?php endif;?>
</div></div> </div> 
  <?php endif;?>

  <?php if($_SESSION['LEVEL']==2||$_SESSION['LEVEL']==0):?>
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
        <a data-active="cart" class="material-icons" href="cart.php"><img src="servicePageImage/shopping-cart.png" style="height: 40px; width: 40px; margin-right: 10px"></a></i>
      </div>

    </div>

      <div class="grid-container2" id="grid-container2">
        
        <!--place to insert food-->
        <?php 
    $sql = "SELECT * FROM menu";
    $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { 
            
            echo "
            <form method='post' action='updateOrder.php'>
            <div class='food'>
            <div class='images'>";?>

            <img class="picturesize" src="menuimages/<?=$row['menu_img']?>">
            
        <?php echo "</div><div class='details'>
        <div class='foodIDs'>
        <p class='foodcode'>$row[menu_code]</p>
        <p>$row[menu_name]</p></div>
        <div class='engName'> $row[menu_description] </div>
        <div class='lastrow'><div class='price'> RM $row[menu_price] </div>
        <div class='num'>
        <input type='hidden' name='menu_code[]' value='{$row['menu_code']}'/>
        <input type='number' name='quantity' class='quantity' value='0' /></div></div>
        <div class='addfunction'>
        <button type='submit' class='addcart addToCart allbutton'>Add to Cart</button>
        </div>
      </div></div></form>";
        } } ?>
          
        </div>
      </div>


      
  </div> 
 
  <?php endif;?>
<script type="text/javascript" src="yam-script/script.js"></script>

</body>
</html>