<?php

	include 'home_header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		a {
			margin-bottom: 8px;
		}
	</style>
	<title>home</title>
</head>
<body>
	
		<h4>welcome to <?php echo $hospital_name ?> Health Care</h4>
		
			<ul>
				<ol><a href="add_patient.php">add patient</a></ol>
				<ol><a href="view_patient.php">view patient</a></ol>
				<ol><a href="add_diagnosis.php">add diagnosis</a></ol>
				<ol><a href="view_diagnosis.php">view diagnosis</a></ol>
				<ol><a href="logout.php">logout</a></ol>
			</ul>
</body>
</html>
		