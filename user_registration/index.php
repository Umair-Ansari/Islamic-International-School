<?php
/*
Plugin Name: User Registration
Plugin URI: http://www.crystallinesoft.net
Description: Beta
Version: beta 0.1
Author: Umair Ansari
Author http://www.crystallinesoft.net
*/ 
session_start();
//$_SESSION['home'] = plugins_url('',__FILE__ );
$_SESSION['home'] = get_site_url();
//$_SESSION["condition"] = "4";
//echo $_SESSION['home'] ;
//unset($_SESSION["condition"]);
$_SESSION["admin"] = get_admin_url();
//$_SESSION["admin_data"] = get_userdata(1);
//require_once("connect.php");
require_once (plugin_dir_path( __FILE__ ).'/includes/connect.php');
require_once (plugin_dir_path( __FILE__ ).'/includes/admin.php');
require_once (plugin_dir_path( __FILE__ ).'/includes/add_functions.php');
add_action( 'admin_menu', 'login_register' );
 
function login_register() {
    add_options_page( 'User Registration Options', 'User Registration', 'manage_options', 'user_registration_options', 'user_registration_option' );
}
 
function login_register_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
   // include __DIR__."/options.php";
    echo admin();
	echo $_SESSION["message"];
	$_SESSION["message"] = null; 
	$user_info  = get_userdata(1);
	$_SESSION["admin_data"] = $user_info->user_login;
      /*echo 'Username: ' . $user_info->user_login . "\n";
      echo 'User roles: ' . implode(', ', $user_info->roles) . "\n";
      echo 'User ID: ' . $user_info->ID . "\n"; 
      echo "<pre>";
      print_r(getdate());
      echo "</pre>";
      $dt = new DateTime();
		echo $dt->format('Y-m-d H:i:s');*/
		
		   


     //$plugin_url =  plugins_url('',__FILE__ );
		//$_SESSION["message"] = $plugin_url;


} 

$this_page = plugins_url('/includes/login.php',__FILE__ );
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#login_u").click(function(){
    $("#login_div").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#register").click(function(){
    $("#register_div").slideToggle("slow");
  });
});
</script>
 
<style> 
#login_div,#login_u,#register_div,#register
{
padding:5px;
}
#login_div,#register_div
{
padding:50px;
display:none;
position: fixed;
background: tomato;
top:0px;
right:1px;
border: 1px solid tomato;
}
</style>



<div id="login_div"> <form action='<?php echo $this_page;?>' method='post'>
   <input type='text' required placeholder='username' name='name'/><br/><br/>
   <input type='password' required placeholder='password' name='password'><br/><br/>
   <input type='submit' value='LOGIN' name='submit'>
</form></div>
<div id="register_div">
	<?php echo $_SESSION["message"];
		$_SESSION["message"] = null;
		$this_page = plugins_url('\includes\register.php',__FILE__ ); ?>
		<center><form method='post' action='<?php echo $this_page; ?>'>
		<div id="disp"></div>
		<input type='text' required id="name" placeholder='username' name='username'>
		<br><br>
		<select name='type' style='width: 193px;' ><option>STUDENT</option><option>PARENT</option><option>TEACHER</option></select>
		<br><br>
		<input type='email' required placeholder='email' name='email'>
		<br><br>
		<input type='password' required placeholder='password' name='password'>
		<br><br>
		<input type='password' required placeholder='re-password' name='re_password'>
		<br><br>
		<input type='submit' name='submit' value='REGISTER'>
		</form>
		</center>
</div>
<?php
 
//function like_fb_plugin_options() {
    //if ( !current_user_can( 'manage_options' ) )  {
    //    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
   // }
   // include __DIR__."/options.php";
