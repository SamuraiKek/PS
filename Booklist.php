<DOCTYPE! HTML>
<?php 
	require_once 'global.inc.php';
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	$res = mysqli_query($connection, "SELECT * FROM books");
	mysqli_close($connection);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Lista cartilor</title>
</head>
<body>
	<div id="borders">
		<a href="PersonalLibrary.php">Inapoi la pagina principala</a>
		<h3>Lista cartilor</h3>

	</div>
	<table>
		<tr>
			<td>Titlu</td>
			<td>Autor</td>
			<td>Corp</td>
			<td>Raft</td>
		</tr>
		<?php
		while ($row = mysqli_fetch_row($res))
	{ ?>
		<tr>
			<td><?php echo "$row[1]" ?></td>
			<td><?php echo "$row[2]" ?></td>
			<td><?php echo "$row[3]" ?></td>
			<td><?php echo "$row[4]" ?></td>
		</tr>
	<?php } ?>
	</table>
	<div id="footer"></div>
</body>
</html>