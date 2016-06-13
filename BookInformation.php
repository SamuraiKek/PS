<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Introducere carti</title>
</head>
<?php
$submission = "";
$title = "";
$author ="";
$body = "";
$shelf = "";
if(isset($_POST['submission']))
{
	$submission = $_POST['submission'];
}
if(isset($_POST['Titlu']))
{
	$title = $_POST['Titlu'];
	$author = $_POST['Autor'];
	$body = $_POST['Corp'];
	$shelf = $_POST['Raft'];

}
?>





<body>
	<div id="borders"><h3>Please type data about the books</h3></div>
	<div id="form">
		<form name = "Bookinfo" action="Process.php" method="post">
			<input class="else" type="textbox" name="titlu" value="<?php echo $title; ?>" placeholder="Title" /></br>
			<input class="else" type="textbox" name="autor" value="<?php echo $author; ?>" placeholder="Author" /></br>
			<input class="else" type="textbox" name="corp" value="<?php echo $body; ?>" placeholder="Body" /></br>
			<input class="else" type="textbox" name="raft" value="<?php echo $shelf; ?>" placeholder="Shelf (Starting from below)" /></br>
			<input class="red" type="submit" value="Submit" name="submit-form"/>
			<input type="hidden" value="submit" name="context" />
			<?php
			if($submission=="sub")
			{
				?><input type="hidden" value="submit" name="context" /><?php
			}
			if($submission=="ed")
			{
				?><input class="red" type="submit" value="edit" name="context" /><?php
			}?>
		</form>
	</body>
</html>