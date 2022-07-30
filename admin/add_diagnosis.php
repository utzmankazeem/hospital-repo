<?php
	include('header.php')
?>
		<h4><?php echo $hospital_name ?> - Diagnosis Portal</h4>

		<?php

				if (array_key_exists('add', $_POST)) {
					
					if (empty($_POST['report'])) {
						$e['rep'] = "enter diagnosis report";
					} else {
						$rep = mysqli_real_escape_string($db, $_POST['report']);
					}
					if (empty($_POST['dia'])) {
						$e['dia'] = "patient name";
					} else {
						$dia = mysqli_real_escape_string($db, $_POST['dia']);
					}
					if (empty($e)) {
						
						$insert = mysqli_query($db, "INSERT INTO diagnosis VALUES(NULL,
																			'".$rep."',
																			'".$dia."',
																			'".$hospital_id."'
													)") or die(mysqli_query($db));
						$suc = "Diagnosis successfull";
						header("location:add_diagnosis.php?suc=$suc");
					}
				}

				if (isset($_GET['suc'])) {
					echo "<i>".$_GET['suc']."</i>";
				}
		?>

		<form action=""	method="post">
			<p><?php create_area('report', "Enter Diagnosis Report") ?>
				<?php if(isset($e['rep'])) echo$e['rep'] ?>
			</p>
			<p>Patient Diagnosed 
								<select name="dia">
									<option value="">Select Name</option>
						<?php $patient = mysqli_query($db, "SELECT * FROM patient WHERE hospital_id='".$hospital_id."'") or die(mysqli_error($db)); ?>
							<?php while ($rec = mysqli_fetch_array($patient)) { ?>
									<option value="<?php echo$rec[1]."-".$rec[2] ?>"><?php echo$rec[1]."-".$rec[2] ?></option>
							<?php } ?>
								</select>
				<?php if(isset($e['dia'])) echo$e['dia'] ?>
			</p>
			<p><?php create_submit('add', "Submit Diagnosis") ?></p>
			
		</form>
</body>
</html>