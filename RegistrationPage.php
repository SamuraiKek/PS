<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<?php
//incarc variabilele din pagina global.inc.php si le folosesc mai jos pentru a ma conecta la baza de date
require_once 'global.inc.php';

$context = $_POST['context'];
$usr = $_POST['username'];
$pwd = $_POST['password'];
if($context=="Register")
{
	$pwdconf = $_POST['password-confirm'];
	$eml = $_POST['email'];
}
//verific daca campurile pentru user si parola sunt completate, in cazul in care sunt libere, aplicatia ramane la pagina de login (vezi else-ul aferent acestui if)
if($usr != "" && $pwd != "")
{   //deschid conexiunea dintre aplicatie si baza de date

	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	echo "success<br>";
	//verific daca userul si parola introduse in formular se afla in baza de date
	$res = mysqli_query($connection, "SELECT * FROM users WHERE username = '$usr' AND password = '$pwd'");
	if(mysqli_num_rows($res) == 0)
	{       //daca userul si parola nu se afla in baza de date, aplicatia trece la registration page si imi cere sa creez un cont nou
			if($context=="Register")
			{   //daca ma aflu in formularul de register, verific daca numele utilizatorului se afla deja in baza de date, in caz afirmativ, aplicatia se intoarce la formularul de login si imi cere sa aleg un alt utilizator (3)
				$name = mysqli_query($connection, "SELECT * FROM users WHERE username ='$usr'");
				if(mysqli_num_rows($name)>0)
				{
					?> 
					<form name="Login1" action="PersonalLibrary.php" method="post">
					<input type="hidden" name="username" value="<?php echo $usr; ?>" /><br/>
					<input type="hidden" value="<?php echo $pwd; ?>" name="password" /><br/>
					<input type="hidden" value="log" name="register" /><br/>
					<input type="hidden" value="taken" name="insertion" />
				</form>
				<script type="text/javascript">
					document.Login1.submit();
				</script> <?php 
				}
				//daca numele utilizatorului nu se gaseste deja in baza de date, introduc informatiile din formularul register in baza de date si creez un nou utilizator (4)
				else
					if($pwd == $pwdconf)
					{
						mysqli_query($connection, "INSERT INTO users (username, password, email) VALUES('$usr', '$pwd', '$eml')");
						?>
						<form name="Booklist" action="Booklist.php" method="post">
							<!--input type="hidden" value="sub" name="submissions" /><br/-->
						</form>
						<script type="text/javascript">
						document.Booklist.submit()
						</script><?php
					}
					else
					{
						?>
						<form name="Register" action="PersonalLibrary.php" method="post">
							<input type="hidden" name="username" value="<?php echo $usr; ?>" /><br/>
							<input type="hidden" value="<?php echo $pwd; ?>" name="password" /><br/>
							<input type="hidden" value="reg" name="register" /><br/>
							<input type="hidden" value="uncompreg" name="insertion" />
							<script type="text/javascript">
							document.Register.submit();
							</script>
							<?php
					}
			}
			else
			{ 	//daca ma aflu in formularul de login, verific daca numele utilizatorului se afla deja in baza de date, in caz afirmativ, aplicatia se intoarce la formularul de login si imi cere sa aleg un alt utilizator (1)
				$name = mysqli_query($connection, "SELECT * FROM users WHERE username ='$usr'");
				if(mysqli_num_rows($name)>0)
				{
				?>	
				<form name="Login" action="PersonalLibrary.php" method="post">
					<input type="hidden" name="username" value="<?php echo $usr; ?>" /><br/>
					<input type="hidden" value="<?php echo $pwd; ?>" name="password" /><br/>
					<input type="hidden" value="log" name="register" /><br/>
					<input type="hidden" value="taken" name="insertion" />
				</form>
				<script type="text/javascript">
					document.Login.submit();
				</script>
				<?php
				}
				//daca ma aflu in formularul de login si utilizatorul nu se gaseste in baza de date, ma duc la registration page (2)
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
	}
	else
	{ ?>

		<form name="Booklist" action="Booklist.php" method="post">
			<!--input type="hidden" value="sub" name="submissions" /><br/-->
		</form>
		<script type="text/javascript">
			document.Booklist.submit()
		</script>

	<?php }

	/*while ($row = mysqli_fetch_row($res))
	{
		echo "<br><br>ROW = $row[0] $row[1] $row[2] $row[3]";
	}*/
	mysqli_close($connection);
}
else
{
	?>
			<form name="Login" action="PersonalLibrary.php" method="post">
				<input type="hidden" name="username" value="<?php echo $usr; ?>" /><br/>
				<input type="hidden" value="<?php echo $pwd; ?>" name="password" /><br/>
				<input type="hidden" value="log" name="register" /><br/>
				<input type="hidden" value="uncompleted" name="insertion" />
			</form>
			<script type="text/javascript">
				document.Login.submit();
			</script> <?php 
}?>
<body>
	<div id="borders">
		<a href="logout.php">Log Out</a> | <a href="PersonalLibrary.php">Back to main page</a> | <a href="Booklist.php"> View Book List</a>
		<h3>Congradulations! You've  just made a new account!</h3>
	</div>
	<div id="footer"></div>
</body>
</html>