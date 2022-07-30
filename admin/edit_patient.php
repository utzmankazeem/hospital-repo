<?php
	
	include 'edit_header.php';
?>
		<h4>welcome to <?php echo $hospital_name ?> Health Care</h4>
		
				<a href="add_patient.php">add patient</a>
				<a href="view_patient.php">view patient</a>
				<a href="add_diagnosis.php">add diagnosis</a>
				<a href="view_diagnosis.php">view diagnosis</a>
				<a href="logout.php">logout</a>
		<hr>

		
		<h4><?php echo $hospital_name ?> - Patient Portal</h4>

		<?php

			$query = mysqli_query($db, "SELECT * FROM patient WHERE patient_id ='".$patient_id."' ") or die(mysqli_error($db));
					$r = mysqli_fetch_array($query);
						extract($r);
		?>
		<?php
				if (array_key_exists('add', $_POST)) {

						$fn = mysqli_real_escape_string($db, $_POST['fname']);
						$ln = mysqli_real_escape_string($db, $_POST['lname']);
						$age = mysqli_real_escape_string($db, $_POST['age']);
						$mob = mysqli_real_escape_string($db, $_POST['mobile']);
						$sex = mysqli_real_escape_string($db, $_POST['sex']);
						$pass = mysqli_real_escape_string($db, $_POST['pass']);

						$update = mysqli_query($db, "UPDATE patient SET  
																firstname =	'".$fn."',
																lastname =	'".$ln."',
																age =		'".$age."',
																mobile = 	'".$mob."',
																gender =	'".$sex."',
																password = 	'".$pass."'
													WHERE patient_id = '".$patient_id."'
													") or die(mysqli_error($db));
						$suc = "patient edited successfully";
						header("location:view_patient.php?suc=$suc");					
				}

				if (isset($_GET['suc'])) {
					echo "<i>".$_GET['suc']."</i>";
				}
		?>

		<form action=""	method="post">
			
			<p><?php create_edit('fname', "Firstname", "$firstname") ?></p>
			<p><?php create_edit('lname', "Lastname", "$lastname") ?></p>
			<p><?php create_edit('age', "DOB", "$age", "date") ?></p>
			<p><?php create_edit('mobile', "Mobile", "$mobile", "number") ?></p>
			<p>Gender: <?php create_radio('sex', "Male", "M") ?>
						<?php create_radio('sex', "Female", "F") ?>
			</p>
			<?php create_edit('pass', "Password", "$password") ?>
			<p><?php create_submit('add', "update") ?></p>


		</form>

</body>
</html>