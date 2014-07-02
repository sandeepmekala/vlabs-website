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
$temp="";
$final_str="";
while($row4 = mysql_fetch_array($qry_result4))
{	
	$handle = fopen("assets/quiz/".$row4[$content], "r");
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			if($line[0] != "/"){
				$display_string .= $line;
			}
		}
	} else {
		// error opening the file.
	} 
	fclose($handle);
}


$questions = preg_split("#\n\s*\n#Uis",$display_string);
$qusts=array();
$titles=array();
$answers=array();
$correct_ans=array();
$allOptions=array();
$feedbacks=array();
$weigths=array();
$temp = "";
$m=0;
$display_string = "";
$qustsParts=array();
for($i=0;$i<count($questions);$i++){
	$questions[$i] = trim($questions[$i]);
	if(strlen($questions[$i]) > 1){
		$qusts[$m] = str_replace("\n", "", $questions[$i]);
		$qusts[$m] = $questions[$i];
		//$display_string .= "<div id=qus$m>$m $qusts[$m]</div><hr></hr>";
		$m++;
	}
}
for($i=0;$i<count($qusts);$i++){
	$ind=0;
	$title = "";$ansPart="";
	$qusts[$i] = trim($qusts[$i]);
	$p1=0;$p2=0;
	if($qusts[$i][0] ==":" || $qusts[$i][1] ==":"){
		preg_match('~::(.*?)::~',$qusts[$i],$output);
		$title = $output[1];
		$qusts[$i] = str_replace("::".$title."::","",$qusts[$i]);
	}
	//preg_match('~\{(.*?)\}~',$qusts[$i],$ans);
	$p1=strpos($qusts[$i],"{");
	$p2=strpos($qusts[$i],"}");
	$ansPart = substr($qusts[$i],$p1,$p2-$p1+1);
	if(strlen($qusts[$i]) == $p2+1)
		$qusts[$i] = str_replace($ansPart,"",$qusts[$i]);
	else
		$qusts[$i] = str_replace($ansPart,"________",$qusts[$i]);
	$ansPart = str_replace("{","",$ansPart);
	$ansPart = str_replace("}","",$ansPart);
	
	$titles[$i] = $title;
	$answers[$i] = $ansPart;
	$types[$i] = getQstType($answers[$i]);
	$display_string .='<form id="form" method="post" enctype="multipart/form-data" role="form" onsubmit="return evoluateQuiz();">';
	switch ($types[$i]) {
		//$qusts[$i] = trim($qusts[$i]);
		case "True_false":
			$temp = explode("#",$answers[$i]);
			if(count($temp)>=2){
				if($temp[0][0] == "T" || $temp[0][0] == "t"){
					$correct_ans[$i]="true";
					$allOptions[$i]="true";
				}
				else{
					$correct_ans[$i]="false";
					$allOptions[$i]="false";
				}
				$feedbacks[$i]=$temp[1];
			}else{
				if($temp[0][0] == "T" || $temp[0][0] == "t"){
					$correct_ans[$i]="true";
					$allOptions[$i]="true";
				}
				else{
					$correct_ans[$i]="false";
					$allOptions[$i]="false";
				}
				$feedbacks[$i]="!!!";
			}
			$weigths[$i]="!!!";
			$display_string .= '
			<label>
			'.($i+1).'. '.$qusts[$i].'
			</label>			
			<div class="radio">
			<label>
			<input type="radio" name=question'.($i+1).' id="radio"'.($i+1).' value="true">
			True
			</label>
			</div>
			<div class="radio">
			<label>
			<input type="radio" name=question'.($i+1).' id="radio"'.($i+1).' value="false">
			False
			  </label>
			</div>';
			/*$display_string .= '<div>'.$correct_ans[$i].'</div>';
			$display_string .= '<div>'.$allOptions[$i].'</div>';
			$display_string .= '<div>'.$feedbacks[$i].'</div>';
			$display_string .= '<div>'.$weigths[$i].'</div>';*/
			$display_string .='<hr></hr>';
			
			break;
		case "Multiple":
			$tempAllOptions="";
			$tempweight="";
			$tempfeedback="";
			$temp = explode("=",$answers[$i]);
			if(count($temp[0]) == 0){
				$temp2 = explode("~",$temp[1]);
				
				for($j=0;$j<count($temp2);$j++){
					$fdbk="";
					if (strpos($temp2[$j],"%") !== false) {
						preg_match('~%(.*?)%~',$temp2[$j],$output);
						$weight = $output[1];
						$temp2[$j] = str_replace("%".$weight."%","",$temp2[$j]);				
					}
					else
					{
						$weight="!!!";
					}
					//$parts=explode("#",$temp2[$j]);
					//$temp2[$j]=$parts[0];
					//$fdbk=$parts[1];
					if (strpos($temp2[$j],"#") !== false) {
						$p11=strpos($temp2[$j],"#");
						$fdbk .= substr($temp2[$j],$p11+1);
					}
					else{
						$fdbk .= "!!!";
					}
					$temp2[$j] = str_replace("#".$fdbk,"",$temp2[$j]);
					$tempAllOptions .= $temp2[$j]."@@@";
					$tempweight.=$weight."@@@";
					$tempfeedback.=$fdbk."@@@";
				}
				$correct_ans[$i]=$temp2[0];
				$allOptions[$i]=$tempAllOptions;
				$feedbacks[$i]=$tempfeedback;
				$weigths[$i]=$tempweight;
				
				$display_string .= '
					<label>
					'.($i+1).'. '.$qusts[$i].'
					</label>';
				$m=0;
				while($m<count($temp2)){
					$temp2[$m] = trim($temp2[$m]);
					$radio_value = str_replace(" ","####",$temp2[$m]);
					$display_string .= '
					<div class="radio">
					<label>
					<input type="radio" name=question'.($i+1).' id=radio'.($m+1).' value='.$radio_value.'>
					'.$temp2[$m].'
					</input>
					</label>
					</div>';
					$m++;
				}
				$display_string .= '<hr></hr>';
			}
			else{
				$temp3 = explode("~",$temp[0]);
				$temp4 = explode("~",$temp[1]);
				$result = array_merge($temp3,$temp4);
				for($j=0;$j<count($result);$j++){
					$fdbk="";
					if (strpos($result[$j],"%") !== false) {
						preg_match('~%(.*?)%~',$result[$j],$output);
						$weight = $output[1];
						$result[$j] = str_replace("%".$weight."%","",$result[$j]);
					}
					else
					{
					$weight="!!!";
					}
					//$parts=explode("#",$result[$j]);
					//$result[$j]=$parts[0];
					//$fdbk=$parts[1];
					if (strpos($result[$j],"#") !== false) {
						$p11=strpos($result[$j],"#");
						$fdbk .= substr($result[$j],$p11+1);
					}else{
						$fdbk .= "!!!";
					}
					$result[$j] = str_replace("#".$fdbk,"",$result[$j]);
					if($j==count($temp3)){
						$correct_ans[$i]=$result[$j];
					}
					$tempAllOptions.=$result[$j]."@@@";
					$tempweight.=$weight."@@@";
					$tempfeedback.=$fdbk."@@@";
				}
				$allOptions[$i]=$tempAllOptions;
				$feedbacks[$i]=$tempfeedback;
				$weigths[$i]=$tempweight;
				$m=1;
				
				$display_string .= '
					<label>
					'.($i+1).'. '.$qusts[$i].'
					</label>';
				while($m<count($result)){
					$result[$m] = trim($result[$m]);
					$radio_value = str_replace(" ","####",$result[$m]);
					$display_string .= '
					<div class="radio">
					<label>
					<input type="radio" name=question'.($i+1).' id=radio'.($m+1).' value='.$radio_value.'>
					'.$result[$m].'
					</input>
					</label>
					</div>';
					$m++;
				}
				$display_string .= '<hr></hr>';
				
			}
			break;
		case "Multiple_many":
				$correct_Options = "";
				$tempAllOptions="";
				$tempweight="";
				$tempfeedback="";
				$temp = explode("~",$answers[$i]);
				for($j=1;$j<count($temp);$j++){
					$fdbk="";
					if (strpos($temp[$j],"%") !== false) {
						preg_match('~%(.*?)%~',$temp[$j],$output);
						$weight = $output[1];
						$temp[$j] = str_replace("%".$weight."%","",$temp[$j]);
					}
					else
					{
						$weight="!!!";
					}
				
					if (strpos($temp[$j],"%") !== false) {
						$p11=strpos($temp[$j],"#");
						$fdbk = substr($temp[$j],$p11+1);
						$temp[$j] = str_replace("#".$fdbk,"",$temp[$j]);
					}
					else{
						$fdbk = "!!!";
					}
					$temp[$j] = trim($temp[$j]);
					$weight = trim($weight);
					$fdbk = trim($fdbk);
					$tempAllOptions.=$temp[$j]."@@@";
					if($weight > 0){
						$correct_Options.=$temp[$j]."@@@";
					}
					$tempweight.=$weight."@@@";
					$tempfeedback.=$fdbk."@@@";
				}	
				$correct_ans[$i]=$correct_Options;
				$allOptions[$i]=$tempAllOptions;
				$feedbacks[$i]=$tempfeedback;
				$weigths[$i]=$tempweight;
				
				$m=1;				
				$display_string .= '
					<label>
					'.($i+1).'. '.$qusts[$i].'
					</label>';
				while($m<count($temp)){
					$temp[$m] = trim($temp[$m]);
					$check_value = str_replace(" ","####",$temp[$m]);
					$display_string .= '
					<div class="radio">
					<label>
					<input type="checkbox" name=question'.($i+1).' id=checkbox'.($i+1).' value='.$check_value.'>
					'.$temp[$m].'
					</label>
					</div>';
					$m++;
				}
				$display_string .= '<div>'.$types[$i].'</div>';
				$display_string .= '<hr></hr>';
			break;
		case "Matching":
				$temp = explode("=",$answers[$i]);
				$temp2= array(count($temp)-1);
				$temp3= array(count($temp)-1);
				$st1="";
				$st2="";
				$st3="";
				$m=1;
				$display_string .= '
					<label>
					'.($i+1).'. '.$qusts[$i].'
					</label><br><br>';
				$option = '<option value="...">...</option>';
				while($m<count($temp)){
					$temp4 = explode("->",$temp[$m]);
					$temp2[$m-1] = $temp4[0];
					$temp2[$m-1] = trim($temp2[$m-1]);
					$temp3[$m-1] = $temp4[1];
					$temp3[$m-1] = trim($temp3[$m-1]);
					$st1 .= $temp2[$m-1]."$$";
					$st2 .= $temp3[$m-1]."$$";
					$m++;
				}

				shuffle($temp3);
				$m=0;
				while($m<count($temp3)){
					$select_value = str_replace(" ","####",$temp3[$m]);
					$option .= '<option value='.$select_value.'>'.$temp3[$m].'</option>';
					$m++;
				}
				
				$st3 = $st1."@@@".$st2;
				$correct_ans[$i]=$st3;
				$allOptions[$i]=$st3;
				$feedbacks[$i]="!!!@@@";
				$weigths[$i]="!!!@@@";
				$m=0;
				while($m<count($temp2)){
					$display_string .= '<div class="row"><div class="col-xs-6 col-md-4">'.$temp2[$m].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------></div><div class="col-xs-6 col-md-4"><select id=subject_name'.$m.' name=question'.($i+1).' class="form-control" style="width:300px;">'.$option.'</select></div></div>';
					$m++;
				}
				$display_string .= '<div>'.$types[$i].'</div>';
				$display_string .= '<hr></hr>';
			break;
		case "Numeric":
			$tempAllOptions="";
			$tempweight="";
			$tempfeedback="";
			$st1="!!!";$st2="!!!";$st3="!!!";$st4="";$st5="";$st6="";
			$answers[$i] = str_replace("#","",$answers[$i]);
			if (strpos($answers[$i],"=") !== false) {
				$temp = explode("=",$answers[$i]);
				for($j=1;$j<count($temp);$j++){
					if (strpos($temp[$j],"%") !== false) {
						preg_match('~%(.*?)%~',$temp[$j],$output);
						$weight = $output[1];
						$temp[$j] = str_replace("%".$weight."%","",$temp[$j]);
					}
					else
					{
						$weight="!!!";
					}
					if (strpos($temp[$j],"#") !== false) {
					
						$p11=strpos($temp[$j],"#");
						$fdbk = substr($temp[$j],$p11+1);
						$temp[$j] = str_replace("#".$fdbk,"",$temp[$j]);
					}
					else{
						$fdbk = "!!!";
					}
					if (strpos($temp[$j],":") !== false) {
						$temp2 = explode(":",$temp[$j]);
						$st1 = $temp2[0];
						$st2 = $temp2[1];
					}
					elseif (strpos($temp[$j],"..") !== false) {
						$temp3 = explode("..",$temp[$j]);
						$st1 = $temp3[0];
						$st3 = $temp3[1];
					}
					else{
						$st1 = $temp[$j];
					}
					$st1 = trim($st1);
					$st2 = trim($st2);
					$st3 = trim($st3);
					$st4 .= $st1."$$";
					$st5 .= $st2."$$";
					$st6 .= $st3."$$";
					$weight = trim($weight);
					$fdbk = trim($fdbk);
					$tempweight .= $weight."@@@";
					$tempfeedback .= $fdbk."@@@";
				}
				$tempAllOptions=$st4."@@@".$st5."@@@".$st6;
			}
			else{
				if (strpos($answers[$i],"%") !== false) {
					preg_match('~%(.*?)%~',$answers[$i],$output);
					$weight = $output[1];
					$answers[$i] = str_replace("%".$weight."%","",$answers[$i]);
				}
				else
				{
					$weight="!!!";
				}
				if (strpos($answers[$i],"#") !== false) {
					
					$p11=strpos($answers[$i],"#");
					$fdbk = substr($answers[$i],$p11+1);
					$answers[$i] = str_replace("#".$fdbk,"",$answers[$i]);
				}
				else{
					$fdbk = "!!!";
				}
				if (strpos($answers[$i],":") !== false) {
					$temp2 = explode(":",$answers[$i]);
					$st1 = $temp2[0];
					$st2 = $temp2[1];
				}
				elseif (strpos($answers[$i],"..") !== false) {
					$temp3 = explode("..",$answers[$i]);
					$st1 = $temp3[0];
					$st3 = $temp3[1];
				}
				else{
					$st1 = $answers[$i];
				}
				$st1 = trim($st1);
				$st2 = trim($st2);
				$st3 = trim($st3);
				$st4 .= $st1."$$";
				$st5 .= $st2."$$";
				$st6 .= $st3."$$";
				$weight = trim($weight);
				$fdbk = trim($fdbk);
				$tempAllOptions=$st4."@@@".$st5."@@@".$st6;
				$tempweight .= $weight."@@@";
				$tempfeedback .= $fdbk."@@@";
				
			}
			
			$correct_ans[$i]=$tempAllOptions;
			$allOptions[$i]=$tempAllOptions;
			$feedbacks[$i]=$tempfeedback;
			$weigths[$i]=$tempweight;
			$display_string .= '<div class="form-group">
					<label>'.($i+1).'. '.$qusts[$i].'</label>
					<input type="text" class="form-control" id=question'.($i+1).' style="width:300px;" value=""></input>
				</div>';
			//$display_string .= '<div>'.$types[$i].'</div>';
			/*$display_string .= '<div>'.$correct_ans[$i].'</div>';
			$display_string .= '<div>'.$allOptions[$i].'</div>';
			$display_string .= '<div>'.$feedbacks[$i].'</div>';
			$display_string .= '<div>'.$weigths[$i].'</div>';*/
			$display_string .= '<hr></hr>';
			break;
		case "Missing_word":
		case "Short_Answer":
				$tempAllOptions="";
				$tempweight="";
				$tempfeedback="";
				$temp = explode("=",$answers[$i]);
				for($j=1;$j<count($temp);$j++){
					$fdbk="";
					if (strpos($temp[$j],"%") !== false) {
						preg_match('~%(.*?)%~',$temp[$j],$output);
						$weight = $output[1];
						$temp[$j] = str_replace("%".$weight."%","",$temp[$j]);					
					}
					else
					{
						$weight="!!!";
					}
					if (strpos($temp[$j],"#") !== false) {
					
						$p11=strpos($temp[$j],"#");
						$fdbk = substr($temp[$j],$p11+1);
						$temp[$j] = str_replace("#".$fdbk,"",$temp[$j]);
					}
					else{
						$fdbk = "!!!";
					}
					$temp[$j] = trim($temp[$j]);
					$weight = trim($weight);
					$fdbk = trim($fdbk);
					$tempAllOptions.=$temp[$j]."@@@";
					$tempweight.=$weight."@@@";
					$tempfeedback.=$fdbk."@@@";
				}	
				$correct_ans[$i]=$tempAllOptions;
				$allOptions[$i]=$tempAllOptions;
				$feedbacks[$i]=$tempfeedback;
				$weigths[$i]=$tempweight;
				$display_string .= '<div class="form-group">
					<label>'.($i+1).'. '.$qusts[$i].'</label>
					<input type="text" class="form-control" id=question'.($i+1).' style="width:300px;" value=""></input>
				</div>';
				$display_string .= '<hr></hr>';
			break;
		default:
				
	}
}
$display_string .= "<div><button class='btn btn-primary' value='submit'>submit quiz</button></div>";
$display_string .= "</form>";

