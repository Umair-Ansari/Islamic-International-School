<?php
session_start();
require_once ('connect.php');
	if(isset($_POST['register']))
	{
		global $conn;
		$street_add_1 = $_POST['street_add_1'];
		$street_add_2 = $_POST['street_add_2'];
		$city = $_POST['city'];
		$zip_code = $_POST['zip_code'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$login_id = $_SESSION["user"]; 
		$query_add_address = "INSERT INTO address (login_id,street_address_1,street_address_2,city,zip_code,state,country,created_date) VALUE ('{$login_id}','{$street_add_1}','{$street_add_2}','{$city}','{$zip_code}','{$state}','{$country}',NOW())";
		$result_add_address = mysqli_query($conn,$query_add_address);
		if($result_add_address)
			{
				global $conn;
				global $login_id;
				$query_get_address = "SELECT * FROM address WHERE login_id = '{$login_id}' LIMIT 1";
				$result_get_adrress = mysqli_query($conn,$query_get_address);
					if($row = mysqli_fetch_assoc($result_get_adrress))
					{
						$address_id = $row['address_id'];
						global $conn;
						global $login_id;
						$gender = $_POST['gender'];
						$first_name = $_POST['fname'];
						$middle_name = $_POST['mname'];
						$last_name = $_POST['lname'];
						$cell_no = $_POST['cell_number'];
						$email = $_POST['email'];
						$other_details = $_POST['other_details'];
						$query_add_parent = "INSERT INTO parent (login_id,address_id,gender,first_name,middle_name,last_name,cell_number,email,other_details,created_date) VALUE ('{$login_id}','{$address_id}','{$gender}','{$first_name}','{$middle_name}','{$last_name}','{$cell_no}','{$email}','{$other_details}',NOW())";
						$result_add_parent = mysqli_query($conn,$query_add_parent);
						if($result_add_parent)
							{
								unset($_SESSION["condition"]);
								$_SESSION['message']= "Register Sucessfull Login to Continue";
								$turn = $_SESSION['home'];
								header("Location: $turn");
							}
						else
							{
								echo "error".mysql_error();
								echo "<br>";
								$_SESSION['message']= "Error from inner";
								$turn = $_SESSION['home'];
								header("Location: $turn");
							}
					}
					else
					{

						echo "error in getting data from addres table".mysqli_error();
					}
				//unset($_SESSION["condition"]);
				//$_SESSION['message']= "Register Sucessfull Login to Continue";
				//$turn = $_SESSION['home'];
				//header("Location: $turn");
			}
			else
			{
				//echo "error in adding data in addres table".mysql_error();
				//echo "<br>";
				//global $query_add_address;
				$_SESSION['message']= "Error From addring address ";//$query_add_address;
				$turn = $_SESSION['home'];
				header("Location: $turn");
									
			}
	}
	else 
	{
		$_SESSION['message']= "Error From Outer";
		$turn = $_SESSION['home'];
		header("Location: $turn");
	}
	
?>