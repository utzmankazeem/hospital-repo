<?php
	session_start();
	include('../db/dbcon.php');
	include('../db/func.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		
				body{
					background-color: #09f;
					font-family: Arial;
				}
				.container{
					border: 5px solid #066;
					border-radius: 30px;
					width: 40%;
					margin: 10% auto;
					padding: 5%;
					background-color: #fff;
				}
				p{
					max-width: 40%;
					margin: 5px auto;
					padding: 5px;
					background-color: #6777
				}

	</style>
</head>
<body>

		<?php

			if(array_key_exists('reg', $_POST)) {
				$e = array();
				
				if (empty($_POST['name'])) {
					$e['name'] = "kindly enter hospital name";
				} else {
					$name = mysqli_real_escape_string($db, $_POST['name']);
				}
				if (empty($_POST['area'])) {
					$e['area'] = "enter address";
 				} else {
 					$area = mysqli_real_escape_string($db, $_POST['area']);
 				}
 				if (empty($_POST['year'])) {
					$e['year'] = "year of inception";
				} else {
					$year = mysqli_real_escape_string($db, $_POST['year']);
				}
 				if (empty($_POST['pword'])) {
 					$e['pword'] = "enter password";
 				} else {
 					$pword = mysqli_real_escape_string($db, $_POST['pword']);
 				}
 				if (empty($e)) {

 					$insert = mysqli_query($db, "INSERT INTO hospital VALUES(NULL,
 																			'".$name."',
 																			'".$area."',
 																			'".$year."',
 																			'".$pword."',
 																			'".md5($pword)."'
 												)") or die(mysqli_error($db));
 					
 					header("location:hosp_login.php?s=$s");
 				} 
			}

		?>
		<div class="container">
				<h3>Register</h3>
	<form action=""	method="post">
				<p><?php create_text("name", "Hospital Name") ?>
					<?php if(isset($e['name'])) echo$e['name'] ?>
				</p>		
				<p><?php create_text("area", "Address") ?>
					<?php if(isset($e['area'])) echo$e['area'] ?>
				</p>
				<p><?php create_text("year", "Year Of Inception", "date") ?>
					<?php if(isset($e['year'])) echo$e['year'] ?>		
				</p>
				<p><?php create_text("pword", "Password", "password") ?>
					<?php if(isset($e['pword'])) echo$e['pword'] ?>
				</p>
				<p><?php create_submit("reg", "Register") ?><button><a href="hosp_login.php">Login</a></button></p>
		</form>
	</div>
</body>
</html>