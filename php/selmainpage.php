<?php
// Start up your PHP Session
session_start();

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
    <div >
        <input type="file" name="uploadfile" value="" />
    </div>
	<input type="text" class="form-control" name="userid" value="">
	<input type="text" class="form-control" name="userid" value="">
	<input type="text" class="form-control" name="userid" value="">
    <div>
        <button type="submit" name="upload">UPLOAD</button>
    </div>
 </form>

 <?php if (isset($_GET['error'])):?>
	<p><?php echo $_GET['error']; ?></p>
	<?php endif?>
</div>

</body>
</html>