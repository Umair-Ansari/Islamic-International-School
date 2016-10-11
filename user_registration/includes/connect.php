<?php
define("DB_server", "localhost");
define("User", "welyt2bu_wp601");
define("Pass", "x5sS4vz1eP");
define("DB_name", "welyt2bu_wp601");
//$host = "localhost";
//$userName = "root";
//$password = "";
//$dbName = "CMS";
$conn = mysqli_connect(DB_server, User, Pass, DB_name);
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error(). "(".mysqli_connect_errno().")");
}?>