<?php
    session_start();
    include("config.php");

    if ($_SESSION["Login"] != "YES") {
        header("Location: guest_form.php");
    }
    
    $menu_code = $_GET["menucode"];

    if (isset($_GET["menucode"])) {
        $menu_code = $_GET["menucode"];
    }

?>

<html>
<head>
<title>Document</title>
</head>
<body>
 
<div align="center">
	<h2>Edit item</h2>
<p>

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
    <form method="POST" action="validateEditMenu.php" enctype="multipart/form-data">
    <div>
        <input type="file" name="uploadfile" value="" />
    </div>
    <div>Menu Code: <?php echo $menu_code; ?>
		<input type="hidden" name="menucode" value="<?php echo $menu_code; ?>">
    </div>
    <div>Menu Name: 
		<input type="text" name="menuname" value="<?php echo $menu_name; ?>">
    </div>
    <div>Menu Price: 
		<input type="text" name="menuprice" value="<?php echo $menu_price; ?>">
    </div>
    <div>Menu Description: 
		<input type="text" name="menudesc" value="<?php echo $menu_description; ?>">
    </div>
    <div>
        <button type="submit" name="upload">Submit</button>
    </div>
 </form>
</body>
</html>