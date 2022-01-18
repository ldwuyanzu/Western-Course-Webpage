<!DOCTYPE html>
<html>
<head>
	<h3>Western Courses-- your course<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h1>Here are your courses:</h1>
<ol>
<?php
   $name= $_POST["westernname"];
   $suffix = $_POST["westernsuffix"];
   $weight = $_POST["westernweight"];
   $number =$_POST["westernnumb"];
   $query1= 'select count(westernnum) as checker from westerncourse where westernnum = "' . $number . '"';
   $result= mysqli_query($connection,$query1);
   $row=mysqli_fetch_assoc($result);
   if (!$result) {
          die("Counting failed");
   }
   if ($row["checker"] >= 1){
	echo "course number entered already exist";
   }
   mysqli_free_result($result);
   $query = 'INSERT INTO westerncourse VALUES("' . $number . '","' . $name . '","' . $weight . '","' . $suffix . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your course was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
