<?php
session_start();

		$_SESSION["condition"] = "2";
		echo "";
		$a = $_SESSION['home']
		header("Location: $a");

	
?>