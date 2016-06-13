<DOCTYPE! HTML>
<?php

$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";
$register = "";
$insertion = "";
//verific daca ma aflu pe formuaroul din register,(valoarea vine din pagina RegistrationPage.php iar la prima executare, trece peste 
//verificare, direct la formularul de mai jos care in cele din urma ne trimite spre pagina RegistrationPage.php)
if(isset($_POST['register']))
 { 

	$username = $_POST['username'];
	$password = $_POST['password'];
	$register = $_POST['register'];
	//$insertion = $_POST['insertion'];
}
if(isset($_POST['insertion']))
{
	$insertion = $_POST['insertion'];
}

?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stylesheet.css">
			<title>Register</title>
		</head>
			<body>
				<div id="borders"><h3>Please Login</h3></div>
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

						<input class="else" type="textbox" name="username" value="<?php echo $username; ?>"  placeholder="username"/><br/>
						<input class="else" type="password" value="<?php echo $password; ?>" name="password" placeholder="password"/><br/>
						<?php if($register=="reg")
								{ ?>

									<input class="else" type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" placeholder="Password (confirm)"/><br/>
									<input class="else" type="text" value="<?php echo $email; ?>" name="email" placeholder="E-Mail"/><br/><br/>
									<input class="else" type="hidden" value="Register" name="context"/>
									<input class="red"  type="submit" value="Register" name="submit-form"/>
									<?php
									if($insertion=="uncompreg")
									{
										?> <p id="error">You left some blank spaces!<p> <?php
									}
								}
								else
								{ ?>
									<br/>
									<input class="else" type="hidden" value="Login" name="context"/>
									<input class="red"  type="submit" value="Login" name="submit-form"/>
									<?php
									if($insertion=="uncompleted")
									{
										?> <p id="error">Wrong user or password!<p> <?php
									}
									if($insertion=="taken")
									{
										?> <p id="error">Wrong user or password!<p> <?php
									}?>
						<?php } ?>
					</form>
				</div>
				<div id="footer"></div>
			</body>
	</html>