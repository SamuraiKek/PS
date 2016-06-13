<DOCTYPE! HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<?php
require_once 'global.inc.php';
$id2 = $_POST['id'];
$title2 = $_POST['title2'];
$author2 = $_POST['author2'];
$body2 = $_POST['body2'];
$shelf2 = $_POST['shelf2'];
$setat = $_POST['setat'];
?>
<body><?php
	if($setat=="conopida")
			{ ?>
		<div id="form">
				<form name = "Bookinfo" action="Process.php" method="post">
					<input class="else"  type="textbox" name="titlu" value="<?php echo $title2; ?>" placeholder="Title" /></br>
					<input class="else" type="textbox" name="autor" value="<?php echo $author2; ?>" placeholder="Author" /></br>
					<input class="else" type="textbox" name="corp" value="<?php echo $body2; ?>" placeholder="Body" /></br>
					<input class="else" type="textbox" name="raft" value="<?php echo $shelf2; ?>" placeholder="Shelf (Starting from below)" /></br>
					<input class="red" type="submit" value="Submit" name="submit-form"/>
					<input class="else" type="hidden" value="<?php echo $id2 ?>" name="id" />
					<input class="else" type="hidden" value="edit" name="context" /> <?php
			} ?></form>
</body>