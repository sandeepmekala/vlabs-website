<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign in</title>
	<link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16"> 
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

	<script type="text/javascript">
	$(document).ready(function (e) {
		$("#form").on('submit',(function(e) {
			//e.preventDefault();
			var flag0="";
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
					  //var ajaxDisplay = document.getElementById('list_exp');
					  var str = ajaxRequest.responseText.toString().trim();
					  if(str == "ok"){
							flag0=str;
							var divVar = document.getElementById('show_result');
							divVar.innerHTML = "";
					  }
					  else{
							flag0=str;
							var divVar = document.getElementById('show_result');
							divVar.innerHTML = "Please enter a valid username and password.";
					  }
				   }
				 }
				 // Now get the value from user and pass it to
				 // server script.
				 var Username = document.getElementById('Username').value;
				 var Password = document.getElementById('Password').value;
				 var specification = document.getElementById('specification').value;
				 var queryString = "Username="+Username+"&Password="+Password+"&table="+specification;
				 ajaxRequest.open("POST", "validateSignIn.php", true);
				 ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				 ajaxRequest.setRequestHeader("Content-length",queryString.length);
				 ajaxRequest.setRequestHeader("Connetion","close");
				 ajaxRequest.send(queryString);
			
			alert("submited");
			if (typeof(Storage) != "undefined") {
				localStorage.setItem("Username", Username);
				localStorage.setItem("specification", specification);
			} else {
				alert("Sorry, your browser does not support Web Storage...");
			}

			if(flag0=="ok"){
				return true;
			}
			else{
				return false;
			}
	}));
	});
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
							Sign In <small>to upload experiments</small></h2>
					</div>
				</div>
			</div>
		</div>
		<div id="show_result" style="height:30px;color:#FF0000; text-align: center;"></div>
	    <div class="container">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="form" action="index.php" method="post" id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="Username" type="text" class="form-control" name="Username" value="" placeholder="username" required="required">
							</div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="Password" type="password" class="form-control" name="Password" placeholder="password" required="required">
                            </div>
                            
                            <label>Login as </label>
                            <div>
								<select id="specification" name="specification" class="form-control">
								  <option value="contributor" selected>Contributor</option>
								  <option value="reviewer">Reviewer</option>
								</select><br>
                             </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-md-12">
										<button type="submit" class="btn btn-success" id="submit">Login</button>
									</div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="contributorReg.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>
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
