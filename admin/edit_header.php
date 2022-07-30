<?php
	session_start();
	include('sec.php');
	include('../db/func.php');
	sec();
	$hospital_id = $_SESSION['hospital_id'];
	$hospital_name = $_SESSION['hospital_name'];
	$diagnosis_id = $_GET['id'];
	$patient_id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Repository</title>
</head>