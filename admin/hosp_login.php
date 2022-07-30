<?php
	session_start();
	include('../db/dbcon.php');
	include('../db/func.php');
?>

<!DOCTYPE html>
<html>
<head>
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
					max-width: 60%;
					margin: 5px auto;
					padding: 5px;
					background-color: #6777;
					box-sizing: border-box;
				}

	</style>
		<title>Login</title>
</head>
<body>
		<div class="container">
		<?php

			if (array_key_exists('log', $_POST)) {
				
				if (empty($_POST['name'])) {
					$e['name'] = "kindly enter hospital name";
				} else {
					$name = mysqli_real_escape_string($db, $_POST['name']);
				}
 				if (empty($_POST['pword'])) {
 					$e['pword'] = "enter password";
 				} else {
 					$pword = mysqli_real_escape_string($db, $_POST['pword']);
 				}
 				if (empty($e)) {

 		$query = mysqli_query($db, "SELECT * FROM hospital WHERE hospital_name = '".$name."' AND secure_password='".md5($pword)."'") 
 																						or die(mysqli_error($db));
 						if(mysqli_num_rows($query) == 1) {
 							$rec = mysqli_fetch_array($query);
 							
 							$_SESSION['hospital_id'] = $rec[0];
 							$_SESSION['hospital_name'] = $rec[1];


 						header("location:home.php");
 						} else {
 							$msg = "wrong username/password";
 							header("location:hosp_login.php?msg=$msg");
 						
 					}
 				}
			}

			if (isset($_GET['msg'])) {
				echo "<h4>".$_GET['msg']."</h4>";
			}
		?>

			<div class="container">
					<h3>Login</h3>
		<form action=""	method="post">

		<p><?php create_text("name", "Hospital Name") ?>
			<?php if(isset($e['name'])) echo$e['name'] ?>
		</p>
		<p><?php create_text("pword", "Password", "password") ?>
			<?php if(isset($e['pword'])) echo$e['pword'] ?>
		</p>
		<p><?php create_submit("log", "Login") ?><button><a href="hosp_register.php">Register</a></button></p>

		</form></div>
</body>
</html>