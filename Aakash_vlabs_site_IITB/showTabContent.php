<?php
include("db.php");
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$cls = $_POST['cls'];
	// Escape User Input to help prevent SQL Injection
$cls = mysql_real_escape_string($cls);
$sname = $_POST['sname'];
	// Escape User Input to help prevent SQL Injection
$sname = mysql_real_escape_string($sname);
$ename = $_POST['ename'];
	// Escape User Input to help prevent SQL Injection
$ename = mysql_real_escape_string($ename);
$content = $_POST['content'];
	// Escape User Input to help prevent SQL Injection
$content = mysql_real_escape_string($content);

//build query
$query4 = "SELECT * FROM experiment_details WHERE subject_name='$sname' AND name='$ename' AND class_no='$cls'" ;
$display_string = "";
$qry_result4 = mysql_query($query4) or die(mysql_error());
while($row4 = mysql_fetch_array($qry_result4))
{	
	if($content == "video"){
		$myArray = explode('@@@', $row4[$content]);
		$len = sizeof($myArray);
		$i=0;
		while($i<$len){
			if($myArray[$i]!=""){
				$display_string .= '<br><div class="divContent" style="border:0px solid gray;padding-top:15px"><p style="text-align:center;"><iframe allowfullscreen="true" src='.$myArray[$i].' frameborder="0" height="360" width="640"></iframe></p></div><br>';
			}
			$i++;
		}
	}else if($content == "simulation"){
		$urls = explode('@@@', $row4[$content]);
		$display_string .= '<br><br><br><br><br><br><br><br><div class="divContent" style="border:0px solid gray;padding-top:15px"><p style="text-align:center;"><a href='.$urls[0].' target="_blank"><button class="btn btn-primary">Click to view Blender Simulation</button></a>&nbsp;&nbsp;<a href=http://localhost/newAakashSiteMergeUpload/assets/simulation/vlab2.php?file='.$urls[1].' target="_blank"><button class="btn btn-primary">&nbsp;Click to do guided Simulation&nbsp;</button></a></p></div><br>';
	}
	else{
		$display_string = "<center><iframe src='$row4[$content]' style='width:100%; height:1100px;' frameborder='0'></iframe></center> ";
	}
}

echo $display_string;
?>