function getQstType($temp){
	$temp = trim($temp);
	$temp = trim($temp);
	//$temp = str_replace(" ","@",$temp);
	//$temp = str_replace("\n","@",$temp);
	//$i=0;
	$ch = $temp[0];
	/*while($ch == "@"){
		$i++;
		$ch = $temp[$i];		
	}*/
	switch ($ch) {
		case "#":
			return "Numeric";
		case "~":
			if (strpos($temp,"=") !== false) {
				return "Multiple";
			} else {
				return "Multiple_many";
			}
		case "}":
			return "Essay";
		case "t":
		case "T":
		case "F":
		case "f":
			return "True_false";
		case "=":
			if (strpos($temp,"~") !== false) {
				if (strpos($temp,"=") !== false) {
					return "Multiple";
				} else {
					return "Multiple_many";
				}
			} else if (strpos($temp,"->") !== false) {
				return "Matching";
			} else {
				return "Short_Answer";
			}
		default:
				return "Missing_word";
	}
}
for($i=0;$i<count($qusts);$i++){
	$temp="";
	$temp = $types[$i]."%%%".$qusts[$i]."%%%".$correct_ans[$i]."%%%".$allOptions[$i]."%%%".$feedbacks[$i]."%%%".$weigths[$i];
	$final_str .= $temp."###";
}

$my_file1=fopen("assets/quiz/".$sname.".txt",'w');
fwrite($my_file1,$final_str);
fclose($my_file1);
echo $display_string." SANSAN ".$final_str;
//echo $qusts[8];
//echo count($qusts)." ".count($questions);
?>