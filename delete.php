<!DOCTYPE html>
<html>
<head>
	<h3>Delete Status<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<?php
   $wcn= $_POST["wcn"];
   
   $query= 'DELETE FROM westerncourse WHERE westernnum="' . $wcn . '"';
   $query1= 'SELECT distinct count(westernnum) as checker FROM equivalentto WHERE westernnum="' . $wcn . '"';
   $result= mysqli_query($connection,$query1);
   $row=mysqli_fetch_assoc($result);
   if (!$result) {
          die("Counting failed");
   }
   if ($row["checker"] >= 1){
        die("Error: this western course is equivalent to a outside course!" . mysqli_error($connection));
    }
	
    if (!mysqli_query($connection, $query)) {
        die("Error: delete failed" . mysqli_error($connection));
    }
   mysqli_free_result($result);
   echo "course was deleted!";
   mysqli_close($connection);
?>
</body>
</html>
