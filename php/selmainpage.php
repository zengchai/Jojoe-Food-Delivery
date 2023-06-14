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
 ?>
 <form method="POST" action="validateUpdateMenu.php" enctype="multipart/form-data">
    <div>
        <input type="file" name="uploadfile" value="" />
    </div>
    <div>Menu Code: 
		<input type="text" name="menucode" value="">
    </div>
    <div>Menu Name: 
		<input type="text" name="menuname" value="">
    </div>
    <div>Menu Price: 
		<input type="text" name="menuprice" value="">
    </div>
    <div>Menu Description: 
		<input type="text" name="menudesc" value="">
    </div>
    <div>
        <button type="submit" name="upload">UPLOAD</button>
    </div>
 </form>

 <?php if (isset($_GET['sub'])):?>
	<p><?php echo $_GET['sub']; ?></p>
	<?php endif?>
</div>
<?php 
    $sql = "SELECT * FROM menu";
    $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { 
            
            echo "<p> $row[menu_code] </p>
            <p> $row[menu_name] </p>";?>

            <img src="../menuimages/<?=$row['menu_img']?>" width="20%" >
            
    <?php echo "<p> $row[menu_price] </p>
    <p> $row[menu_description] </p>
	<a href='delete_item.php?menucode=$row[menu_code]'>Delete</a>
	<a href='edit_item.php?menucode=$row[menu_code]'>Edit</a>";
    } } ?>

</body>
</html>