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
 
</div>

    <?php 
    $sql = "SELECT * FROM menu";
    $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { 
            
            echo "<p> $row[menu_code] </p>
            <p> $row[menu_name] </p>";?>

            <img src="../menuimages/<?=$row['menu_img']?>">
            
    <?php echo "<p> $row[menu_price] </p>
    <p> $row[menu_description] </p>";
    } } 
    ?>
</body>
</html>