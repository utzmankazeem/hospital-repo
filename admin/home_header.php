<?php
	session_start();
	include('sec.php');
	include('../db/func.php');
	sec();
	$hospital_id = $_SESSION['hospital_id'];
	$hospital_name = $_SESSION['hospital_name'];
?>