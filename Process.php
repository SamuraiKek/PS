<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<?php

require_once 'global.inc.php';

$context = $_POST['context'];
$ttl = $_POST['titlu'];
$atr = $_POST['autor'];
$bd = $_POST['corp'];
$slf = $_POST['raft'];
$id = '';
if(isset($_POST['id']))
{
	$id=$_POST['id'];
}



if($ttl != "" && $atr !="" && $bd !="" && $slf !="")
{
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if($context=="submit")
	{
		mysqli_query($connection, "INSERT INTO books (title, author, body, shelf) VALUES ('$ttl', '$atr', '$bd', '$slf')");
	}
	else
	{
		if($context=="edit")
		{
			mysqli_query($connection, "UPDATE books SET title='$ttl', author='$atr', body='$bd', shelf='$slf' WHERE id='$id'");
		}
	}?>
	<form name="List" action="Booklist.php" method="post">
			<input type="hidden" value="edit" name="submissions" /><br/>
		</form>
		<script type="text/javascript">
			document.List.submit()
		</script><?php

}
else
{
	?>
			<form name="uncompleted" action="BookInformation.php" method="post">
				<input type="hidden" name="Title" value="<?php echo $ttl; ?>" /><br/>
				<input type="hidden" value="<?php echo $atr; ?>" name="Author" /><br/>
				<input type="hidden" value="<?php echo $bd; ?>" name="Body" /><br/>
				<input type="hidden" value="<?php echo $slf; ?>" name="Shelf" />
				<input type="hidden" value="sub" name="submission" />
			</form>
			<script type="text/javascript">
				document.uncompleted.submit();
			</script> <?php 
}
mysqli_close($connection);
?>
<body>
	<div id="borders">
		<a href="logout.php">Log Out</a> | <a href="PersonalLibrary.php">Back to main page</a> | <a href="Booklist.php"> View Book List</a>
	</div>
</body>
</html>