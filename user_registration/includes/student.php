<?php
session_start();
require_once ('connect.php');

 

	 if(isset($_POST['fname'])){
  			global $conn;
  			$first_name = $_POST['fname'];
			$middle_name = $_POST['mname'];
			$last_name = $_POST['lname'];
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
			$cell_no = $_POST['cellnumber'];
			$home_phoe = $_POST['home_phone'];
			$email = $_POST['email'];
			$current_grade = $_POST['grade'];
			$school_name = $_POST['school_name'];
			$emergency_cont1_name = $_POST['emergency_contact1_name'];
			$emergency_cont1_rel = $_POST['emergency_contact1_rel'];
			$emergency_cont1_phone = $_POST['emergency_contact1_number'];
			$emergency_cont2_name = $_POST['emergency_contact2_name'];
			$emergency_cont2_rel = $_POST['emergency_contact2_rel'];
			$emergency_cont2_phone = $_POST['emergency_contact2_number'];
			$physician_name = $_POST['physician_name'];
			$physician_phone = $_POST['physician_phone'];
			$health_care_insurance_provider = $_POST['healthcare_insurance_provider'];
			$preferred_hospital = $_POST['preferred_hospita'];
			$medical_condition_comments = $_POST['medical_condition_comments'];
			$dietry_restriction_comments = $_POST['dietry_restriction_comments'];
			$requires_special_services = $_POST['requires_special_services'];
			$login_id = $_SESSION["user"]; 
			$query = "INSERT INTO student (login_id,first_name,middle_name,last_name,gender,dob,cell_no,home_phoe,email,current_grade,school_name,emergency_cont1_name,emergency_cont1_rel,emergency_cont1_phone,emergency_cont2_name,emergency_cont2_rel,emergency_cont2_phone,physician_name,physician_phone,health_care_insurance_provider,preferred_hospital,medical_condition_comments,dietry_restriction_comments,requires_special_services,created_date) VALUE ('{$login_id}','{$first_name}','{$middle_name}','{$last_name}','{$gender}','{$dob}','{$cell_no}','{$home_phoe}','{$email}','{$current_grade}','{$school_name}','{$emergency_cont1_name}','{$emergency_cont1_rel}','{$emergency_cont1_phone}','{$emergency_cont2_name}','{$emergency_cont2_rel}','{$emergency_cont2_phone}','{$physician_name}','{$physician_phone}','{$health_care_insurance_provider}','{$preferred_hospital}','{$medical_condition_comments}','{$dietry_restriction_comments}','{$requires_special_services}',NOW())";
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
		else{
			$_SESSION['message']= "Error";
			$turn = $_SESSION['home'];
			header("Location: $turn");
		}
?>