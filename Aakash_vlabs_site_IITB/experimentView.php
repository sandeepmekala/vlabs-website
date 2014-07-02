<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16"> 
    <title>Aakash Vlabs v1.0 - Third Page</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style>
		.bs-callout{margin:10px 0 15px 0;padding:5px 5px 5px 10px;border-left:3px solid #eee}.bs-callout h4{margin-top:0;margin-bottom:5px}.bs-callout p:last-child{margin-bottom:0}.bs-callout code{background-color:#fff;border-radius:3px}.bs-callout-danger{background-color:#fdf7f7;border-color:#d9534f}.bs-callout-danger h4{color:#d9534f}.bs-callout-warning{background-color:#fcf8f2;border-color:#f0ad4e}.bs-callout-warning h4{color:#f0ad4e}.bs-callout-info{background-color:#f4f8fa;border-color:#5bc0de}.bs-callout-info h4{color:#5bc0de}
    </style>
	
	</head>
	<body onLoad = "fetchExpList();generateJSON2();showTabContent('theory');updateSignIn();">
	<script language="javascript" type="text/javascript">
	<!--
	/////////////////////////
	///////Answer////////////
	/////////////////////////
	
	var all_ques;
	var each_ques;
	var user_ans = [];
	var summary = "<h3 align='center' >Questions and Answers</h3><table class='table'>";
	
	/////////////////////////////
	
	var gift_string="";
	function generateJSON2(){
		var cls = "<?php echo $_GET['cls'];?>";
		var sname = "<?php echo $_GET['sname'];?>";
		var ename = "<?php echo $_GET['ename'];?>";
		var ajaxRequest;  // The variable that makes Ajax possible!

		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		 
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var str = ajaxRequest.responseText;
			  //var ajaxDisplay = document.getElementById('cls');
			  //ajaxDisplay.innerHTML = cls;
			  obj = eval('(' +str+ ')');
       		  //var objCount=0;
			  //for(_obj in obj) objCount++;
		      //alert(obj.length);
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 //var queryString = "cls="+cls+"&sname="+sname+"&ename="+ename;
		 ajaxRequest.open("GET", "generateJSON2.php?"+"cls="+cls+"&sname="+sname+"&ename="+ename, true);
		 //ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 //ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 //ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send();
	}
	function showTabContent(content){
		var cls = "<?php echo $_GET['cls'];?>";
		var sname = "<?php echo $_GET['sname'];?>";
		var ename = "<?php echo $_GET['ename'];?>";
		var ajaxRequest;  // The variable that makes Ajax possible!
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		 
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var ajaxDisplay = document.getElementById('list_exp');
			  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 //var sub = document.getElementById('sub').value;
		 var queryString = "cls="+cls+"&sname="+sname+"&ename="+ename+"&content="+content;
		 ajaxRequest.open("POST", "showTabContent.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
	
	function showQuizContent(content){
		var cls = "<?php echo $_GET['cls'];?>";
		var sname = "<?php echo $_GET['sname'];?>";
		var ename = "<?php echo $_GET['ename'];?>";
		var ajaxRequest;  // The variable that makes Ajax possible!
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		 
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var ajaxDisplay = document.getElementById('list_exp');
			  //ajaxDisplay.innerHTML = ajaxRequest.responseText;
			  var str = ajaxRequest.responseText;
			  //var patrn = "\n\n";
			  var arr = str.split('SANSAN');
			  ajaxDisplay.innerHTML = arr[0];
			  gift_string = arr[1];
			  //alert(arr[1]);			  
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 //var sub = document.getElementById('sub').value;
		 var queryString = "cls="+cls+"&sname="+sname+"&ename="+ename+"&content="+content;
		 ajaxRequest.open("POST", "showQuizContent.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
	function isInArray(array, search)
	{
		return (array.indexOf(search) >= 0) ? true : false; 
	}
	function evoluateQuiz(){
		
		////////////////////////////
		////////////////////////////
		all_ques = gift_string.split("###");
		each_ques = new Array(all_ques.length);
		for(var i=0;i<all_ques.length;i++) {
			each_ques[i] = all_ques[i].split("%%%");
			for(var j=0;j<each_ques[i].length;j++) {
				each_ques[i][j] = each_ques[i][j].trim();
				if(each_ques[i][j].contains("@@@")){
					each_ques[i][j] = each_ques[i][j].split("@@@");
					for(var k=0;k<each_ques[i][j].length;k++) {
						each_ques[i][j][k] = each_ques[i][j][k].trim();
						if(each_ques[i][j][k].contains("$$")){
							each_ques[i][j][k] = each_ques[i][j][k].split("$$");
						}
					}
				}
			}
		}
		
		alert("quiz submited");
		var correct_code = '<small style="color:green;">Correct</small>';
		var partial_correct_code = '<small style="color:orange;">Partially Correct</small>';
		var wrong_code = '<small style="color:red;">Wrong</small>';
		var not_answer_code = '<small style="color:blue;">Not Answered</small>';
		var correct_qns = 0;
		var wrong_qns = 0;
		var not_answered = 0;
		var partial_correct_qns = 0;
		var grand_total = 0;
		for(var i=0;i<all_ques.length-1;i++){    ///remember i is used
			var code_str = "";
			var qns_points = 0.0;
			var fdbk = "";
			var feedbacks = [];
			switch(each_ques[i][0]){
				case "True_false":
					
					var temp_str = "";
					var radio_ans = document.getElementsByName("question"+(i+1));
					for(var j=0;j<radio_ans.length;j++) {
						if(radio_ans[j].checked == true) {
							temp_str += radio_ans[j].value;
							temp_str = temp_str.toString();
							//temp_str = ucfirst(temp_str);
							break;
						}
					}
					if(temp_str == ""){
						not_answered++;
						code_str = not_answer_code;
					}else{
						if(each_ques[i][2] == temp_str){
						
							qns_points = 100.0;
							correct_qns++;
							grand_total = grand_total + 100;
							code_str = correct_code;						
						}
						else{						
							qns_points = 0.0;
							wrong_qns++;
							code_str = wrong_code;
						}
					}
					
					if(temp_str == ""){
						fdbk = "---";
					}else{
						if(each_ques[i][4] == "!!!"){
							fdbk = "#No feed back is provided."
						}else{
							fdbk = each_ques[i][4];
						}
					}
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+each_ques[i][2]+" </b></td><td style='text-align:right; padding-right:2%;'>"+temp_str+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break;
				
				case "Multiple":
				
					var temp_str = "";
					var radio_ans = document.getElementsByName("question"+(i+1));
					for(var j=0;j<radio_ans.length;j++) {
						if(radio_ans[j].checked == true) {
							temp_str += radio_ans[j].value;
							temp_str = temp_str.replace(/####/g,' ');
							break;
						}
					}
					
					if(temp_str == ""){
						not_answered++;
						code_str = not_answer_code;
						fdbk = "---";
					}else{
						if(each_ques[i][2] == temp_str){
						
							qns_points = 100.0;
							correct_qns++;
							grand_total = grand_total + 100;
							code_str = correct_code;						
						}
						else{						
							qns_points = 0.0;
							wrong_qns++;
							code_str = wrong_code;
						}
						
						if(each_ques[i][4][j+1] == "!!!"){
							fdbk = "#No feed back is provided."
						}else{
							fdbk = each_ques[i][4][j+1];
						}
					}					
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+each_ques[i][2]+"</b> </td><td style='text-align:right; padding-right:2%;'>"+temp_str+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break
					
				case "Multiple_many":
					
					var temp_str = "";
					var temp_str2 = "";
					var check_ans = document.getElementsByName("question"+(i+1));
					for(var j=0;j<check_ans.length;j++) {
						if(check_ans[j].checked == true) {
							temp_str2 = check_ans[j].value;
							temp_str2 = temp_str2.replace(/####/g,' ');
							temp_str += temp_str2 + "@@@";
						}
					}
					var options_array = temp_str.split("@@@");
					if(temp_str == ""){
						not_answered++;
						code_str = not_answer_code;
						fdbk = "---";
					}else{
						var temp_points = 0;
						var fdbk = "";
						var l;
						var flag = 0;
						for(var k=0;k<options_array.length-1;k++){
							if(isInArray(each_ques[i][2],options_array[k])){
								for(l=0;l<each_ques[i][3].length-1;l++){
									if(each_ques[i][3][l] == options_array[k]){
										flag += 1;
										if(each_ques[i][4][l] == "!!!")
											fdbk += "#No feed back is provided, ";
										else
											fdbk += each_ques[i][4][l]+", ";
										break;
									}				
								}
								if(each_ques[i][5][l] == "!!!"){
									each_ques[i][5][l] = 0;
								}
								temp_points += parseFloat(each_ques[i][5][l]);
							}else{
								for(l=0;l<each_ques[i][3].length-1;l++){
									if(each_ques[i][3][l] == options_array[k]){
										if(each_ques[i][4][l] == "!!!")
											fdbk += "#No feed back is provided, ";
										else
											fdbk += each_ques[i][4][l]+", ";
										break;
									}				
								}
								if(each_ques[i][5][l] == "!!!"){
									//alert(each_ques[i][5][l]);
									each_ques[i][5][l] = -50;
								}
								temp_points += parseFloat(each_ques[i][5][l]);
							}
						}
						
						if(options_array.length-1 == flag){
							qns_points = 100.0;
							correct_qns++;
							code_str = correct_code;	
						}else if(flag == 0){
							qns_points = temp_points;
							wrong_qns++;
							code_str = wrong_code;
						}else{						
							qns_points = temp_points;
							partial_correct_qns++;
							code_str = partial_correct_code;
						}
						grand_total = grand_total + qns_points;
					}					
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+each_ques[i][2]+"</b></td><td style='text-align:right; padding-right:2%;'>"+options_array+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break;
					
				case "Matching":
				
					var temp_str = "";
					var temp_str2 = "";
					var select_ans = document.getElementsByName("question"+(i+1));
					for(var j=0;j<select_ans.length;j++) {
						//if(select_ans[j].options[select_ans[j].selectedIndex].value != "...") {
							temp_str2 = select_ans[j].options[select_ans[j].selectedIndex].value;
							temp_str2 = temp_str2.replace(/####/g,' ');
							temp_str += temp_str2 + "@@@";
						//}
					}
					var flag = 0;
					var options_array = temp_str.split("@@@");
					for(var m=0; m<options_array.length-1;m++){
						if(options_array[m] == "...")
							flag++;
					}
					if(flag == options_array.length-1){
						not_answered++;
						code_str = not_answer_code;
						fdbk = "---";
					}else{
						var flag = 0;
						for(var k=0;k<options_array.length-1;k++){
							if(each_ques[i][2][1][k] == options_array[k]){
								flag++;
							}
						}
						
						if(options_array.length-1 == flag){
							qns_points = 100.0;
							correct_qns++;
							grand_total = grand_total + 100;
							code_str = correct_code;						
						}
						else{			
							qns_points = 0.0;
							wrong_qns++;
							code_str = wrong_code;
						}
						fdbk = "#No feed back is provided.";
					}
					
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+each_ques[i][2][1]+"</b></td><td style='text-align:right; padding-right:2%;'>"+options_array+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break;
					
				case "Numeric":
				
					var temp_str = "";
					var crt_ans = "";
					temp_str = document.getElementById("question"+(i+1)).value;
					if(temp_str == ""){
						not_answered++;
						code_str = not_answer_code;
						fdbk = "---";
					}else{
						var temp = 0;
						temp_str = parseFloat(temp_str);
						for(var m=0; m<each_ques[i][2][1].length-1;m++){
							if(each_ques[i][2][1][m] != "!!!"){
								//alert(each_ques[i][2][0][m]+" "+each_ques[i][2][1][m]);
								if(temp_str >= (parseFloat(each_ques[i][2][0][m])-parseFloat(each_ques[i][2][1][m])) && temp_str <= (parseFloat(each_ques[i][2][0][m])+parseFloat(each_ques[i][2][1][m]))){
									temp=1;
									break;
								}else{
									temp=0;
								}
							}
							else if(each_ques[i][2][2][m] != "!!!"){
								//alert("done_elseif");
								if(temp_str >= parseFloat(each_ques[i][2][0][m]) && temp_str <= parseFloat(each_ques[i][2][2][m])){
									temp=1;
									break;
								}else{
									temp=0;
								}
							}
							else{
								//alert("done_else");
								if(each_ques[i][2][0][m] == temp_str){
									temp = 1;
									break;
								}else{
									temp=0;
								}
							}
						}
						if(temp == 1){								
							correct_qns++;
							if(each_ques[i][5][m] == "!!!"){
								grand_total = grand_total + 100;
								qns_points = 100.0;
							}
							else{
								grand_total = grand_total + parseFloat(each_ques[i][5][m]);
								qns_points = parseFloat(each_ques[i][5][m]);
							}
							code_str = correct_code;								
						}else{
							qns_points = 0.0;
							wrong_qns++;
							code_str = wrong_code;
						}
						
						for(m=0;j<each_ques[i][2][0].length-1;m++){
							if(temp_str >= (each_ques[i][2][0][m]-each_ques[i][2][1][m]) && temp_str <= (each_ques[i][2][0][m]+each_ques[i][2][1][m])){
								break;
							}else if(temp_str >= each_ques[i][2][0][m] && temp_str <= each_ques[i][2][2][m]){
								break;
							}
						}
						if(each_ques[i][4][m] == "!!!"){
							fdbk = "#No feed back is provided."
						}else{
							fdbk = each_ques[i][4][m];
						}
					}
					for(var m=0; m<each_ques[i][2][1].length-1;m++){
						if(each_ques[i][2][1][m] != "!!!"){
							crt_ans += each_ques[i][2][0][m] + "  +/- "+ each_ques[i][2][1][m]+", ";
						}else if(each_ques[i][2][2][m] != "!!!"){
							crt_ans += each_ques[i][2][0][m] + "  to "+ each_ques[i][2][2][m]+", ";
						}else{
							crt_ans += each_ques[i][2][0][m]+", ";
						}
					}
					for(var m=0; m<each_ques[i][2][1].length-1;m++){
						
					}
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+crt_ans+"</b></td><td style='text-align:right; padding-right:2%;'>"+temp_str+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break;
					
				case "Missing_word":
				case "Short_Answer":
				
					var temp_str = "";
					temp_str = document.getElementById("question"+(i+1)).value;
					
					if(temp_str == ""){
						not_answered++;
						code_str = not_answer_code;
						fdbk = "---";
					}else{
						if(isInArray(each_ques[i][2],temp_str)){
						
							qns_points = 100.0;
							correct_qns++;
							grand_total = grand_total + 100;
							code_str = correct_code;						
						}
						else{						
							qns_points = 0.0;
							wrong_qns++;
							code_str = wrong_code;
						}
						for(j=0;j<each_ques[i][3].length-1;j++){
							if(each_ques[i][3][j] == temp_str){
								break;
							}
							
						}
						if(each_ques[i][4][j] == "!!!"){
							fdbk = "#No feed back is provided."
						}else{
							fdbk = each_ques[i][4][j];
						}
					}
					
					user_ans.push(temp_str);
					summary += "<tr class='info'><th>Question "+(i+1)+" &raquo; "+code_str+"</th><th style='text-align:right; padding-right:2%;'> "+qns_points/100+" pt </th></tr><tr><td colspan='2'>"+each_ques[i][1]+"</td></tr><tr><td>Correct Answers: </td><td style='text-align:right; padding-right:2%;'>Your Answers:</td></tr><tr><td style='color:green;'><b>"+each_ques[i][2]+"</b></td><td style='text-align:right; padding-right:2%;'>"+temp_str+"</td></tr><tr><td>Feedback: </td><td style='text-align:right; padding-right:2%; color:blue'>"+fdbk+"</td></tr>";
					break;
					
				default:
					user_ans.push("Not supporting");
					break;
			}
			
		}
		summary += "</table><br><br><h3 align='center' >Summary of Quiz Question</h3><table class='table table-bordered'><tr class='active'><th width='70%'>Total Questions </th><td width='30%'>"+(all_ques.length-1)+"</td></tr><tr class='active'><th>Correct Questions </th><td >"+correct_qns+"</td></tr><tr class='active'><th>Wrong Questions </th><td>"+wrong_qns+"</td> </tr><tr class='active'><th>Partial Correct Questions </th><td>"+partial_correct_qns+"</td></tr><tr class='active'><th>Not Answered Questions </th><td>"+not_answered+"</td></tr><tr class='success'><th>Grand Total </th><td>"+grand_total/100+" pt</td> </tr></table>";
		
		var ajaxDisplay = document.getElementById('list_exp');
		ajaxDisplay.innerHTML = summary;
		return false;	
		///////////////////////////////
		///////////////////////////////
		
	}
	function fetchExpList(){
		var ajaxRequest;  // The variable that makes Ajax possible!
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		 
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var str = ajaxRequest.responseText;
			  var res = str.split("/");
			  var ajaxDisplay1 = document.getElementById('item1');
			  var ajaxDisplay2 = document.getElementById('item2');
			  var ajaxDisplay3 = document.getElementById('item3');
			  var ajaxDisplay4 = document.getElementById('item4');
			  ajaxDisplay1.innerHTML = res[0];
			  ajaxDisplay2.innerHTML = res[1];
			  ajaxDisplay3.innerHTML = res[2];
			  ajaxDisplay4.innerHTML = res[3];
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 //var sub = document.getElementById('sub').value;
		 var queryString = "";
		 ajaxRequest.open("POST", "fetchExpList.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
	//Browser Support Code
	function fetchExperiments(subject){
	 var ajaxRequest;  // The variable that makes Ajax possible!

	 try{
	   // Opera 8.0+, Firefox, Safari
	   ajaxRequest = new XMLHttpRequest();
	 }catch (e){
	   // Internet Explorer Browsers
	   try{
		  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
	   }catch (e) {
		  try{
			 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		  }catch (e){
			 // Something went wrong
			 alert("Your browser broke!");
			 return false;
		  }
	   }
	 }
	 // Create a function that will receive data 
	 // sent from the server and will update
	 // div section in the same page.
	 ajaxRequest.onreadystatechange = function(){
	   if(ajaxRequest.readyState == 4){
		  var ajaxDisplay = document.getElementById('list_exp');
		  var ajaxDisplay2 = document.getElementById('show_info');
		  var ajaxDisplay3 = document.getElementById('show_info2');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  ajaxDisplay2.innerHTML = subject;
		  ajaxDisplay3.innerHTML = "List of Experiments:";
	   }
	 }
	 // Now get the value from user and pass it to
	 // server script.
	 //var sub = document.getElementById('sub').value;
	 var cls = "<?php echo $_GET['cls'];?>";
	 var sub = subject;
	 var queryString = "cls=" + cls+"&sub=" + sub;
	 ajaxRequest.open("POST", "fetchExperiments2.php", true);
	 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 ajaxRequest.setRequestHeader("Content-length",queryString.length);
	 ajaxRequest.setRequestHeader("Connetion","close");
	 ajaxRequest.send(queryString); 
	}
	//-->

	</script>
	<script language="javascript" type="text/javascript">
	function updateSignIn(){
		var ajaxRequest;  // The variable that makes Ajax possible!
		var Username="";
		var specification="";
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		 if (typeof(Storage) != "undefined") {
			// Retrieve
			Username = localStorage.getItem("Username");
			specification = localStorage.getItem("specification");
			////alert(Username+ '  '+specification);
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var ajaxDisplay = document.getElementById('header_part');
			    //alert("updated");
			  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "Username=" + Username+"&specification="+specification;
		 ajaxRequest.open("POST", "getUser.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}

	function logout(){
		var ajaxRequest;  // The variable that makes Ajax possible!
			
		if (typeof(Storage) != "undefined") {
			// Retrieve
			Username = localStorage.getItem("Username");
			specification = localStorage.getItem("specification");
			////alert(Username+ '  '+specification);
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
			  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
			  try{
				 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			  }catch (e){
				 // Something went wrong
				 alert("Your browser broke!");
				 return false;
			  }
		   }
		 }
		
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var ajaxDisplay = document.getElementById('header_part');
			    //alert("logout");
				if (typeof(Storage) != "undefined") {
					localStorage.setItem("Username", "");
					localStorage.setItem("specification", "");
				} else {
					alert("Sorry, your browser does not support Web Storage...");
				}
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "Username=" + Username+"&specification="+specification;
		 ajaxRequest.open("POST", "logout.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
   </script>
	<div id="header_part">
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" href="index.php"> <i class="glyphicon glyphicon-home"></i>  &nbsp;Aakash Vlab <small>v1.0</small></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right">
		  <ul class="nav navbar-nav">
			<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-wrench"></i> Change Class</a></li>
			<li><a href="signIn.php"><i class="glyphicon glyphicon-user"></i> Sign In</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				  <i class="glyphicon glyphicon-fire"></i> About <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
      				<li><a href="contributorReg.php"><i class="glyphicon glyphicon-registration-mark"></i> &nbsp;Contributor Registration</a></li>
					<li><a href="reviewerReg.php"><i class="glyphicon glyphicon-hand-up"></i> &nbsp;Reviewer Registration</a></li>
					<li class="divider"></li>
					<li><a href="contactUs.php"><i class="glyphicon glyphicon-earphone"></i> &nbsp;Contact Us</a></li>
					<li class="divider"></li>
					<li><a href="aboutFAQs.php"><i class="glyphicon glyphicon-question-sign"></i> &nbsp;FAQs</a></li>
					<li class="divider"></li>
					<li><a href="aboutUs.php"><i class="glyphicon glyphicon-exclamation-sign"></i> &nbsp;About Us</a></li>
				</ul>
			</li>
			
		  </ul>
		</div>
	  </div>
	</nav>
	</div>
	
	<div class="container" >
		
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-primary">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><i class="glyphicon glyphicon-exclamation-sign"></i> &nbsp; Info</div>
				  <!-- List group -->
				  <ul class="list-group">
					<li class="list-group-item"><i class="glyphicon glyphicon-plane"></i> &nbsp; Class <span class="badge">9</span></li>
					<li class="list-group-item"><i class="glyphicon glyphicon-bell"></i> &nbsp; Subjects <span class="badge">4</span></li>
					<li class="list-group-item"><i class="glyphicon glyphicon-signal"></i> &nbsp; Experiment  <span class="badge">10</span></li>
					
				  </ul>
				</div>
				<div class="panel panel-primary">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><i class="glyphicon glyphicon-bell"></i> &nbsp; Subjects</div>
				  <!-- List group -->
				  <ul class="list-group">
					<li class="list-group-item"><a href="#" onclick='fetchExperiments("physics");'><i class="glyphicon glyphicon-star"></i> &nbsp; Physics</a> <span id='item1' class="badge">0</span></li>
					<li class="list-group-item"><a href="#" onclick='fetchExperiments("chemistry");'><i class="glyphicon glyphicon-hand-right"></i> &nbsp; Chemistry</a><span id='item2' class="badge">0</span></li>
					<li class="list-group-item"><a href="#" onclick='fetchExperiments("biology");'><i class="glyphicon glyphicon-flash"></i> &nbsp; Biology</a> <span id='item3' class="badge">0</span></li>
					<li class="list-group-item"><a href="#" onclick='fetchExperiments("mathematics");'><i class="glyphicon glyphicon-record"></i> &nbsp; Maths</a> <span id='item4' class="badge">0</span></li>
				  </ul>
				</div>
			</div>
			<div class="col-md-9" ><!-- start of content -->
				
				<div id="show_info" class="bs-callout bs-callout-warning" style="font-size:16px;">
					<?php echo $_GET['ename'];?>
				</div><br>
				<div  id="show_info2">
					<ul class="nav nav-tabs">
					  <li ><a href="experimentPage.php?cls=<?php echo $_GET['cls'];?>">Go Back</a></li>
					  <li class="pull-right"><a onClick = showTabContent('resource') href="#" data-toggle="tab">Resources</a></li>
					  <li class="pull-right"><a onClick = showQuizContent('quiz') href="#" data-toggle="tab">Quiz</a></li>
					  <li class="pull-right"><a onClick = showTabContent('simulation') href="#" data-toggle="tab">Simulation</a></li>
					  <li class="pull-right"><a onClick = showTabContent('video') href="#" data-toggle="tab">Videos</a></li>
					  <li class="pull-right"><a onClick = showTabContent('proc') href="#" data-toggle="tab">Procedure</a></li>
					  <li class="active pull-right"><a onClick = showTabContent('theory') href="#" data-toggle="tab">Theory</a></li>
					</ul>
				</div>

				<br>
				<!-- Tab panes -->
				<div id="list_exp" class="tab-content" style="min-height:1100px;">
					
				</div>
			</div>
		</div>
	</div>  
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog ">
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h5 class="modal-title"><b>Change yOuR cLasS </b></h5>
			</div>
			<form action="experimentPage.php" style="padding:10px;" role="form">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-9">
						<select name="cls" class="form-control">
							<option value="5">Class 5</option>
							<option value="6">Class 6</option>
							<option value="7">Class 7</option>
							<option value="8">Class 8</option>
							<option value="9" selected>Class 9</option>
							<option value="10">Class 10</option>
						</select>
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary">Go</button>
					</div>
				</div>
				
			</form>
		</div>
	  </div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
