<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$db="login2";

$conn=mysqli_connect($servername,$dbusername,$dbpassword,$db);
if (!$conn) {
	die("Connection failed");
}