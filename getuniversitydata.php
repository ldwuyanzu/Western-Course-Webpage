<!DOCTYPE html>
<html>
<head>
	<h3>University Informations<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connecttodb.php';
?>

<?php
   $uniqueid= $_POST["universityid"];
   $query = 'SELECT * FROM university WHERE uniid="'. $uniqueid . '"' ;
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query3 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo 'This University unique id is: ' . $row["uniid"] . '<br>';
		echo 'This University name is: '. $row["uniname"] . '<br>';
		echo 'This University is in ' .$row["city"] . ', '.$row["prov"] . "<br>";
		echo 'This University have a nick name: ' .$row["nickname"] . "<br>";
     }
     mysqli_free_result($result);
	
	$query1= 'SELECT * FROM outsidecourse WHERE uniid="'. $uniqueid . '"' ;
	$result=mysqli_query($connection,$query1);
	if (!$result) {
         die("database query4 failed.");
     }
    echo '<h2>Here is cs courses this university have.<h2>';
	echo '<ol>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<li>';
		echo $row["outsidenum"] .'--'. $row["outsidename"];
		echo '--' . $row["whichyear"] . '--' . $row["weight"] . '--'.$row["uniid"] . "<br>";
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
