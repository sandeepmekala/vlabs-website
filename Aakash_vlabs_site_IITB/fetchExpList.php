<?php
include("db.php");
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
$subArr = array("physics","chemistry","biology","mathematics");
$display_string = "";
for ($i = 0; $i <= 3; $i++) {
	$query = "SELECT subject_name FROM experiment_details WHERE subject_name='$subArr[$i]' AND status='1'";
	$qry_result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($qry_result);
	$display_string .= "$count/";
}
echo $display_string;
?>