<?php
session_start();
require_once ('connect.php');
  if(isset($_POST['class_name'])){
  			global $conn;
  			$class_name = $_POST['class_name'];
  			$description = $_POST['class_description'];
  			$other_details = $_POST['class_other_details'];
  			//$dt = new DateTime();
			//$dt->format('Y-m-d H:i:s');
		   	$created_by = $_SESSION["admin_data"];
		   	unset($_SESSION["admin_data"]);
			$query = "INSERT INTO class (class_name,description,other_details,created_date,created_by) VALUE ('{$class_name}','{$description}','{$other_details}',NOW(),'{$created_by}')";
			echo $query;
					$result = mysqli_query($conn,$query);
						if($result){
							$a =  $_SESSION["admin"].'options-general.php?page=umair-login-register-option';
							$_SESSION["message"] = "Class Added";
							header("Location: $a");
								}
							else
								{
									echo "error".mysql_error();
									
						}
			//header("Location: http://localhost/wordpress/");
  }
?>