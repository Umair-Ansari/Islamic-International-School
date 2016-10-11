<?php 
session_start();
require_once ('connect.php');
	function add_class(){
			$this_page = plugins_url('/includes/register.php',__FILE__ );
			$add_clss = "<form action='$this_page' method='post'>";
			$add_clss .= "<input type='text' required name='class_name'>";
			$add_clss .= "<br><br>";
			$add_clss .= "<textarea required name='class_description'></textarea>";
			$add_clss .= "<br><br>";
			$add_clss .= "<textarea name='class_other_details'></textarea>";
			$add_clss .= "<br><br>";
			$add_clss .= "<input type='submit' name='submit' value='ADD CLASS'>";
			$add_clss .= "</form>";
			//$add_clss = plugins_url('\admin.php',__FILE__ );
			return $add_clss;

		}
		function add_exam(){
			$this_page = plugins_url('/exam.php',__FILE__ );
			$add_exam = "<form action='$this_page' method='post'>";
			$add_exam .= "<input type='text' required name='exam_name'>";
			$add_exam .= "<br><br>";
			$add_exam .= "<input type='number' max='4' required name='total_markz'>";
			$add_exam .= "<br><br>";
			$add_exam .= "<textarea name='exam_description'></textarea>";
			$add_exam .= "<br><br>";
			$add_exam .= "<input type='submit' name='submit' value='ADD EXAM'>";
			$add_exam .= "</form>";
			//$add_clss = plugins_url('\admin.php',__FILE__ );
			return $add_exam;

		}
		function add_sub(){
			$this_page = plugins_url('/subject.php',__FILE__ );
			$add_exam = "<form action='$this_page' method='post'>";
			$add_exam .= "<br><br>";
			$add_exam .= "<input type='text' required name='subject_name'>";
			$add_exam .= "<br><br>";
			$add_exam .= "<textarea name='subject_description'></textarea>";
			$add_exam .= "<br><br>";
			$add_exam .= "<input type='submit' name='submit' value='ADD SUBJECT'>";
			$add_exam .= "</form>";
			//$add_clss = plugins_url('\admin.php',__FILE__ );
			return $add_exam;

		}
		function parent_status(){
			global $conn;
			$login_id = $_SESSION["user"];
			$query = "SELECT * FROM student WHERE login_id='$login_id' LIMIT 1";
			$result = mysqli_query($conn,$query);
			if($row = mysqli_fetch_assoc($result))
			{
					$student_id = $row['student_id'];
					$query = "SELECT * FROM parent_student WHERE student_id='$student_id' LIMIT 1";
					$result = mysqli_query($conn,$query);
					if($row = mysqli_fetch_assoc($result))
					{

						$result = "<center>Parent Found<center>";
						return $result;
					}
					else
					{
						$result = "<center>No Parent Found.Please ask your Parents or Gardians to verify you!!<center><br>";
						return $result;
					}
			}
			else
			{
				$result = "<center>ERROR DATABASE<center>";
				return $result;
			}

		}
		function class_status(){
			global $conn;
			$login_id = $_SESSION["user"]; 
			$query = "SELECT * FROM registration WHERE login_id='$login_id' LIMIT 1";
			$result = mysqli_query($conn,$query);
			if($row = mysqli_fetch_assoc($result))
			{
				$class_id = $row['class_id'];
				$registration_date = $row['registration_date'];
				$tution_paid_ind = $row['tution_paid_ind'];
				global $conn;
				$query = "SELECT * FROM class WHERE class_id='$class_id' LIMIT 1";
				$result = mysqli_query($conn,$query);
				if($row = mysqli_fetch_assoc($result))
				{
					//global $registration_date;
					//global $tution_paid_ind;
					$this_page = plugins_url('/drop_registration.php',__FILE__ );
					$return .= "<table border='0'>";
					$return .= "<tr><td>";
					$return .= "Class Name";
					$return .= "</td><td>";
					$return .= $row['class_name'];
					$return .= "</td><t/r><tr><td>";
					$return .= "Registration Date";
					$return .= "</td><td>";
					$return .= $registration_date;
					$return .= "</td><t/r><tr><td>";
					$return .= "Tution Fee paid";
					$return .= "</td><td>";
					$return .= $tution_paid_ind;
					$return .= "</td></tr><tr><td colspan='2' >";
					$return .= "<center><form method='post' action='$this_page'><input type='submit' value='CHANGE CLASS' name='register'></form></center>";
					$return .= "</td></tr></table>";
					return $return;
				}
				else
				{
					return "Error Establishing Database Connection";
				}
			}
			else
			{
				$this_page = plugins_url('/registration_class.php',__FILE__ );
				$return = "<center>Currently You Are Not Register In Any CLass Please Register Yourself<center>";
				$return .= "<br>";
				$return .= "<form action='$this_page' method='post'>";
				$return .= "<select required name='class_name'>";
				$return .= "<option></option>";
				global $conn;
				$query = "SELECT * FROM class";
				$result = mysqli_query($conn,$query);
				while($row = mysqli_fetch_assoc($result))
				{
					$return .= "<option>".$row['class_name']."</option>";
				}
				$return .= "</select>";
				$return .= "<input type='checkbox' required>";
				$return .= "<input type='submit' value='Register' name='register'>";
				$return .= "<Form>";
				return $return;
			}

		}
		function student_status()
		{
			global $conn;
			$login_id = $_SESSION["user"];
			$query = "SELECT * FROM parent WHERE login_id='$login_id' LIMIT 1";
			$result = mysqli_query($conn,$query);
			if($row = mysqli_fetch_assoc($result))
			{
					global $conn;
					$parent_id = $row['parent_id'];
					$query = "SELECT * FROM parent_student WHERE parent_id='$parent_id' LIMIT 1";
					$result = mysqli_query($conn,$query);
					if($row = mysqli_fetch_assoc($result))
					{

						$return = "<center>Student Found<center>";
						return $return;
					}
					else
					{
						if(isset($_SESSION['class_name']))
						{

							//global $conn;
							$class_name =  $_SESSION['class_name'];
							$query = "SELECT * FROM class WHERE class_name='$class_name' LIMIT 1";
							$result = mysqli_query($conn,$query);
							if($row = mysqli_fetch_assoc($result))
							{

								//global $conn;
								$this_page = plugins_url('/parent_student.php',__FILE__ );
								$return = "<table><form><tr><td>"; 
								$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='first name' name='first_name' disabled>";
								$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='middle name' name='middle_name' disabled>";
								$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='last name' name='last_name' disabled>";
								$return .= "</form>";
								$return .= "</tr></td><tr><td>";

								$class_id = $row['class_id'];
								$query = "SELECT * FROM registration WHERE class_id='$class_id'";
								$result = mysqli_query($conn,$query);
								while($row = mysqli_fetch_assoc($result))
								{
									//global $conn;
									$student_id = $row['student_id'];
									$query = "SELECT * FROM student WHERE student_id='$student_id' LIMIT 1";
									$result = mysqli_query($conn,$query);
									if($row = mysqli_fetch_assoc($result))
									{
										$id = $row['student_id']; 
										$fname = $row['first_name'];
										$mname = $row['middle_name']; 
										$lname = $row['last_name'];  
										$return .= "<form action='$this_page' method='post'>";
										$return .= "<input type='hidden' style='width:55px; margin-right:5px;' required value='$id' name='student_id'>"; 
										$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='$fname' name='first_name' disabled>";
										$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='$mname' name='middle_name' disabled>";
										$return .= "<input type='text' style='width:100px; margin-right:5px;' required value='$lname' name='last_name' disabled>";
										$return .= "<select required name='type'><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Other</option><select>";
										$return .= "<input type='submit' value='select' name='select'></form>";
										
									}
									else
									{
										$return = "Error";
									}
								
								}
								$return .= "</td></tr></table>";
							}
							else
							{
								$return = "Error";
							}
						}
						else
						{
							$this_page = plugins_url('/parent_selected_class.php',__FILE__ );
							$return ='Please Select Your Child Class';
							$return .="<form action='$this_page' method='post'>";
							$return .="<select required name='class_name'>";
							$return .='<option></option>';
							global $conn;
							$query = "SELECT * FROM class";
							$result = mysqli_query($conn,$query);
							while($row = mysqli_fetch_assoc($result))
							{
								$return .= "<option>".$row['class_name']."</option>";
							}
							$return .='</select>';
							$return .="<input type='submit' name='SELECT' value='SELECT'>";
							$return .='<form>';

						}

						return $return;
					}
			}
			else
			{
				$result = "<center>ERROR DATABASE<center>";
				$result .= $login_id;
				return $result;
			}
		}
		/*if(!isset($_POST['submit']))
		{
			$this_page = plugin_dir_path( __FILE__ ).'add_class.php';
			$add_clss = "<form action='$this_page' method='post'>";
			$add_clss .= "<input type='text' required name='class_name'>";
			$add_clss .= "<input type='submit' name='submit' value='ADD CLASS'>";
			$add_clss .= "</form>";
			return $add_clss;
		}
		elseif(isset($_POST['submit']) && !isset($_POST['name']))
		{
			$add_clss = "Name Is Missing";
			$add_clss .= "<form>";
			$add_clss .= "<input type='text' required name='class_name'>";
			$add_clss .= "<input type='submit' name='submit' value='ADD CLASS'>";
			$add_clss .= "</form>";
			return $add_clss;
		}
		else
		{
			$add_clss = "Operation Sucessfull";
			$add_clss .= "<form>";
			$add_clss .= "<input type='text' required name='class_name'>";
			$add_clss .= "<input type='submit' name='submit' value='ADD CLASS'>";
			$add_clss .= "</form>";
			return $add_clss;
		}
	}*/



	?>