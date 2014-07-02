<?php
if(is_array($_FILES)) {
	$sourcePath = $_FILES['icon']['tmp_name'];
	$sourcePath2 = $_FILES['quiz']['tmp_name'];
	if((is_uploaded_file($_FILES['icon']['tmp_name']))&&(is_uploaded_file($_FILES['quiz']['tmp_name']))) {
		$targetPath = "assets/img/".$_FILES['icon']['name'];
		$targetPath2 = "assets/quiz/".$_FILES['quiz']['name'];
		if((move_uploaded_file($sourcePath,$targetPath))&&(move_uploaded_file($sourcePath2,$targetPath2))) {
		}
	}
}
?>