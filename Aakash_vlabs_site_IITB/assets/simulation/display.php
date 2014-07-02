<?php 
  
 $url = "../csvFiles/".$_GET['file'];
 
 $file = fopen($url,"r");
 $data =  fread($file, filesize($url));
 echo $data;
 fclose($file);

?>
