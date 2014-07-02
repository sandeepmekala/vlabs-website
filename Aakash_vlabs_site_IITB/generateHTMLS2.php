<?php
include("db.php");
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$name = $_POST['name'];
$subject_name = $_POST['subject_name'];
$class_no = $_POST['class_no'];
$description = $_POST['description'];
$theory = $_POST['theory'];
$proc = $_POST['proc'];
$video = $_POST['video'];
$simulation = $_POST['simulation'];
$quiz = $_POST['quiz'];
$resource = $_POST['resource'];
$icon = $_POST['icon'];
$Username = $_POST['Username'];

	// Escape User Input to help prevent SQL Injection
$name = mysql_real_escape_string($name);
$subject_name = mysql_real_escape_string($subject_name);
$class_no = mysql_real_escape_string($class_no);
$description = mysql_real_escape_string($description);
$theory = mysql_real_escape_string($theory);
$proc = mysql_real_escape_string($proc);
$video = mysql_real_escape_string($video);
$simulation = mysql_real_escape_string($simulation);
$quiz = mysql_real_escape_string($quiz);
$resource = mysql_real_escape_string($resource);
$icon = mysql_real_escape_string($icon);
$Username = mysql_real_escape_string($Username);

function modify($str){
$needle = '<img src="data:image/';
$lastPos = 0;
$positions = array();
$str2 = "";

while (($lastPos = strpos($str, $needle, $lastPos))!== false) {
    $positions[] = $lastPos+21;
    $lastPos = $lastPos + strlen($needle);
}
$i=0;
$temp = 0;
$length = strlen($str);
while($i<$length){
	$chr = $str{$i};
	if(in_array($i, $positions)){
		$temp = 1;
	}
	if($temp == 1){
		if($chr == " "){
			$chr = "+";
		}
		elseif($chr == '"'){
			$temp = 0;
		}
	}
	$str2 .= $chr;
	$i++;
}
return $str2;
}

$theory2 = modify(str_replace('\n', ' ', str_replace('\"', '"', mb_convert_encoding($theory,'HTML-ENTITIES','utf-8'))));
$proc2 = modify(str_replace('\n', ' ', str_replace('\"', '"', mb_convert_encoding($proc,'HTML-ENTITIES','utf-8'))));
$resource2 = modify(str_replace('\n', ' ', str_replace('\"', '"', mb_convert_encoding($resource,'HTML-ENTITIES','utf-8'))));

$my_file1=fopen("assets/theory/".$name.".html",'w');
fwrite($my_file1,$theory2);
fclose($my_file1);
$my_file2=fopen("assets/proc/".$name.".html",'w');
fwrite($my_file2,$proc2);
fclose($my_file2);
$my_file3=fopen("assets/resource/".$name.".html",'w');
fwrite($my_file3,$resource2);
fclose($my_file3);

//build query
$query1 = "SELECT * FROM experiment_details WHERE subject_name='$subject_name'";
$qry_result1 = mysql_query($query1) or die(mysql_error());
$exp_no = mysql_num_rows($qry_result1)+1;

$query2 = "INSERT INTO experiment_details (class_no, subject_name, exp_no, name,description,theory,proc,video,simulation,quiz,resource,contributor,status,reviewer,review_date,icon) VALUES ('$class_no','$subject_name','$exp_no','$name','$description','assets/theory/$name.html','assets/proc/$name.html','$video','$simulation','$quiz','assets/resource/$name.html','$Username','0','','0000-00-00','$icon')";

$qry_result2 = mysql_query($query2) or die(mysql_error());

/*if($qry_result2)
{
	echo "Uploaded successfully...";
}
else{
	echo "Failed to upload. Please try again...";
}*/	
echo $resource2;
?>
