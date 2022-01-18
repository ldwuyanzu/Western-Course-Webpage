<!DOCTYPE html>
<html>
<head>
	<h3>Universities in this province<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Here are list of Universities:</h1>
<ol>
<?php
   $provincecode= $_POST["provcode"];
   $query = 'SELECT uniname, nickname FROM university WHERE prov = "' . $provincecode . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query5 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["uniname"] .'--'. $row["nickname"];
		echo '</li>';
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
