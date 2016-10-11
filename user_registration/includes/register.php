<?php 
session_start();
require_once("connect.php");
			//echo plugins_url("/exam.php",__FILE__ );
	//echo $_POST['username'];
	
	//echo $_POST['email'];
	//echo $_POST['password'];
	//echo $_POST['re_password'];
	
		if($_POST['password'] != $_POST['re_password'] ){
			$_SESSION["message"] = "Password Missmatch";
			//$_SESSION["condition"] = '2';
			//$_POST["error"] = "Register";
			$turn = $_SESSION['home'];
			header("Location: $turn");
			
			//header("Location: http://localhost/wordpress/index.php");

		}
	else{
			//$_SESSION["message"] = "Password Match";
			//$turn = $_SESSION['home'];
			//header("Location: $turn");
			
 
			global $conn;
  			$username = $_POST['username'];
  			$type = $_POST['type'];
  			$email = $_POST['email'];
  			$password = $_POST['password'];
  			//$dt = new DateTime();
			//$dt->format('Y-m-d H:i:s');
		   	//$created_by = $_SESSION["admin_data"] ;
			$query = "INSERT INTO login (email,login_pwd,dispaly_name,type) VALUE ('{$email}','{$password}','{$username}','{$type}')";
			echo $query;
					$result = mysqli_query($conn,$query);
						if($result)
						{
							//$_SESSION["message"] = $_POST['type'];
							global $conn;
  							$username = $_POST['username'];
							$query_in = "SELECT * FROM login WHERE dispaly_name='{$username}' LIMIT 1";
							$result_in = mysqli_query($conn,$query_in);
							if($row = mysqli_fetch_assoc($result_in))
							{
								if($_POST['type'] == "STUDENT")
								{
									$_SESSION["message"] = "Welcome {$_POST['username']}. Please Fill The Required Information";
									$_SESSION["condition"] = '3';
									$_SESSION["user"] = $row['login_id'];
									$turn = $_SESSION['home'];
									header("Location: $turn");	
								}
								if($_POST['type'] == "PARENT")
								{
										$_SESSION["message"] = "Welcome {$_POST['username']}. Please Fill The Required Information";
										$_SESSION["condition"] = '4';
										$_SESSION["user"] = $row['login_id'];
										$turn = $_SESSION['home'];
										header("Location: $turn");	
								}
								if($_POST['type'] == "TEACHER")
								{
										$_SESSION["message"] = "Welcome {$_POST['username']}. Please Fill The Required Information";
										$_SESSION["condition"] = '5';
										$_SESSION["user"] = $row['login_id'];
										$turn = $_SESSION['home'];
										header("Location: $turn");	
								}

							}
							else
							{
								echo "error ". mysqli_error();
							}									
						}
							else
								{
									echo "error".mysql_error();
									$turn = $_SESSION['home'];
									header("Location: $turn");
									
						}	
		}	
?>
