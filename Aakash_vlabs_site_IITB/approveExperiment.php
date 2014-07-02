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
$review_date = $_POST['review_date'];
//$review_date = "2010-05-06";
	// Escape User Input to help prevent SQL Injection
$review_date = mysql_real_escape_string($review_date);
$class_no = $_POST['class_no'];
//$class_no=9;
	// Escape User Input to help prevent SQL Injection
$class_no = mysql_real_escape_string($class_no);
$subject_name = $_POST['subject_name'];
//$subject_name = "chemistry";
	// Escape User Input to help prevent SQL Injection
$subject_name = mysql_real_escape_string($subject_name);
$name = $_POST['name'];
//$name = "Distinguish Between Mixture and Compound";
	// Escape User Input to help prevent SQL Injection
$name = mysql_real_escape_string($name);

//build query
$query1 = "UPDATE experiment_details SET reviewer='$Username', review_date='$review_date', status='1' WHERE class_no='$class_no' AND subject_name='$subject_name' AND name='$name'" ;
$qry_result1 = mysql_query($query1) or die(mysql_error());
?>