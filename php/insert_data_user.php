<HTML>
	<HEAD><TITLE>Insert User</TITLE></HEAD>
	<BODY>

	  <?php

		 require_once ("config.php");
		//input user set from code. suppose u need change to user input
	     $sql = "insert into user(user_id, user_password, user_level , user_name) values ('zengchai','pass1',1,'Tan Zeng Chai')";
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$sql = "insert into user(user_id, user_password, user_level , user_name) values ('user2','pass2',2,'Tan Zeng Chai')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	     mysqli_close($conn);
	   ?>

	<BR><BR>
	<B> Insertion was successful</B>
	<BR><BR>
	   

	</BODY>
	</HTML>
