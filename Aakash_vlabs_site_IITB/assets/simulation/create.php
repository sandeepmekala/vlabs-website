<?php
	$data = trim($_POST['data']);
	//print_r($_POST);
	$dt = date("Y-m-d");
	$tm = time();
	$fname = "media".$dt."-".$tm.".csv";
	if(strlen($data) == 0 ) echo "Input empty";
	else {
		$file = fopen("../csvFiles/".$fname,"w");
		if(fwrite($file,$data)){
			echo $fname;
		}
		else echo "Unable to create csv file";
		fclose($file);
	}
?>
