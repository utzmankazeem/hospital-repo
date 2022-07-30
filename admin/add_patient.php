<?php
	include('header.php')
?>		
		<h4><?php echo $hospital_name ?> - Patient Portal</h4>

		<?php

				if (array_key_exists('add', $_POST)) {
					
					if (empty($_POST['fname'])) {
						$e['fn'] = "enter firstname";
					} else {
						$fn = mysqli_real_escape_string($db, $_POST['fname']);
					}
					if (empty($_POST['lname'])) {
						$e['ln'] = "enter last name";
					} else {
						$ln = mysqli_real_escape_string($db, $_POST['lname']);
					}
					if (empty($_POST['age'])) {
						$e['age'] = "enter age";
					} else {
						$age = mysqli_real_escape_string($db, $_POST['age']);
					}
					if (empty($_POST['mobile'])) {
						$e['mob'] = "enter mobile number";
					} else {
						$mob = mysqli_real_escape_string($db, $_POST['mobile']);
					}
					if (empty($_POST['sex'])) {
						$e['sex'] = "select gender";
					} else {
						$sex = mysqli_real_escape_string($db, $_POST['sex']);
					}
					if (empty($_POST['pass'])) {
						$e['pass'] = "enter Password";
					} else {
						$pass = mysqli_real_escape_string($db, $_POST['pass']);
					}
					if (empty($e)) {
						
						$insert = mysqli_query($db, "INSERT INTO patient VALUES(NULL,
																			'".$fn."',
																			'".$ln."',
																			'".$age."',
																			'".$mob."',
																			'".$sex."',
																			'".$pass."',
																			'".$hospital_id."'
													)") or die(mysqli_query($db));
						$suc = "patient added successfully";
						header("location:add_patient.php?suc=$suc");
					}
				}

				if (isset($_GET['suc'])) {
					echo "<i>".$_GET['suc']."</i>";
				}
		?>

		<form action=""	method="post">
			
			<p><?php create_text('fname', "Firstname") ?>
				<?php?>
			</p>
			<p><?php create_text('lname', "Lastname") ?></p>
			<p><?php create_text('age', "DOB", "date") ?></p>
			<p><?php create_text('mobile', "Mobile", "number") ?></p>
			<p>Gender: <?php create_radio('sex', "Male", "M") ?>
						<?php create_radio('sex', "Female", "F") ?>
			</p>
			<?php create_text('pass', "Password") ?>
			<p><?php create_submit('add', "Add Patient") ?></p>


		</form>

</body>
</html>