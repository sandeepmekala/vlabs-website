<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16"> 
  <title>upload</title>
  <!-- include jquery -->
  <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>

  <!-- include libraries BS3 -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" />
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <!-- include summernote -->
  <link rel="stylesheet" href="dist/summernote.css">
  <script type="text/javascript" src="dist/summernote.js"></script>
  
  <script type="text/javascript">
	
	$(document).ready(function (e) {
		$(function() {
		  $('.summernote').summernote({
			height: 200
		  });
		  $('form').on('submit', function (e) {
			//alert(($('.summernote').eq(0).code())+"\n\n\n\n"+($('.summernote').eq(1).code())+"\n\n\n\n"+($('.summernote').eq(2).code()));
			var ajaxDisplay = document.getElementById('show_result0');
			ajaxDisplay.innerHTML = "Uploaded successfully. Thank you for uploading experiment.";
			var fileName = document.getElementById('icon').value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

			if(ext =="PNG" || ext=="png")
			{	
				ajaxFunction();
				$.ajax({
					url: "upload.php",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
					//$("#targetLayer").html(data);
						//alert("uploaded successfully...");
					},
					error: function()
					{
						//alert("failed to upload, try again...");
					}
			   });
			}
			else
			{
				var divVar = document.getElementById('show_result');
				divVar.innerHTML = "Upload png format Images only";
				return false;
			}
		  });
		});
	});

	function ajaxFunction(){
		var ajaxRequest;  // The variable that makes Ajax possible!
		var Username = "";
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
			var str = ajaxRequest.responseText;

		}
		}
		// Now get the value from user and pass it to
		// server script.
		if (typeof(Storage) != "undefined") {
		// Retrieve
			Username = localStorage.getItem("Username");
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
		var video = "";
		var i=1;
		var temp = 'video1';
		while(document.getElementById(temp)){
			video = video + document.getElementById(temp).value+"@@@";
			i++;
			temp = 'video'+i;
		}
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} var today = yyyy+'-'+mm+'-'+dd;
		
		var name = document.getElementById('name').value;
		var subject_name = document.getElementById('subject_name').value;
		var class_no = document.getElementById('class_no').value;
		var description = document.getElementById('description').value;
		var theory = document.getElementById('theory').value;
		var proc = document.getElementById('proc').value;
		//var video = document.getElementById('video1').value;
		var simulation = document.getElementById('simulation').value;
		simulation = simulation+"@@@"+FileName;
		alert(simulation);
		var quiz = document.getElementById('quiz').value;
		var resource = document.getElementById('resource').value;
		var icon = document.getElementById('icon').value;
		var queryString = "name=" + name +"&subject_name=" + subject_name + "&class_no=" + class_no + "&description=" + description+ "&theory=" + theory+ "&proc=" + proc+ "&video=" + video+ "&simulation=" + simulation+ "&quiz=" + quiz+ "&resource=" + resource+ "&icon=" + icon+ "&Username=" + Username+ "&uploaded_date=" + today;
		//alert(queryString);
		
		ajaxRequest.open("POST", "generateHTMLS.php", true);
		ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajaxRequest.setRequestHeader("Content-length",queryString.length);
		ajaxRequest.setRequestHeader("Connetion","close");
		ajaxRequest.send(queryString);
		return true;
		alert(resource);
		}
  </script>
