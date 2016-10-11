<?php
require_once (plugin_dir_path( __FILE__ ).'add_functions.php');
//require_once (plugin_dir_path( __FILE__ ).'add.php');
	function admin(){

					/*global $conn;
    				$query = "SELECT * FROM user WHERE name='umair' AND password='umair' LIMIT 1";
					$result = mysqli_query($conn,$query);
						if($row = mysqli_fetch_assoc($result)){
							//$uname = $row['name'];
							echo $row['name'];
							//$_SESSION["message"] = "Welcome ".$uname." !";
							//$_SESSION["condition"] = "1";
							//header("Location: http://localhost/wordpress/");
								}
							else
								{
									echo "error";
									//$_SESSION["message"] = "Username And Passwrod Missmatch";//.mysql_errno().mysql_error();
									//if(isset($_SESSION["condition"]))
								//	$_SESSION["condition"] = null;
									//header("Location: http://localhost/wordpress/");
						}
						*/
					$welcome_message = "<br>";
					$welcome_message .= "<center><h1>ADMIN PANNEL</h1>";
					$welcome_message .= "<br><br>";
					$welcome_message .= "<table>";
					$welcome_message .= "<tr>";
					$welcome_message .= "<td>";
					$welcome_message .= add_class();
					$welcome_message .= "<td>";
					$welcome_message .= add_exam();
					$welcome_message .= "</tr>";
					$welcome_message .= "<tr>";
					$welcome_message .= "<td>";
					$welcome_message .= add_sub();
					$welcome_message .= "<td>";
					//$welcome_message .= add_class();
					$welcome_message .= "</tr>";
					$welcome_message .= "</table>";
					$welcome_message .= "</center>";
					$from = $welcome_message;
		    		//$from .=  "<form action='wp-content/plugins/umair_login_register/login.php' method='post'>";
					//$from .= "<input type='text' required placeholder='username' name='name'/><br/><br/>";
					//$from .= "<input type='password' required placeholder='password' name='password'><br/><br/>";
					//$from .= "<input type='submit' value='LOGIN' name='submit'>";
					//$from .= "</form>"; 
					//$from .= "<form action='index.php' method='post'>";
					//$from .= "<input type='submit' name='register' value='REGISTER'>";
					//$from .= "</form>";
					return $from;

		}
?>
