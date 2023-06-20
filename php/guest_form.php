<html>
<head>
<?php
session_start();

// If the user is not logged in send him/her to the login form
if(isset($_SESSION["Login"])){
if ($_SESSION["Login"] == "NO") {
    echo "hi";
}

unset($_SESSION["Login"]);}
?>
<title>Login</title>
</head>
<body>
<form method="post" action="check_login.php">
<p>Username: <input type="text" name="username" /></p>
<p>Password: <input type="password" name="password" /></p>
<p><input type="submit" value="Let me in" /></p>
<a href="signup.php">SignUp</a>
</form>
</body>
</html>