//} 
//$_SESSION["condition"] = "1";
//require_once("connect_db.php");
//$set=  $_POST['name'];
//add_shortcode('umair_login','umair_login_function');
//$a=1;
//function umair_login_function(){
//add_shortcode('umair_login',function(){
//	if(isset($_POST['submit'])){
//		add_shortcode('umair_login','login');
//			function login(){
//				return "login";
//				$a=0;
//				die();
//			}die();
//	}
	/*if(isset($_POST[$set])){
		$name = $_POST['name'];
		$pass = $_POST['password'];
	$query = "SELECT * FROM user WHERE name=$name AND password = $pass ";
	$result = mysqli_query($conn,$query);
	if(!$result){
		return "ErrOR";
	}
	while($row = mysqli_fetch_assoc($result)){
	$uname = $row['name'];
	$upassword = $row['password'];
		$table = "<table>";
		$table .= "<tr>";
		$table .= "<td>$uname</td>";
		$table .= "<td>$upassword</td>";
		$table .= "</tr>";
		$table .= "</table>";
			}
		} */
	//else{

	//	if($a==1){
		/*function msp_helloworld_admin_menu_setup(){
add_submenu_page(
 'options-general.php',
 'Helloworld Settings',
 'Helloworld',
 'manage_options',
 'msp_helloworld',
 'msp_helloworld_admin_page_screen'
 );
}
add_action('admin_menu', 'msp_helloworld_admin_menu_setup'); //menu setup

/*
function msp_helloworld_admin_page_screen() {
 global $submenu;
// access page settings 
 $page_data = array();
 foreach($submenu['options-general.php'] as $i => $menu_item) {
 if($submenu['options-general.php'][$i][2] == 'msp_helloworld')
 $page_data = $submenu['options-general.php'][$i];
 }

// output 
?>
<div class="wrap">
<?php screen_icon();?>
<h2><?php echo $page_data[3];?></h2>
<form id="msp_helloworld_options" action="options.php" method="post">
<?php
settings_fields('msp_helloworld_options');
do_settings_sections('msp_helloworld'); 
submit_button('Save options', 'primary', 'msp_helloworld_options_submit');
?>
 </form>
</div>
<?php
}

function msp_helloworld_settings_link($actions, $file) {
if(false !== strpos($file, 'msp-helloworld'))
 $actions['settings'] = '<a href="options-general.php?page=msp_helloworld">Settings</a>';
return $actions; 
}
add_filter('plugin_action_links', 'msp_helloworld_settings_link', 2, 2); */
//add_filter( 'wp_nav_menu',function($a){
//	$a ="home";
//	return $a;

