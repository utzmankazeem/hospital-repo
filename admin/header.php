<?php
	session_start();
	include('sec.php');
	include('../db/func.php');
	sec();
	$hospital_id = $_SESSION['hospital_id'];
	$hospital_name = $_SESSION['hospital_name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Repository</title>
</head>

		<h4><?php echo $hospital_name ?> Health Care</h4>
		<hr>
				
				<a href="home.php">home</a>
				<a href="add_patient.php">add patient</a>
				<a href="view_patient.php">view patient</a>
				<a href="add_diagnosis.php">add diagnosis</a>
				<a href="view_diagnosis.php">view diagnosis</a>
				<a href="logout.php">logout</a>
		<hr>