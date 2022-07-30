<?php

	include 'home_header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	</style>
	<title>view patient</title>
</head>
	<h4>welcome to <?php echo $hospital_name ?> Health Care</h4>
		
				<a href="add_patient.php">add patient</a>
				<a href="view_patient.php">view patient</a>
				<a href="add_diagnosis.php">add diagnosis</a>
				<a href="view_diagnosis.php">view diagnosis</a>
				<a href="logout.php">logout</a>
		<hr>
			<h4>welcome to <?php echo $hospital_name ?> Patient Record</h4>
		<table border="1">
		<tr>	
			<th>Patient Name</th>
			<th>Age</th>
			<th>Mobile</th>
			<th>Sex</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
			
			<tr>
				<?php	$select = mysqli_query($db, "SELECT * FROM patient 
								WHERE hospital_id='".$hospital_id."'")or die(mysqli_error($db));
				 while ($r = mysqli_fetch_array($select)) { ?>
						
					<td><?php echo$r[1]." ".$r[2] ?></td>
					<td><?php echo$r[3] ?></td>
					<td><?php echo$r[4] ?></td>
					<td><?php echo$r[5] ?></td>
					<td><a href="edit_patient.php?id=<?php echo$r[0] ?>">Edit</a></td>
					<td><a href="delete_patient.php?id=<?php echo$r[0] ?>">Delete</a></td>
			</tr>
				<?php } ?>
		</table>

</body>
</html>