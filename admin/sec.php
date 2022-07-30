<?php

		include '../db/dbcon.php';
	
	function sec(){
		if (!isset($_SESSION['hospital_id']) && (!isset($_SESSION['hospital_name']))) {
					header("location:hosp_login.php");
		}
	}
?>
