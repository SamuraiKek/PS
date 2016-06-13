<DOCTYPE! HTML>
<?php 
	require_once 'global.inc.php';
	$Title="";
	$Author="";
	$Body="";
	$Shelf="";
	$context="";
	if (isset($_POST['context']))
		$context=$_POST['context'];
	$sel = "";
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if($context=="search")
	{
		$Title=$_POST['Title'];
		$Author=$_POST['Author'];
		$Body=$_POST['Body'];
		$Shelf=$_POST['Shelf'];

		$sel = "SELECT * FROM books WHERE 1=1";
		if ($Title != "")
			$sel = $sel . " AND Title LIKE '$Title%'";
		if ($Author !="")
			$sel = $sel . " AND Author LIKE '$Author%'";
		if ($Body !="")
			$sel = $sel . " AND Body LIKE '$Body'";
		if ($Shelf !="")
			$sel = $sel . " AND Shelf LIKE '$Shelf'";
	}
	else
	{
		$sel = "SELECT * FROM books WHERE 1=1";
	}
	echo "sel=".$sel;
	$res = mysqli_query($connection, $sel);
	mysqli_close($connection);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Book List</title>
</head>
<body>
	<div id="borders">
		<a href="PersonalLibrary.php">Logout</a>
		<h3>Book List</h3>
	</div>
	<table class="firsttable">
		<tr>
			<form name="search" action="Booklist.php" method="post">
			<td>&nbsp;</td>
			<td><input class="td3" type="text" value="<?php echo $Title; ?>" name="Title" placeholder="Title" /></td>
			<td><input class="td3" type="textbox" value="<?php echo $Author; ?>" name="Author" placeholder="Author" /></td>
			<td><input class="td3" type="textbox" value="<?php echo $Body; ?>" name="Body" placeholder="Body" /></td>
			<td><input class="td3" type="textbox" value="<?php echo $Shelf; ?>" name="Shelf" placeholder="Shelf" /></td>
			<td><input class="td3" type="hidden" name="context" value="search" /></td>
			<td><button class="button3" type="submit">Search for book</button></td>
			</form>
		</tr>
		<tr>
			<td class="td1" id="heads">Numar</td>
			<td class="td1"  id="heads">Title</td>
			<td class="td1"  id="heads">Author</td>
			<td class="td1"  id="heads">Body</td>
			<td class="td1"  id="heads">Shelf</td>
			<td class="td1"  id="special">Edit/</td>
			<td class="td1"  id="special">Delete</td>
		</tr>
		<?php
		while ($row = mysqli_fetch_row($res))
	{ ?>
		<tr>
			<td class="td1" ><?php echo "$row[0]" ?></td>
			<td class="td1" ><?php echo "$row[1]" ?></td>
			<td class="td1" ><?php echo "$row[2]" ?></td>
			<td class="td1" ><?php echo "$row[3]" ?></td>
			<td class="td1" ><?php echo "$row[4]" ?></td>
			<td class="td1" >
				<form method="post" action="Editpage.php">
					<button class="button1" type="submit">Edit</button>
					<input class="else" type="hidden" value="<?php echo $row[0]; ?>" name="id" />
					<input class="else" type="hidden" value="<?php echo $row[1]; ?>" name="title2" />
					<input class="else" type="hidden" value="<?php echo $row[2]; ?>" name="author2" />
					<input class="else" type="hidden" value="<?php echo $row[3]; ?>" name="body2" />
					<input class="else" type="hidden" value="<?php echo $row[4]; ?>" name="shelf2" />
					<input type="hidden" value="conopida" name="setat" />
				</form>
			<td class="td1" >
				<form method="post" action="Booklistprocess.php">
					<button class="button1" type="submit" action="Booklistprocess.php">Delete</button>
					<input type="hidden" value="<?php echo $row[0]; ?>" name="id" />
				</form>
			</td>
		</tr>
	<?php } ?>
	</table>
	<table class="secondtable">
		<tr>
			<td class="td2">
				<form method="post" action="BookInformation.php">
					<button class="button2" type="submit">Click here to insert books in the Library</button>
					<input type="hidden" value="sub" name="submissions" /><br/>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>