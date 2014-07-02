<?php
include("db.php");
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

	// Escape User Input to help prevent SQL Injection
$name = mysql_real_escape_string($name);
$email = mysql_real_escape_string($email);
$subject = mysql_real_escape_string($subject);
$message = mysql_real_escape_string($message);

$query2 = "INSERT INTO contact (name, email, subject, message) VALUES ('$name','$email','$subject','$message')";
$qry_result2 = mysql_query($query2) or die(mysql_error());

if($qry_result2)
{
	echo "Thank you for your reply. We will get back to you soon.";
}
else{
	echo "Failed to upload. Please try again.";
}
?>
