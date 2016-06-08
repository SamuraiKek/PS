<DOCTYPE! HTML>
<?php

$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";
$register = "";

if(isset($_POST['register']))
 { 

	$username = $_POST['username'];
	$password = $_POST['password'];
	$register = $_POST['register'];
}

?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stylesheet.css">
			<title>Inregistrare</title>
		</head>
			<body>
				<div id="borders"><h3>Va rugam sa va logati</h3></div>
				<div id="form">
					<?php if($register=="reg")
								{ ?>
									<p id="login">Register<p>
								<?php
								}
								else{ ?>
									<p id="login">Login<p>
								<?php } ?>
					<form name="Register" action="RegistrationPage.php" method="post">

						<input type="textbox" name="username" value="<?php echo $username; ?>"  placeholder="username"/><br/>
						<input type="password" value="<?php echo $password; ?>" name="password" placeholder="password"/><br/>
						<?php if($register=="reg")
								{ ?>

									<input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" placeholder="Password (confirm)"/><br/>
									<input type="text" value="<?php echo $email; ?>" name="email" placeholder="E-Mail"/><br/><br/>
									<input type="hidden" value="Register" name="context"/>
									<input class="red" type="submit" value="Register" name="submit-form"/>
						<?php
								}
								else
								{ ?>
									<br/>
									<input type="hidden" value="Login" name="context"/>
									<input class="red" type="submit" value="Login" name="submit-form"/>
						<?php } ?>
					</form>
				</div>
				<div id="footer"></div>
			</body>
	</html>