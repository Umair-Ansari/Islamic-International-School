<?php
	session_start();
	require_once("connect.php");

	if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			
		}
	else
		{	
			session_destroy();
			$turn = $_SESSION['home'];
			header("Location: $turn");
		}
	if (isset($_POST['password'])) 
		{
			$pass = $_POST['password'];
		}
	else
			{
				session_destroy();
				$turn = $_SESSION['home'];
				header("Location: $turn");
			}
	
	$query = "SELECT * FROM login WHERE dispaly_name='$name' AND login_pwd='$pass' LIMIT 1";
	$result = mysqli_query($conn,$query);
		if($row = mysqli_fetch_assoc($result)){
			$uname = $row['name'];
			$_SESSION["message"] = "Welcome ".$uname." !";
			$_SESSION["condition"] = "1";
			$_SESSION["user"] = $row['login_id'];
			$_SESSION['type'] = $row['type'];
			$turn = $_SESSION['home'];
			header("Location: $turn");
			}
		else
		{
			$_SESSION["message"] = "Username And Passwrod Missmatch";//.mysql_errno().mysql_error();
			
			$turn = $_SESSION['home'];
			header("Location: $turn");
		}
		
?>