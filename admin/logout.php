
<?php
	session_start();
	include('../db/dbcon.php');

	unset($_SESSION['hospital_id']);
	unset($_SESSION['hospital_name']);
	header("location:hosp_login.php");
?>

