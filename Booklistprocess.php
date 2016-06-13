<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<?php
require_once 'global.inc.php';
$id=$_POST['id'];
echo $id;
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_query($connection, "DELETE FROM books WHERE id=$id");
?>
<form name="Booklist" action="Booklist.php" method="post">
		</form>
		<script type="text/javascript">
			document.Booklist.submit()
		</script>