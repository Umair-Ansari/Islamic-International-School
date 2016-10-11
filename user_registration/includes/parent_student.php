<?php
session_start();
require_once("connect.php");
$relation_type = $_POST['type'];
$parent_id = $_SESSION["user"];
$student_id = $_POST['student_id'];

global $conn;
$query = "INSERT INTO parent_student (parent_id,student_id,relation_type) VALUE ('{$parent_id}','{$student_id}','{$relation_type}')";
$result = mysqli_query($conn,$query);
if($result)
{
	$_SESSION['message']= "Child Selected";
	$turn = $_SESSION['home'];
	header("Location: $turn");
}
else
{
	$_SESSION['message']= "Error Database Connection";
		$turn = $_SESSION['home'];
		header("Location: $turn");
}
?>
