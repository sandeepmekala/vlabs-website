<?php
include("db.php");

	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$Username = $_POST['Username'];
//$Username = "sandy";
	// Escape User Input to help prevent SQL Injection
$Username = mysql_real_escape_string($Username);

$specification = $_POST['specification'];
//$specification = "contributor";
	// Escape User Input to help prevent SQL Injection
$specification = mysql_real_escape_string($specification);

//build query
$query1 = "DELETE FROM user WHERE Username='$Username' AND specification='$specification'" ;
$qry_result1 = mysql_query($query1) or die(mysql_error());

?>