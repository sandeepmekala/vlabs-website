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

//build query
$jsonStr2 = "[{ \"checksum\" : \"$checksum\",
\"class_no\" : \"$cls\",
\"subject\" : [";
$subArr = array("physics","chemistry","biology","mathematics");
$display_string = "";
for ($i = 0; $i <= 3; $i++) {
	$query4 = "SELECT * FROM experiment_details WHERE subject_name='$subArr[$i]' AND class_no='$cls' AND status='1'" ;
	$qry_result4 = mysql_query($query4) or die(mysql_error());
	$jsonStr2.="
	{
	\"subject_name\" : \"$subArr[$i]\",
	\"exps\" : [";
	$count = 0; $count1 = mysql_num_rows($qry_result4);
	while($row4 = mysql_fetch_array($qry_result4))
	{			
		$jsonStr2.="
		{
		\"name\" : \"$row4[name]\",
		\"exp_no\" : \"$row4[exp_no]\",
		\"description\" : \"$row4[description]\",
		\"thumb\" : \"$row4[icon]\"
		}";
		
		if($count!=$count1-1) $jsonStr2 .= ",";
		
		$count++;
	}
						
	$jsonStr2.="
		]
	}";
	if($i!=3) $jsonStr2 .= ",";
}
$jsonStr2.="
]
}]";

$my_file2=fopen("file2.json",'w');
fwrite($my_file2,$jsonStr2);
fclose($my_file2);

echo $jsonStr2;
?>