//});
	//add_filter('wp_nav_menu_items',function($items) {
  //return $items .= "<li><a href='#'' id='flip'>LOGIN</a><li>";
	//});
	add_filter('wp_nav_menu_items',function($a){
		$this_page = plugins_url('/includes/login.php',__FILE__ );
		$home = $_SESSION['home'];
		if($_SESSION["type"] == "STUDENT"){
			
			$a = "<ul><li><a href='$home'>Home</a></li><li>Profile</li><li><a href='$this_page'>LOGOUT</a></li></ul>";
		}
		elseif($_SESSION["type"] == "TEACHER"){
			$a = "<ul><li><a href='$home'>Home</a></li><li>Result</li><li>Profile</li><li><a href='$this_page'>LOGOUT</a></li></ul>";
		}
		elseif($_SESSION["type"] == "PARENT"){
			$a = "<ul><li><a href='$home'>Home</a></li><li>Result</li><li>Profile</li><li><a href='$this_page'>LOGOUT</a></li></ul>";
		}
		else
		{
			$a .= "<li><a href='#'' id='login_u'>LOGIN</a><li>";
			$a .= "<li><a href='#'' id='register'>REGISTER</a><li>";
		}
		return $a;
	});

	add_filter('the_title',function($a){
		if($_SESSION["type"] == "STUDENT"){
			
			$a = "STUDENT";
		}
		elseif($_SESSION["type"] == "TEACHER"){
			$a = "TEACHER";
		}
		elseif($_SESSION["type"] == "PARENT"){
			$a = "PARENT";
		}

		return $a;
	});
		add_shortcode('umair_login',function(){
			//echo $_SESSION["condition"]; 
			/*if(!isset($_SESSION["condition"]))
				{
					//add_filter( 'the_title',function($ak){
   					 //return "something".$roe['name']."Umair";
   					 //return ucwords($ak);
					//});
					 //echo do_shortcode('[umair_login]'); 

					$this_page = plugins_url('\includes\login.php',__FILE__ );
					$link = plugins_url('\includes\reg.php',__FILE__ );
					$from = $_SESSION["message"]."<br>";
					$_SESSION["message"] = null;
					$from .=  "<form action='$this_page' method='post'>";
					$from .= "<input type='text' required placeholder='username' name='name'/><br/><br/>";
					$from .= "<input type='password' required placeholder='password' name='password'><br/><br/>";
					$from .= "<input type='submit' value='LOGIN' name='submit'>";
					$from .= "</form>"; 
					$from .= "<form action='$link' method='post'>";
					$from .= "<input type='submit' name='register' value='REGISTER'>";
					$from .= "</form>";
					$from .= "<div><a href='#'' id='flip'>link</a></div>";
					echo $from;


					//$from .= add_filter( 'the_title',ucwords);
   					 //return "something".$roe['name']."Umair";
   					 //return ucwords($ak);
					//});
					//apply_filters('my_new_filter','the_title');
					//add_filter('my_new_filter','my_new_filter_callback');

					//function my_new_filter_callback($shortcode){
    				
    				//return $shortcode."umair";
						//}
					//return "<div><a href='#' id='flip' >link</a></div>";
					
					//$a =add_filter( 'the_title',function($ak){
   					 //return "something".$roe['name']."Umair";
   					//echo "the titile";
					//});
					
					//return $a;
				}*/
			if($_SESSION["condition"] == "1")
				{	
					if($_SESSION["type"] == "STUDENT"){
						echo parent_status();
						echo class_status();
						
					}
					elseif($_SESSION["type"] == "TEACHER"){
						$a = "<a href='http://www.google.com'>fb</a>";
					}
					elseif($_SESSION["type"] == "PARENT"){
						$a = "<a href='http://www.google.com'>bnmmmmgoogle</a>";
						echo student_status();
					}
					$this_page = plugins_url('/includes/login.php',__FILE__ );
					$from = $_SESSION["message"];
					$from .= "<br>".$_SESSION["user"]."<br>";
					$_SESSION["message"] = null;
					$from .=  "<form action='$this_page' method='post'>";
					$from .= "<input type='submit' value='logout'>";
					$from .= "</form>";

					return $from;
				}
			/*elseif($_SESSION["condition"] == "2"){
					$from = $_SESSION["message"];
					$_SESSION["message"] = null;
					$this_page = plugins_url('\includes\register.php',__FILE__ );
					$from .= "<center>";
					$from .= "<form method='post' action='$this_page '>";
					$from .= "<input type='text' required placeholder='username' name='username'>";
					$from .= "<br><br>";
					$from .= "<select name='type' ><option>STUDENT</option><option>PARENT</option><option>TEACHER</option></select>";
					$from .= "<br><br>";
					$from .= "<input type='email' required placeholder='e.g someone@good.com' name='email'>";
					$from .= "<br><br>";
					$from .= "<input type='password' required placeholder='password' name='password'>";
					$from .= "<br><br>";
					$from .= "<input type='password' required placeholder='re-password' name='re_password'>";
					$from .= "<br><br>";
					$from .= "<input type='submit' name='submit' value='REGISTER'>";
					$from .= "</form>";
					$from .= "</center>";
					return 	$from;
				}*/
				elseif($_SESSION["condition"] == "3"){

					$from = $_SESSION["message"];
					$_SESSION["message"] = null;
					$this_page = plugins_url('/includes/student.php',__FILE__ );
					$from .= "<table border='0'>";
					$from .= "<tr><td>";
					$from .= "<form action='$this_page' method='post'>";
					$from .= "First Name";
					$from .= "</td>";
					$from .= "<td>";
					$from .= "<input type='text' required name='fname' style='margin-right : 10px;'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Middle Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='mname' style='margin-right : 10px;'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Last Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='lname'style='margin-right : 10px;'  >";
					$from .= "</td></tr><tr><td>";
					$from .= "Gender";
					$from .= "</td><td>";
					$from .= "<select name='gender' style='width: 193px; margin-right : 10px;'><option>Male</option><option>Female</option></select>";
					$from .= "</td></tr><tr><td>";
					$from .= "Date of Birth";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='dob' style='margin-right : 10px;' >";
					$from .= "</td></tr><tr><td>";
					$from .= "Cell Number";
					$from .= "</td><td>";
					$from .= "<input type='number' style='width: 193px; margin-right : 10px;' name='cellnumber' required >";
					$from .= "</td></tr><tr><td>";
					$from .= "Email";
					$from .= "</td><td>";
					$from .= "<input type='email' style='width: 193px; margin-right : 10px;' name='email' required >";
					$from .= "</td></tr><tr><td>";
					$from .= "Home Phone";
					$from .= "</td><td>";
					$from .= "<input type='number' required  name='home_phone' style='width: 193px; margin-right : 10px;'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Grade";
					$from .= "</td><td>";
					$from .= "<select name='grade' style='width: 193px; margin-right : 10px;'><option>no grade</option><option>1st</option></select>";
					$from .= "</td></tr><tr><td>";
					$from .= "School Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='school_name'  value='Mannar Publick School'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 1 Name";
					$from .= "</td><td>";
					$from .= "<input type='text'  required name='emergency_contact1_name'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 1 Relation";
					$from .= "</td><td>";
					$from .= "<select name='emergency_contact1_rel' style='width: 193px; margin-right : 10px;'><option>Mother</option><option>Father</option></select>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 1 Number";
					$from .= "</td><td>";
					$from .= "<input type='number' style='width: 193px; margin-right : 10px;' name='emergency_contact1_number' required >";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 2 Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='emergency_contact2_name'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 2 Relation";
					$from .= "</td><td>";
					$from .= "<select name='emergency_contact2_rel' style='width: 193px; margin-right : 10px;'><option>Mother</option><option>Father</option></select>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emergency Contact 2 Number";
					$from .= "</td><td>";
					$from .= "<input type='number' style='width: 193px; margin-right : 10px;' name='emergency_contact2_number' required >";
					$from .= "</td></tr><tr><td>";
					$from .= "Physician Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='physician_name'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Physician Phone";
					$from .= "</td><td>";
					$from .= "<input type='number' required name='physician_phone'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Healthcare Insurance Provider";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='healthcare_insurance_provider'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Preferred Hospital";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='preferred_hospita'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Medical Condition Comments";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='medical_condition_comments'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Dietry Restriction Comments";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='dietry_restriction_comments'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Requires Special Services";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='requires_special_services'>";
					$from .= "</td></tr><tr><td colspan='2' >";
					$from .= "<center><input type='submit' value='Register' name='register'></center>";
					$from .= "</form>";
					$from .= "</td></tr></table>";
					return 	$from;
				}
				elseif($_SESSION["condition"] == "4"){
					$from = $_SESSION["message"];
					$_SESSION["message"] = null;
					$this_page = plugins_url('/includes/parent.php',__FILE__ );
					$from .= "<table border='0'>";
					$from .= "<tr><td>";
					$from .= "<form action='$this_page' method='post'>";
					$from .= "First Name";
					$from .= "</td>";
					$from .= "<td>";
					$from .= "<input type='text' required name='fname' style='margin-right : 10px;'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Middle Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='mname' style='margin-right : 10px;'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Last Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='lname'style='margin-right : 10px;'  >";
					$from .= "</td></tr><tr><td>";
					$from .= "Gender";
					$from .= "</td><td>";
					$from .= "<select name='gender'><option>Male</option><option>Female</option></select>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Cell Number";
					$from .= "</td><td>";
					$from .= "<input type='number' required name='cell_number'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Email";
					$from .= "</td><td>";
					$from .= "<input type='email' required name='email'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Street Address 1";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='street_add_1'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Street Address 2";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='street_add_2'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "City";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='city'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Zip Code";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='zip_code'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "State";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='state'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Country";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='country'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Other Details";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='other_details'>";
					$from .= "</td></tr><tr><td colspan='2' >";
					$from .= "<center><input type='submit' value='Register' name='register'></center>";
					$from .= "</form>";
					$from .= "</td></tr></table>";
					return 	$from;
				}
				elseif($_SESSION["condition"] == "5"){
					$from = $_SESSION["message"];
					$_SESSION["message"] = null;
					$this_page = plugins_url('/includes/teacher.php',__FILE__ );
					$from .= "<table border='0'>";
					$from .= "<tr><td>";
					$from .= "<form action='$this_page' method='post'>";
					$from .= "First Name";
					$from .= "</td>";
					$from .= "<td>";
					$from .= "<input type='text' required name='fname' style='margin-right : 10px;'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Middle Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='mname' style='margin-right : 10px;'>";
					$from .= "</td><t/r><tr><td>";
					$from .= "Last Name";
					$from .= "</td><td>";
					$from .= "<input type='text' required name='lname'style='margin-right : 10px;'  >";
					$from .= "</td></tr><tr><td>";
					$from .= "Cell Number";
					$from .= "</td><td>";
					$from .= "<input type='number' style='width: 193px;' required name='cell_number'>";
					$from .= "</td></tr><tr><td>";
					$from .= "Emial";
					$from .= "</td><td>";
					$from .=  "<input type='email' required name='email'>";
					$from .= "</td></tr><tr><td colspan='2' >";
					$from .= "<center><input type='submit' value='Register' name='register'></center>";
					$from .= "</form>";
					$from .= "</td></tr></table>";
					return 	$from;
				}
			

		});
	//}
	//}
?>