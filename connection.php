<?php 

$hostname= 'localhost:3306';
$username='root';
$password='Venkat@123';
$database='employees';
	$con = mysqli_connect($hostname,$username,$password);

	mysqli_select_db($con, $database);
    $mysqli = new mysqli($hostname,$username,$password,$database) or die($mysqli_error($mysqli));
?>