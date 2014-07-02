<?php
include("db.php");
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$Username = $_POST['Username'];
//$Username = "sam";
	// Escape User Input to help prevent SQL Injection
$Username = mysql_real_escape_string($Username);
$Password = $_POST['Password'];
//$Password = "sam";
	// Escape User Input to help prevent SQL Injection
$Password = mysql_real_escape_string($Password);

$table = $_POST['table'];
//$table = "reviewer";
	// Escape User Input to help prevent SQL Injection
$table = mysql_real_escape_string($table);

//build query
/*$query1 = "SELECT * FROM user WHERE Username='$Username' AND specification='$table'" ;
$qry_result1 = mysql_query($query1) or die(mysql_error());
$rows1 = mysql_num_rows($qry_result1);*/

$display_string="";
$query4 = "SELECT * FROM $table WHERE Username='$Username' AND Password='$Password'" ;
$qry_result4 = mysql_query($query4) or die(mysql_error());
$rows4 = mysql_num_rows($qry_result4);
if($rows4 == 0)
{			
	$display_string = "no";
}
else{
	$query2 = "INSERT INTO user (Username, specification) VALUES ('$Username','$table')";
	$qry_result2 = mysql_query($query2) or die(mysql_error());
	$display_string = "ok";
}
echo $display_string;
?>