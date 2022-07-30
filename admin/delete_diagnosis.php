<?php
	
		include '../db/dbcon.php';
		$diagnosis = $_GET['id'];	
?>
<?php

		$query= mysqli_query($db, "DELETE FROM diagnosis 
							WHERE diagnosis_id ='".$diagnosis."' ") 
		or die(mysqli_error($db));

		header("location:view_diagnosis.php")
?>