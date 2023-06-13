<?php
session_start();

// Q1: get all fieldnames using $_POST
 $userName = $_POST["username"];
 $userId = $_POST["userid"];
 $email = $_POST["email"];
 $matric = $_POST["matric"];
 $phone = $_POST["phone"];
 $password = $_POST["password"];

//Q2: call config.php to open connection to database before performing insert data
require_once('config.php');

//Q3: input all fieldnames into table myguests using INSERT INTO 
$sql = "INSERT INTO user(user_id,user_name,user_email,user_matricno,user_phonenumber,user_password,user_level) VALUES ('$userId','$userName','$email','$matric','$phone','$password',0)";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
    $_SESSION['USER'] = $userName;
    $_SESSION['ID'] = $userId;
    $_SESSION['LEVEL'] = 0;
    $_SESSION["Login"] = "YES";
    header("Location: stumainpage.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>