<body onload="checkingLogin();">
	<script language="javascript" type="text/javascript">
		<!--//
		function checkingLogin(){		
			if (typeof(Storage) != "undefined") {
			// Retrieve
				Username = localStorage.getItem("Username");
				specification = localStorage.getItem("specification");
				if(Username == "" || Username == null){
					alert("Please login first.");
					window.open("signIn.php","_self");
				}
				else if(specification == "reviewer"){
					alert("Please login as contributor.");
					window.open("signIn.php","_self");
				}
				else{
					//alert(Username+ '  '+specification);
					increment();
					updateSignIn();
				}
			} else {
				alert("Sorry, your browser does not support Web Storage...");
			}
		}
	</script>
	<script language="javascript" type="text/javascript">
		<!--//
		var index = 0;

		function increment(){
			index++;
			//alert(index);
			makeForm(index);
		}
		function decrement(){
			deleteForm(index);
			index--;
			//alert(index);
		}
		
		function makeForm(val) {
			var str1 = "video"+(val);
			var str2 = "formID"+(val);
			mypara=document.getElementById("paraID");
			myform=document.createElement("form");
			myselect = document.createElement("input");

			myform.appendChild(myselect);
			mypara.appendChild(myform);

			mybreak=document.createElement("p");
			myform.appendChild(mybreak);

			//myselect.setAttribute("type","file");
			myselect.setAttribute("type","url");//--
			myselect.setAttribute("placeholder","Enter url...");//--
			myselect.setAttribute("class","form-control");//--
			myselect.setAttribute("required","");//--
			myselect.setAttribute("id",str1);
			myform.setAttribute("id",str2);
		}
		function deleteForm(val) {
			//var str1 = "video"+(val);
			var str2 = "formID"+(val);
			mypara=document.getElementById("paraID");
			//myPara=document.getElementById(str1);
			myform=document.getElementById(str2);
			//	alert(myform.id);
			mypara.removeChild(myform);
		}
		//-->
	</script>
	<style>
		.jumbotron {
		background: #358CCE;
		color: #FFF;
		border-radius: 0px;
		}
		.jumbotron-sm { padding-top: 24px;
		padding-bottom: 24px; }
		.jumbotron small {
		color: #FFF;
		}
		.h1 small {
		font-size: 24px;
		}
	</style>
	<script language="javascript" type="text/javascript">
	var FileName = "";
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
			//alert(Username+ '  '+specification);
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
			//alert(Username+ '  '+specification);
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
	
	document.addEventListener("mousemove",testFun);
	
	function testFun(){
		if (typeof(Storage) != "undefined") {
			// Retrieve
			if(localStorage.getItem("FileName") !== null) {
				FileName = localStorage.getItem("FileName");
				document.getElementById("sim_link").style.display = "none";
				document.getElementById("csv_link").innerHTML = FileName;
				document.getElementById("csv_link").style.display = "block";
				localStorage.removeItem("FileName");
				document.removeEventListener("mousemove",testFun);
			}
		} else {
			console.log("Sorry, your browser does not support Web Storage...");
		}
		//alert(FileName);
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
			<li><a href="signIn.php"><i class="glyphicon glyphicon-user"></i> Sign in</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				  <i class="glyphicon glyphicon-fire"></i> &nbsp; About <span class="caret"></span>
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
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	</div>
	<div class="jumbotron jumbotron-sm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<h2 class="h2">
						Upload <small>Experiment</small></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="width:900px;min-height:1500px;">	
		<div id="formArea" style="min-height:1000px;">
			<form id="form" method="post" enctype="multipart/form-data" role="form"">
				<div id="show_result0" style="height:30px;color:#0000FF; text-align: center;">
				</div>
				<div class="form-group">
					<label >Enter experiment name:</label>
					<input type="text" class="form-control" id="name" placeholder="Name of experiment..." required autofocus>
				</div>
				<label >Choose subject of the experiment:</label>
				<select id="subject_name" class="form-control">
				  <option value="physics" selected>Physics</option>
				  <option value="chemistry">Chemistry</option>
				  <option value="biology">Biology</option>
				  <option value="mathematics">Mathematics</option>
				</select><br>
				<label >Choose experiment class:</label>
				<select id="class_no" class="form-control">
				    <option value="5">Class 5</option>
				    <option value="6">Class 6</option>
				    <option value="7">Class 7</option>
				    <option value="8">Class 8</option>
				    <option value="9" selected>Class 9</option>
				    <option value="10">Class 10</option>
				</select><br>
			    <div class="form-group">
					<label>Small description about the experiment:</label>
					<textarea id="description" class="form-control" rows="3" placeholder="Brief description..." required autofocus></textarea>
				</div>
				<label>Upload Theory:</label>
				<!--input type="file" name="theory" id="theory" required autofocus-->
				<!--a href="summernote-master/textarea.html">Theory</a-->
				<span class="help-block">You can simply copy and paste in editor it takes care os tables and images...</span>
				<div class="form-group">
					<textarea id="theory" class="summernote" ><span class="help-block">Content goes here...</span></textarea><br>
				</div>
				<label>Upload Procedure:</label>
				<span class="help-block">You can simply copy and paste in editor it takes care os tables and images...</span>
				<!--span class="help-block">Choose only pdf formats...</span-->
				<div class="form-group">
					<textarea id="proc" class="summernote"><span class="help-block">Content goes here...</span></textarea><br>
				</div>
				<label>Upload Video URL's:</label>
				<div id="paraID" class="form-group">
				</div>
				<input type="button" class="btn btn-success btn-xs" id="createID" value="+" onclick="increment()" />
				<input type="button" class="btn btn-warning btn-xs" id="deleteID" value="-" onclick="decrement()" />
				<span class="help-block">Enter youtube url for videos...</span>
				<div class="form-group">
					<label >Enter url for Blender file:</label>
					<input type="url" class="form-control" id="simulation" placeholder="Enter url..." required autofocus>
					<label >Perform guided simulation and upload:</label><br>
					<a id="sim_link" href="http://localhost/newAakashSiteMergeUpload/assets/simulation/vlab.php" target="_blank">Click here</a>
					<font id="csv_link" style="display: none"></font>
				</div>
				<div class="form-group">
					<label >Upload GIFT file for quiz:</label>
					<span class="help-block">You can simply copy and paste in editor it takes care os tables and images...</span>
					<input type="file" name="quiz" id="quiz" required autofocus>
				</div>
				<label>Upload Resources:</label>
				<span class="help-block">You can simply copy and paste in editor it takes care os tables and images...</span>
				<!--span class="help-block">Choose only pdf formats...</span-->
				<div class="form-group">
					<textarea id="resource" class="summernote"><span class="help-block">Content goes here...</span></textarea><br>
				</div>
				<div id="show_result" style="height:30px;color:#FF0000; text-align: center;">
				</div>
				<div class="form-group">
					<label>Upload Icon for experiment:</label>
					<span class="help-block">Choose Icon in png format only...</span>
					<input type="file" name="icon" id="icon" required autofocus>
				</div>
			    <br>
			    <!--div class="divContent" style="border:0px solid gray;padding-top:15px"><p style="text-align:center;"><iframe allowfullscreen="true" src="http://www.youtube.com/embed/pqfT_PWIiQU" frameborder="0" height="360" width="640"></iframe></p></div><br>
			    <br>
			    <div class="divContent" style="border:0px solid gray;padding-top:15px"><p style="text-align:center;"><iframe allowfullscreen="true" src="http://www.youtube.com/embed/_1Qp5U095MU" frameborder="0" height="360" width="640"></iframe></p></div><br-->
			   <button type="submit" class="btn btn-primary" >submit</button>
			</form>
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
    <!-- jQuery
	y (necessary for Bootstrap's JavaScript plugins) -->
    <!--script src="assets/js/jquery.min.js"></script-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--script src="assets/js/bootstrap.min.js"></script-->
  </body>
</html>
