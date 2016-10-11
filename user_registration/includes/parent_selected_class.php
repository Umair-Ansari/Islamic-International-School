<?php
session_start();
$_SESSION['class_name'] = $_POST['class_name'];
$turn = $_SESSION['home'];
header("Location: $turn");
?>