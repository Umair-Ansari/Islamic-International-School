<?php
session_start();
require_once ('connect.php');
  if(isset($_POST['submit'])){
  			global $conn;
  			$subject_name = $_POST['subject_name'];
  			$subject_description = $_POST['subject_description'];
  			//$dt = new DateTime();
			//$dt->format('Y-m-d H:i:s');
		   	//$created_by = $_SESSION["admin_data"] ;
			$query = "INSERT INTO subject (subject_name,description) VALUE ('{$subject_name}','{$subject_description}')";
			echo $query;
					$result = mysqli_query($conn,$query);
						if($result){
							$a =  $_SESSION["ok"].'options-general.php?page=umair-login-register-option';
							$_SESSION["message"] = "Subject Added";
							header("Location: $a");
								}
							else
								{
									echo "error".mysql_error();
									
						}
			//header("Location: http://localhost/wordpress/");
  }
?>