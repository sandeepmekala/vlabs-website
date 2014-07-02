<?php
include("db.php");

$checksum = "3asdfa48uasdf2984kadsfasdhahsfakl";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$cls = $_GET['cls'];
	// Escape User Input to help prevent SQL Injection
$cls = mysql_real_escape_string($cls);
$sname = $_GET['sname'];
	// Escape User Input to help prevent SQL Injection
$sname = mysql_real_escape_string($sname);
$ename = $_GET['ename'];
	// Escape User Input to help prevent SQL Injection
$ename= mysql_real_escape_string($ename);

//build query
$query4 = "SELECT * FROM experiment_details WHERE subject_name='$sname' AND name='$ename' AND status='1'" ;
$display_string = "";
$qry_result4 = mysql_query($query4) or die(mysql_error());
$jsonStr2="";
while($row4 = mysql_fetch_array($qry_result4))
{			
	$jsonStr2 .= "[{ 
				\"checksum\" : \"$checksum\", 
				\"class_no\" : \"$cls\",
				\"subject_name\" : \"$sname\",
				\"exp_no\" : \"$row4[exp_no]\",
				\"theory\" : \"$row4[theory]\",
				\"name\" : \"$row4[name]\",
				\"proc\" : \"$row4[proc]\",
				\"video\" : [";
				
				$myArray = explode('@@@', $row4['video']);
				$count = 0;
				foreach ($myArray as &$value) {
					$jsonStr2 .="{\"vid\":\"$value\"}";
					if($count != count($myArray) -1 ) $jsonStr2 .= ",";
					$count++;
				}
	$jsonStr2 .="],
				\"simulation\" : \"$row4[simulation]\",
				\"quiz\" : \"$row4[quiz]\",
				\"resource\" : \"$row4[resource]\"
				}]";
}

$my_file2=fopen("file.json",'w');
fwrite($my_file2,$jsonStr2);
fclose($my_file2);

echo $jsonStr2;
?>
