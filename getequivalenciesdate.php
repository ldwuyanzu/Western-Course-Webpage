
<!DOCTYPE html>
<html>
<head>
	<h3>Equivalencies:<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connecttodb.php';
?>

<?php
   $d = $_POST["edate"];
   $query = ' SELECT w.westernnum, w.westernname, w.weight , evaluateddate FROM westerncourse as w , equivalentto as e WHERE e.evaluateddate <="'. $d . '" AND w.westernnum=e.westernnum' ;
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query3 failed.");
     }
    echo 'Western course you have entered info is: ' . '<br>';
	while ($row=mysqli_fetch_assoc($result)) {
        echo $row["westernnum"] . '---';
		echo $row["westernname"] .'---' . $row["weight"] . '---' . $row["evaluateddate"] . '<br>';
     }
     mysqli_free_result($result);
	
	$query1= 'SELECT o.outsidenum, o.outsidename, evaluateddate, u.uniname FROM outsidecourse as o ,equivalentto as e , university as u WHERE e.evaluateddate <= "' . $d . '" AND e.outsidenum = o.outsidenum AND u.uniid = e.uniid AND e.uniid = o.uniid'. '<br>';
	$result=mysqli_query($connection,$query1);
	if (!$result) {
         die("database query1 failed.");
     }
    echo '<h2>Here is info for equivalent course.<h2>';
	echo '<ol>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<li>';
		echo $row["outsidenum"] .'--'. $row["outsidename"];
		echo '--' . $row["uniname"] . '--' . $row["evaluateddate"] . '--' . "<br>";
		echo '</li>';
	}
	echo '</ol>';
	mysqli_free_result($result);
?>



<?php
   mysqli_close($connection);
?>
</body>
</html>
