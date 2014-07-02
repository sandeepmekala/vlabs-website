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

$table = $_POST['table'];
//$table = "contributer";
	// Escape User Input to help prevent SQL Injection
$table = mysql_real_escape_string($table);

//build query
$display_string="";
$query4 = "SELECT * FROM $table WHERE Username='$Username'" ;
$qry_result4 = mysql_query($query4) or die(mysql_error());
$rows = mysql_num_rows($qry_result4);
if($rows == 0)
{			
	$display_string = "ok";
}
else{
	$display_string = "no";
}
echo $display_string;
?>