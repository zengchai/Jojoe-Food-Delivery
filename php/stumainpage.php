<?php
// Start up your PHP Session
session_start();

include("config.php");

if ($_SESSION["Login"] != "YES") {
    header("Location: guest_form.php");
}


// // Store the value in a file
// $file = 'counter.txt';
// file_put_contents($file, $_SESSION['counter']);

// // Access the value from the file
// $counter = file_get_contents($file);

// echo $counter;
?>
<html>
<head>
   
<title>Document</title>
</head>
<body>
 
<div align="center">
	<h2>All Logged In User Can View This Page</h2>
<p>
	
 <?php
 echo '<p>Welcome, '.$_SESSION['USER']; 
 echo '<p>You are user level '.$_SESSION['LEVEL'];
 echo "<p><a href='document_level.php'>Click here if you are user level 1</a></p>";
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
 ?>
 
</div><form method="post" action="stumainpage.php">
<select name="sort" id="sort">
    <option value="menu_code"
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        if($_POST['sort']=="menu_code"):?>
    selected
<?php endif; endif
        ?>>none</option>
    <option value="menu_name" 
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        if($_POST['sort']=="menu_name"):?>
    selected
<?php endif; endif
        ?>>Name</option>
    <option value="menu_price" 
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        if($_POST['sort']=="menu_price"):?>
    selected
<?php endif; endif
        ?>>Price</option>
  </select>
  <input type="submit" value="Sort">
</form>

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
            
            echo "<p> $row[menu_code] </p>
            <p> $row[menu_name] </p>";?>

            <img src="../menuimages/<?=$row['menu_img']?>">
            
    <?php echo "<p> $row[menu_price] </p>
    <p> $row[menu_description] </p>
    <form method='POST' action='updateOrder.php'>
<input type='hidden' name='menu_code[]' value='{$row['menu_code']}'/>
<input type='number' name='quantity[]' value='1' />
<button type='submit'> Submit </button></p>
</form>";
} } 
    ?>
<a href="stuorder.php">Order</a>
<a href="stuorderhistory.php">Order History</a>
    <a href="logout.php">Log out</a>
</body>
</html>