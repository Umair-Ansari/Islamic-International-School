<?php
include('connect.php');
if(isset($_POST['name']))

{
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$name = trim($name);
	if($name == "")
	{
		echo "<span style='color:red;'>Insert A value</span>";
	}	
	else
	{
		
		$query=mysqli_query($conn,"select * from login where dispaly_name='$name'");
		$row=mysqli_num_rows($query);
		if($row==0)
		{
			echo "<span style='color:blue;'>Available</span>";
		}
		else
		{
			echo "<span style='color:red;'>Already exist</span>";
		}
	}
}
?>