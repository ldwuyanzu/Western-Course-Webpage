<?php
   include 'connecttodb.php';
?>
<?php
   $query8 = "SELECT distinct uniid FROM outsidecourse";
   $result = mysqli_query($connection,$query8);
   if (!$result) {
        die("databases query8 failed.");
    }
	
	while ($row = mysqli_fetch_assoc($result)) {
   $query7 = 'SELECT uniname, nickname FROM university WHERE uniid ="' . $row["uniid"] . '"';
   $return = mysqli_query($connection,$query7);
   if (!$return) {
        die("databases query7 failed.");
    }

	$row1 = mysqli_fetch_assoc($return);

	echo $row1["uniname"] .'--'. $row1["nickname"] . "<br>";

	}
	
   mysqli_free_result($result);
   mysqli_free_result($return);
?>

