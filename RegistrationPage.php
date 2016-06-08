<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<?php

require_once 'global.inc.php';

$context = $_POST['context'];
$usr = $_POST['username'];
$pwd = $_POST['password'];
if($context=="Register")
{
	$pwdconf = $_POST['password-confirm'];
	$eml = $_POST['email'];
}

echo "user=".$usr." pwd=".$pwd;

if (1 == 2)
{

if(!isset($usr) || !isset($pwd))
	echo "Nu ati introdus userul sau parola";
else
	if (isset($usr) && isset($pwd))
{
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	echo "success<br>";
	$res = mysqli_query($connection, "SELECT * FROM users WHERE username = '$usr' AND password = '$pwd'");
	if(mysqli_num_rows($res) == 0)
	{
		if($context=="Register")
		{
			if($pwd == $pwdconf)
			{
				mysqli_query($connection, "INSERT INTO users (username, password, email) VALUES('$usr', '$pwd', '$eml')");
			}
		}
		else
		{ ?>
			<form name="Login" action="PersonalLibrary.php" method="post">
				<input type="hidden" name="username" value="<?php echo $usr; ?>" /><br/>
				<input type="hidden" value="<?php echo $pwd; ?>" name="password" /><br/>
				<input type="hidden" value="reg" name="register" /><br/>
			</form>
			<script type="text/javascript">
				document.Login.submit();
			</script>

		<?php }
	}
	else
	{ ?>

		<form name="frmBL" action="Booklist.php" method="post">
		</form>
		<script type="text/javascript">
			document.frmBL.submit()
		</script>

	<?php }

	while ($row = mysqli_fetch_row($res))
	{
		echo "<br><br>ROW = $row[0] $row[1] $row[2] $row[3]";
	}
	mysqli_close($connection);
}
else
{
	echo "fail";
}
}
?>
<body>
	<div id="borders">
		<a href="logout.php">Log Out</a> | <a href="PersonalLibrary.php">Inapoi la pagina principala</a> | <a href="Booklist.php"> Vezi Lista de carti</a>
		<h3>Felicitari, ati creat un cont nou!</h3>
	</div>
	<div id="footer"></div>
</body>
</html>