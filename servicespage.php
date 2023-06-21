<?php

include("config.php");
if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];}

if (isset($_GET["menucode"])) {
      $menu_code = $_GET["menucode"];
      $sql = "SELECT * FROM menu WHERE menu_code = '$menu_code'";
      $res = mysqli_query($conn, $sql);
  
          if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) { 
              
                  $menu_code = $row["menu_code"];
                  $menu_name = $row["menu_name"];
                  $menu_price = $row["menu_price"];
                  $menu_description = $row["menu_description"]; 
      } } 
  }
?>

<html lang="en">   
<head>
   <title>Some Web Page</title>
   <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
   <link rel='stylesheet' href='yam-css/serviceSeller.css'/>
    <script>
      function display(){
        document.getElementById('id02').style.display='block';
      }
    </script>
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
    $sql = "SELECT * FROM menu";
    $res = mysqli_query($conn, $sql);
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
    <div><form>
      <input name='menucode' type='hidden' value='$row[menu_code]'/>
      <a class='edit allbutton' onclick=document.getElementById('id02').style.display='block' href='#'>Edit</a>
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
  <?php if (isset($_GET["menucode"])):?>

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
  <?php endif; ?>
</div></div> </div> 
  <?php endif;?>

  <?php if($_SESSION['LEVEL']==2):?>

    <?php 
    $sql = "SELECT * FROM menu";
    $res = mysqli_query($conn, $sql);
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
    <div><form>
      <input name='menucode' type='hidden' value='$row[menu_code]'/>
      <a class='edit allbutton' onclick=document.getElementById('id02').style.display='block' href='#'>Edit</a>
    </form></div>
	<a class='delete allbutton' href='operation.php?pass=$row[menu_code]'>Delete</a>
  </div></div>";
    } } ?>
  <?php endif;?>
<script type="text/javascript" src="yam-script/script.js"></script>

</body>
</html>