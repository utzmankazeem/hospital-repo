<?php
	
	include 'edit_header.php';
?>
<body>
		<h4>welcome to <?php echo $hospital_name ?> Health Care</h4>
		
				<a href="add_patient.php">add patient</a>
				<a href="view_patient.php">view patient</a>
				<a href="add_diagnosis.php">add diagnosis</a>
				<a href="view_diagnosis.php">view diagnosis</a>
				<a href="logout.php">logout</a>
		<hr>	
		<h4><?php echo $hospital_name ?> - Diagnosis Portal</h4>

		<?php
			$query = mysqli_query($db, "SELECT * FROM diagnosis WHERE diagnosis_id ='".$diagnosis_id."' ") or die(mysqli_error($db));
					$r = mysqli_fetch_array($query);
						extract($r);
		?>
		<?php
				if (array_key_exists('add', $_POST)) {

						$rp = mysqli_real_escape_string($db, $_POST['report']);
						$pi = mysqli_real_escape_string($db, $_POST['dia']);

						$update = mysqli_query($db, "UPDATE diagnosis SET  
																report = '".$rp."',
																patient = '".$pi."'
													WHERE diagnosis_id = '".$diagnosis_id."'
													") or die(mysqli_error($db));
						$suc = "diagnosis edited successfully";
						header("location:view_diagnosis.php?suc=$suc");					
				}
		?>
		<form action=""	method="post">
			
			<p><?php edit_area('report', "Enter Diagnosis Report", "$report") ?></p>			
			<p>Patient Diagnosed 
								<select name="dia"> 
									<option value=""><?php echo $patient ?></option>									
			<?php $pat = mysqli_query($db, "SELECT * FROM patient WHERE hospital_id='".$hospital_id."'")or die(mysqli_error($db)); ?>
									<?php while ($rec = mysqli_fetch_array($pat)) { ?>
									<option value="<?php echo$rec[1]."-".$rec[2] ?>"><?php echo$rec[1]."-".$rec[2] ?></option>
									<?php } ?>
								</select>

			</p>
			<p><?php create_submit('add', "update") ?></p>


		</form>

</body>
</html>