<?php 
// Start up your PHP Session
session_start();

include('config.php');

// username and password sent from form login.php
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$sql="SELECT * FROM user WHERE user_id='$myusername' AND user_password='$mypassword'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) 
	{
		$user_name = $row["user_name"];
		$user_id = $row["user_id"];
		$user_level = $row["user_level"];
	}
}

// mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
		
$_SESSION["Login"] = "YES";
 
// Add user information to the session (global session variables)
$_SESSION['USER'] = $user_name;
$_SESSION['ID'] = $user_id;
$_SESSION['LEVEL'] = $user_level;

if ($_SESSION['LEVEL']==1){
    header("Location: selmainpage.php");
}
else if ($_SESSION['LEVEL']==0){
    header("Location: stumainpage.php");
}
else if ($_SESSION['LEVEL']==2){
	$sql = "SELECT * FROM user WHERE user_id = '{$_SESSION['ID']}'";
	$res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) { 
			$_SESSION['COUNTER']= $row['order_counter'];
		}
    header("Location: stumainpage.php");
}
}}

//if wrong username and password
else {

$_SESSION["Login"] = "NO";
header("Location: guest_form.php");

}

?>