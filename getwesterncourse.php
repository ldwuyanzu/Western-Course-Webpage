<!DOCTYPE html>
<html>
<head>
	<h3>Western Courses<h3>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Here are list of Western courses:</h1>

<?php
   $nameornum= $_POST["westerncourse"];
   $asordes=$_POST["order"];
   $query = 'SELECT * FROM westerncourse ORDER BY ' . $nameornum . ' ' . $asordes ;
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    echo '<form action="modify.php" method="post">';
	while ($row=mysqli_fetch_assoc($result)) {
        
		echo '<input type="radio" name="wcourse">';
        echo $row["westernnum"] .'--'. $row["westernname"] . '--'.$row["weight"] . '--'.$row["suffix"] . '<br>';
		
     }
	 echo '<input type="submit" value="Modify Course">';
	 echo '</form>';
     mysqli_free_result($result);
?>


<?php
   mysqli_close($connection);
?>
</body>
</html>
