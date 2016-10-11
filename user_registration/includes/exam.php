<?php
session_start();
require_once ('connect.php');
  if(isset($_POST['submit'])){
  			global $conn;
  			$exam_name = $_POST['exam_name'];
  			$total_markz = $_POST['total_markz'];
  			$other_details = $_POST['exam_description'];
  			//$dt = new DateTime();
			//$dt->format('Y-m-d H:i:s');
		   	$created_by = $_SESSION["admin_data"];
		   	unset($_SESSION["admin_data"]);
			$query = "INSERT INTO exam_type (exam_name,total_markz,description) VALUE ('{$exam_name}','{$total_markz}','{$other_details}')";
			echo $query;
					$result = mysqli_query($conn,$query);
						if($result){
							$a =  $_SESSION["ok"].'options-general.php?page=umair-login-register-option';
							$_SESSION["message"] = "Exam Added";
							header("Location: $a");
								}
							else
								{
									echo "error".mysql_error();
									
						}
			//header("Location: http://localhost/wordpress/");
  }
?>