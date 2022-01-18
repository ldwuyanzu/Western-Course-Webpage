<!DOCTYPE html>
<html>
<head>
	<h3>Modify Western course<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
   include 'connecttodb.php';
?>

<?php
   $westerncn= $_POST["wcourse"];
	echo '<form action="update.php" method="post">';
	echo '<data name="wcn" value="' . $westerncn . '">Western Course Number:' . $westerncn . '</data>' . '<br>';
	echo 'Enter New Name: <input type="text" name="wname"><br>';
	echo 'Enter New weight: <input type="text" name="ww"><br>';
	echo 'Enter New suffix: <input type="text" name="ws"><br>';
	echo '<input type="submit" value="UPDATE">';
	echo '</form>';

	echo '<form action="delete.php" method="post">';
	echo '<data name="wcn" value="' . $westerncn . '">Western Course Number:' . $westerncn . '</data>' . '<br>';
	echo 'Delete this course.';
	echo '<input type="submit" value="DELETE">';
	echo '</form>';

 ?>

</body>
</html>
