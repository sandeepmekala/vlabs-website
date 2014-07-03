<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aakash Vlabs v1.0 - Second Page</title>
	<link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16">
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
	<body onLoad="performOperations();updateSignIn();updateSidePanel();">

	<script language="javascript" type="text/javascript">
	function performOperations(){
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
		 var cls = <?php echo $_GET['cls'];?>;
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  var str = ajaxRequest.responseText;
			  var ajaxDisplay = document.getElementById('cls');
			  ajaxDisplay.innerHTML = cls;
			  obj = eval('(' +str+ ')');
       		  //var objCount=0;
			  //for(_obj in obj) objCount++;
		      //alert(objCount);
			  var ajaxDisplay1 = document.getElementById('item1');
			  var ajaxDisplay2 = document.getElementById('item2');
			  var ajaxDisplay3 = document.getElementById('item3');
			  var ajaxDisplay4 = document.getElementById('item4');
			  ajaxDisplay1.innerHTML = obj[0].subject[0].exps.length;
			  ajaxDisplay2.innerHTML = obj[0].subject[1].exps.length;
			  ajaxDisplay3.innerHTML = obj[0].subject[2].exps.length;
			  ajaxDisplay4.innerHTML = obj[0].subject[3].exps.length;
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 //var queryString = "cls=" + cls;
		 ajaxRequest.open("GET", "generateJSON.php?"+"cls=" + cls, true);
		 //ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 //ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 //ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send();
	}
	//Browser Support Code
	function fetchExperiments(subject){
	 performOperations();
	 var ajaxRequest;  // The variable that makes Ajax possible!
   	 var sub = subject;	
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
	 var cls = <?php echo $_GET['cls'];?>;
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
	
	function updateSidePanel(){
		var s_p1 = '<div class="panel panel-primary"><div class="panel-heading"><i class="glyphicon glyphicon-bell"></i> &nbsp; Experiments Details</div><ul class="list-group"><li class="list-group-item"><a href="#" onclick="fetchCntrbtrExperiments();"><i class="glyphicon glyphicon-star"></i> &nbsp;See Your Uploads</a></li></ul></div>';
		var s_p2 = '<div class="panel panel-primary"><div class="panel-heading"><i class="glyphicon glyphicon-bell"></i> &nbsp; Experiments Details</div><ul class="list-group"><li class="list-group-item"><a href="#" onclick="fetchRvwrExperiments();"><i class="glyphicon glyphicon-star"></i> &nbsp; Approve Experiment</a></li></ul></div>';
		
		if (typeof(Storage) != "undefined") {
			// Retrieve
			specification = localStorage.getItem("specification");
			////alert(Username+ '  '+specification);
			if(specification == "contributor"){
				var ajaxDisplay2 = document.getElementById('side_panel');
			    ajaxDisplay2.innerHTML = s_p1;
			}else if(specification == "reviewer"){
				var ajaxDisplay2 = document.getElementById('side_panel');
			    ajaxDisplay2.innerHTML = s_p2;
			}else{
				var ajaxDisplay2 = document.getElementById('side_panel');
			    ajaxDisplay2.innerHTML = "";
			}
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
	}
	function fetchCntrbtrExperiments(){
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
			  var ajaxDisplay = document.getElementById('list_exp');
			  var ajaxDisplay2 = document.getElementById('show_info');
			  var ajaxDisplay3 = document.getElementById('show_info2');
			  ajaxDisplay.innerHTML = ajaxRequest.responseText;
			  ajaxDisplay2.innerHTML = "Your Uploaded Experiments";
			  ajaxDisplay3.innerHTML = "List of Experiments:";
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "Username=" + Username+"&specification="+specification;
		 ajaxRequest.open("POST", "getCntrbtrExperiments.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
	function fetchRvwrExperiments(){
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
			  var ajaxDisplay2 = document.getElementById('show_info');
			  var ajaxDisplay3 = document.getElementById('show_info2');
			  ajaxDisplay.innerHTML = ajaxRequest.responseText;
			  ajaxDisplay2.innerHTML = "Click to Approve Experiment";
			  ajaxDisplay3.innerHTML = "List of Experiments:";
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "";
		 ajaxRequest.open("POST", "getRvwrExperiments.php", true);
		 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 ajaxRequest.setRequestHeader("Content-length",queryString.length);
		 ajaxRequest.setRequestHeader("Connetion","close");
		 ajaxRequest.send(queryString);
	}
	function increaseApproveCnt(obj){
		var str = (document.getElementById(obj).value).split("@@");
		var ajaxRequest;  // The variable that makes Ajax possible!
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		str[0] = str[0].trim();
		str[1] = str[1].trim();
		str[2] = str[2].trim();

		var yyyy = today.getFullYear();
		if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} var today = yyyy+'-'+mm+'-'+dd;
		
		var Username="";
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
		} else {
			alert("Sorry, your browser does not support Web Storage...");
		}
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
			  //var ajaxDisplay = document.getElementById('list_exp');
			  //ajaxDisplay.innerHTML = ajaxRequest.responseText;
			  alert("Approved "+str[2]);
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 var queryString = "Username=" + Username+"&review_date="+today+"&class_no="+str[0]+"&subject_name="+str[1]+"&name="+str[2];
		 ajaxRequest.open("POST", "approveExperiment.php", true);
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

	
	<div class="container" >
		
		<div class="row">
			<div class="col-md-3">
				<div id="side_panel">
				</div>
				<div class="panel panel-primary">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><i class="glyphicon glyphicon-exclamation-sign"></i> &nbsp; Info</div>
				  <!-- List group -->
				  <ul class="list-group">
					<li class="list-group-item"><i class="glyphicon glyphicon-plane"></i> &nbsp; Class <span id='cls' class="badge">9</span></li>
					<li class="list-group-item"><i class="glyphicon glyphicon-bell"></i> &nbsp; Subjects <span class="badge">4</span></li>
					
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
			<div class="col-md-9 "><!-- start of content -->
				<div id="show_info" class="bs-callout bs-callout-warning" style="font-size:16px;">
					Aakash VLab's for school children
				</div>
				<div  id="show_info2" class="page-header">About VLab's</div>
				<div id="list_exp" style="min-height:1000px">
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To perform hands-on experiments of science is a vital need for learning science. Due to lack of facilities students are unable to perform experiments. Aakash based virtual science lab will provide a platform for students to do the same with the help of a virtual Lab environment .</p>

					<br>
					<p>Aakash Vlabs can reach to students in two ways</p>
					<center><p>1. Aakash based Android application</p>
					<p>2. General Web based application</p></center>

					<br>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The application provides a complete background for an experiment such as theory, procedure , video ,quiz and most importantly an interactive simulation of the experiment . Student can perform the experiment by following steps included in procedure part or by watching the video provided. After completing the experiment the student can attempt the quiz regarding the experiment and can also refer the complete reference of the experiment  by choosing resources.</p>
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
<div class="container text-center">
    <hr />
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="aboutUs.php">About Us</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="contactUs.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="aboutFAQs.php">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Developers</a></li>
        </ul>
      </div>  
    </div>
  </div>
  <hr>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#">© 2014 Indian Institute of Technology Bombay.</a></li>
                <li><a href="#">Site map</a></li>
				<li><a href="#">Terms of Service&Privacy</a></li>
            </ul>
        </div>
    </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
