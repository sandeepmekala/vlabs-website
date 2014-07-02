<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16"> 
    <title>aboutUs</title>
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>
	<body onload="updateSignIn()">

	<script language="javascript" type="text/javascript">
	<!--//
		$(document).ready(function (e) {
		$("#form").on('submit',(function(e) {
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
			  var ajaxDisplay = document.getElementById('show_result');
			  ajaxDisplay.innerHTML = ajaxRequest.responseText;
			  document.getElementById('name').value="";
			  document.getElementById('email').value="";
			  document.getElementById('subject').value="";
			  document.getElementById('message').value="";
			}
			}
			
			var name = document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var subject = document.getElementById('subject').value;
			var message = document.getElementById('message').value;
			
			var queryString = "name=" + name +"&email=" + email + "&subject=" + subject + "&message=" + message;
			//alert(queryString);
			
			ajaxRequest.open("POST", "uploadContacts.php", true);
			ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajaxRequest.setRequestHeader("Content-length",queryString.length);
			ajaxRequest.setRequestHeader("Connetion","close");
			ajaxRequest.send(queryString);
			return false;
	}));
	});		
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
			    alert("logout");
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

	<div class="jumbotron jumbotron-sm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<h2 class="h2">
						Contact us <small>Feel free to contact us</small></h2>
				</div>
			</div>
		</div>
	</div>
	<div id="show_result" style="height:30px;color:#3030FF; text-align: center;">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="well well-sm">
					<form id="form" method="post" enctype="multipart/form-data" role="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">
									Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
							</div>
							<div class="form-group">
								<label for="email">
									Email Address</label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
									</span>
									<input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
							</div>
							<div class="form-group">
								<label for="subject">
									Subject</label>
								<select id="subject" name="subject" class="form-control" required="required">
									<option value="na" selected="">Choose One:</option>
									<option value="upload_experiment">Regarding experiment uploads</option>
									<option value="suggestions">Suggestions</option>
									<option value="other">Others</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Message</label>
								<textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary pull-right" id="submit">
								Send Message</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<form>
				<legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
				
				<address>
					<strong>Aakash Lab</strong><br>
					Second Floor, Old CSE Building,<br>
					Indian Institute of Technology Bombay<br>
					Powai, Mumbai 400076,<br>
					Maharashtra, India.<br>
				</address>

				<address>
					<span class="glyphicon glyphicon-phone-alt"></span>
						(+91) (022) 25764708
				</address>    

				<address>
					<span class="glyphicon glyphicon-envelope"></span>
					<a href="mailto:aakashtechsupport@cse.iitb.ac.in">aakashtechsupport@cse.iitb.ac.in</a>
				</address>
				</form>
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
