<?php
session_start();
require_once ('connect.php');
if(isset($_POST['register']))
{
	$class_name = $_POST['class_name'];
	global $conn;
	$query = "SELECT * FROM class WHERE class_name='$class_name' LIMIT 1";
	$result = mysqli_query($conn,$query);
	if($row = mysqli_fetch_assoc($result))
	{
		$class_id = $row['class_id'];
		global $conn;
		$login_id = $_SESSION["user"]; 
		$query = "SELECT * FROM student WHERE login_id='$login_id' LIMIT 1";
		$result = mysqli_query($conn,$query);
		if($row = mysqli_fetch_assoc($result))
		{
			$student_id = $row['student_id'];
			global $conn;
			global $class_id;
			global $login_id;
			$tution_paid_ind = 'NO';
			$query = "INSERT INTO registration (class_id,student_id,login_id,registration_date,tution_paid_ind) VALUE ('{$class_id}','{$student_id}','{$login_id}',NOW(),'{$tution_paid_ind}')";
			$result = mysqli_query($conn,$query);
			if($result)
			{

				$_SESSION['message']= "Register Sucessfull";
				$turn = $_SESSION['home'];
				header("Location: $turn");
			}
			else
			{
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
	}
	else
	{
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