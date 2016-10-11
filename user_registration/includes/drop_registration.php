<?php
session_start();
require_once ('connect.php');
if(isset($_POST['register']))
{
	global $conn;
	$login_id = $_SESSION["user"]; 
	$query = "DELETE FROM registration WHERE login_id='$login_id' LIMIT 1";
	$result = mysqli_query($conn,$query);
	if($result)
	{
		$_SESSION['message']= "Operation sucessfull";
		$turn = $_SESSION['home'];
		header("Location: $turn");
	}
	else
	{
		$_SESSION['message']= "Error Database Connection";
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