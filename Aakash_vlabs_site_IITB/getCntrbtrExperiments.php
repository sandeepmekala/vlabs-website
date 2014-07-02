<?php
include("db.php");

	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$Username = $_POST['Username'];
$specification = $_POST['specification'];
	// Escape User Input to help prevent SQL Injection
$Username = mysql_real_escape_string($Username);
$specification = mysql_real_escape_string($specification);
	//build query
$query = "SELECT * FROM experiment_details WHERE contributor='$Username'ORDER BY class_no";
$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
$display_string = "";
//<br><div class='btn-group'>
	//		  <button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Theory &nbsp;</button>
		//	  <button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Procedure &nbsp;</button>
			//  <button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Video &nbsp;</button>
			 // <button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Stimulation &nbsp;</button>
			 // <button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Quiz &nbsp;</button>
			  //<button type='button' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-link'></i> Resource &nbsp;</button>
			//</div>
// Insert a new row in the table for each person returned

while($row = mysql_fetch_array($qry_result)){
	if($row['status'] == "1"){
		$str = "Verified";
		$tmp = "label label-success";
	}
	else{
		$str = "Not Verified";
		$tmp = "label label-warning";
	}
	$display_string .= "<div class='row' style='border:1px solid #eee;padding:2% 0 3% 0;margin:0 0;'>
	<div class='col-md-1'>
		<img src='assets/img/$row[icon]' height='80px' width='100px'  style='padding:10px;'/>
	</div>
	<div class='col-md-9' style='padding-left:5%;' >
			<a href='experimentView.php?cls=$row[class_no]&sname=$row[subject_name]&ename=$row[name]'>&nbsp;&nbsp;&nbsp;$row[name]</a>
			<br><br>
			<p id='desc'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row[description]</p>
			<br><div class='btn-group'>
			<span class='label label-primary'>Class ".$row['class_no']."</span>
			<span class='label label-primary'>".$row['subject_name']."</span>
			<span class='label label-primary'>".$row['review_date']."</span>
			<span class='".$tmp."'>".$str." </span>
			</div>
	</div>
</div><br>";
	
}
echo $display_string;
?>

