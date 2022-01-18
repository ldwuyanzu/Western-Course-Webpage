<!DOCTYPE html>
<html>
<head>
	<h3>Equivalent courses:<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connecttodb.php';
?>

<?php
   $wcn= $_POST["westerncoursenumber"];
   $query = 'SELECT westernnum, westernname, weight FROM westerncourse WHERE westernnum="cs'. $wcn . '"' ;
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query3 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo 'Western course you have entered info is: ' . '<br>' . $row["westernnum"] . '---';
		echo $row["westernname"] .'---' . $row["weight"] . '<br>';
     }
     mysqli_free_result($result);
	
	$query1= 'SELECT o.outsidenum, o.outsidename, evaluateddate, u.uniname FROM outsidecourse as o ,equivalentto as e , university as u WHERE e.westernnum="cs'. $wcn . '" AND e.outsidenum = o.outsidenum AND u.uniid = e.uniid AND o.uniid = e.uniid' . '<br>';
	$return=mysqli_query($connection,$query1);
	if (!$return) {
         die("database query4 failed.");
     }
    echo '<h2>Here is info for equivalent course.<h2>';
	echo '<ol>';
	while ($row = mysqli_fetch_assoc($return)) {
		echo '<li>';
		echo $row["outsidenum"] .'--'. $row["outsidename"] . '--' . $row["evaluateddate"] . '--' . $row["uniname"]. "<br>";
		echo '</li>';
	}
	echo '</ol>';
	mysqli_free_result($return);
?>



<?php
   mysqli_close($connection);
?>
</body>
</html>
