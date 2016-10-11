<?php
session_start();
require_once ('connect.php');
	if(isset($_POST['register'])){
		global $conn;
		$first_name = $_POST['fname'];
		$middle_name = $_POST['mname'];
		$last_name = $_POST['lname'];
		$cell_no = $_POST['cellnumber'];
		$email = $_POST['email'];
		$login_id = $_SESSION["user"]; 
		$query = "INSERT INTO staff (login_id,first_name,middle_name,last_name,cell_number,email,created_date) VALUE ('{$login_id}','{$first_name}','{$middle_name}','{$last_name}','{$cell_no}','{$email}',NOW())";
		$result = mysqli_query($conn,$query);
			if($result){
				unset($_SESSION["condition"]);
				$_SESSION['message']= "Register Sucessfull Login to Continue";
				$turn = $_SESSION['home'];
				header("Location: $turn");
			}
			else
			{
				echo "error".mysql_error();
				echo "<br>";
				$_SESSION['message']= "Error";
				$turn = $_SESSION['home'];
				header("Location: $turn");
									
			}
	}
	else 
	{
		$_SESSION['message']= "Error";
		$turn = $_SESSION['home'];
		header("Location: $turn");
	}
?>