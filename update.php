<!DOCTYPE html>
<html>
<head>
	<h3>update<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<?php
   $wcn= $_POST["wcn"];
   $wname= $_POST["wname"];
   $weight= $_POST["ww"];
   $suffix= $_POST["ws"];
	
	$query= 'UPDATE westerncourse SET westernname ="' . $name . '" weight ="' . $weight . '"suffix ="' . $suffix . '"WHERE westernnum="' . $wcn . '"';
	if (!mysqli_query($connection, $query)) {
        die("Error: update failed" . mysqli_error($connection));
    }
   echo "course was updateed!";
   mysqli_close($connection);
?>
</body>
</html>
