<!DOCTYPE html>
<html>
<head>
	<h1>Assignment 3</h1>
	<h5>Yucen Wu</h5>
	<link rel="stylesheet" type="text/css" href="courses.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>

<!-- connect to database -->
<?php 
include 'connecttodb.php';
?>

<!-- get western course -->
<h1>Get Western Course Data </h1>
<form action="getwesterncourse.php" method="post">
  <input type="radio" id="westernnum" name="westerncourse" value="westernnum">
  <label for="westernnum">Course Number</label><br>
  <input type="radio" id="westernname" name="westerncourse" value="westernname">
  <label for="westernname">Course Name</label><br>
  <input type="radio" id="ASC" name="order" value="ASC">
  <label for="ASC">Ascending</label><br>
  <input type="radio" id="DESC" name="order" value="DESC">
  <label for="DESC">Descending</label><br>
  <input type="submit" value="Get Western Course">
</form>
<!-- add western course -->
<p>
<hr>
<p>
<h2> Add a New Western Course:</h2>
<form action="addnewcourse.php" method="post">
New Course's Name: <input type="text" name="westernname"><br>
New Course's Weight: <br>
<input type="radio" name="westernweight" value="1.0">1.0<br>
<input type="radio" name="westernweight" value="0.5">0.5<br>
New Course's Suffix: <input type="text" name="westernsuffix"><br>
New Course's Number: cs<input type="text" name="westernnumb"><br>

<input type="submit" value="Add New Course">
</form>

<!-- check university info -->
<p>
<hr>
<p>
<h2> University</h2>
<form action="getuniversitydata.php" method="post">
<?php
   $query = "SELECT * FROM university ORDER BY prov";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="universityid" value="';
        echo $row["uniid"];
        echo '">' . $row["uniname"] . "---" . $row["prov"] . "<br>";
   }
   mysqli_free_result($result);
?>
<input type="submit" value="Get University Info">
</form>

<p>
<hr>
<p>
<h2>Find University through Province Code <h2>
<form action="getuniversitynameandnick.php" method="post">
  <input type="radio" name="provcode" value="AB">AB<br>
  <input type="radio" name="provcode" value="BC">BC<br>
  <input type="radio" name="provcode" value="MB">MB<br>
  <input type="radio" name="provcode" value="NB">NB<br>
  <input type="radio" name="provcode" value="NL">NL<br>
  <input type="radio" name="provcode" value="NT">NT<br>
  <input type="radio" name="provcode" value="NS">NS<br>
  <input type="radio" name="provcode" value="NU">NU<br>
  <input type="radio" name="provcode" value="ON">ON<br>
  <input type="radio" name="provcode" value="PE">PE<br>
  <input type="radio" name="provcode" value="QC">QC<br>
  <input type="radio" name="provcode" value="SK">SK<br>
  <input type="radio" name="provcode" value="YT">YT<br>
  <input type="submit" value="Find University">
</form>

<!-- find equivalent course -->
<p>
<hr>
<p>
<h2>Find equivalent course to western course <h2>
<form action="getequivalent.php" method="post">
Enter Western Course Number: cs<input type="text" name="westerncoursenumber"><br>
<input type="submit" value="Go!">
</form>

<!-- find all equivalencies made before selected date-->
<p>
<hr>
<p>
<h2>Find all equivalencies made before selected date <h2>
<form action="getequivalenciesdate.php" method="post">
Enter date (YYYY-MM-DD): <input type="text" name="edate"><br>
<input type="submit" value="GoGo!">
</form>

<!-- Add equivalencies-->
<p>
<hr>
<p>
<h2>Add equivalencies between an existing outside course and an existing Western course.<h2>
<form action="addequivalent.php" method="post">
Enter exist western course number: cs<input type="text" name="ewcn"><br>
Enter exist outside course number: CompSci<input type="text" name="eocn"><br>
<input type="submit" value="Check Update Status">
</form>

<!-- list name and nick name of university with no course-->
<p>
<hr>
<p>
<h2>Names and nicknames of universities that do not have any courses associated with them. <h2>
<?php
include 'nocourseuni.php';
?>

<?php
mysqli_close($connection);
?>
</body>
</html>

