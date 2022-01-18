<!DOCTYPE html>
<html>
<head>
	<h3>Add Equivalent Status<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<?php
   $westerncn= $_POST["ewcn"];
   $outsidecn= $_POST["eocn"];
   $query1= 'select westernnum from equivalentto where westernnum = "cs' . $westerncn . '" AND outsidenum ="CompSci' . $outsidecn . '"';
   $result= mysqli_query($connection,$query1);
   $row=mysqli_fetch_assoc($result);
   if (!$result) {
          die("Counting failed");
   }
   if ($row["westernnum"] != NULL){
	$query2= 'UPDATE equivalentto SET evaluateddate ="' . date("Y-m-d") . '" WHERE westernnum="' . $row["westernnum"] . '"';
	if (!mysqli_query($connection, $query2)) {
        die("Error: update failed" . mysqli_error($connection));
    }
	die("equivalency entered already exist, date is updated to today". mysqli_error($connection));
   }
   mysqli_free_result($result);
   $query6 = 'SELECT uniid FROM outsidecourse WHERE outsidenum="CompSci' . $outsidecn . '"';
   $result= mysqli_query($connection,$query6);
   $row=mysqli_fetch_assoc($result);
   $query3 = 'INSERT INTO equivalentto VALUES("cs' . $westerncn . '","CompSci' . $outsidecn . '","' . $row["uniid"] . '","' . date("Y-m-d") . '")';
   if (!mysqli_query($connection, $query3)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   mysqli_free_result($result);
   echo "equivalent was added!";
   mysqli_close($connection);
?>
</body>
</html>
