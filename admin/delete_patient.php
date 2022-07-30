<?php
	
		include '../db/dbcon.php';
		$patient = $_GET['id'];	
?>
<?php

		$query= mysqli_query($db, "DELETE FROM patient 
							WHERE patient_id ='".$patient."' ") 
		or die(mysqli_error($db));

		header("location:view_patient.php")
?>