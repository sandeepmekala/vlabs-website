<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="assets/img/akash2.png" type="image/png" sizes="16x16"> 
    <title>FAQs</title>
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	$(document).ready(function() {
		$('.collapse').on('show.bs.collapse', function() {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
		});
		$('.collapse').on('hide.bs.collapse', function() {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
			$('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
		});
	});
	</script>
	<style>
		.faq-cat-content {
			margin-top: 25px;
		}

		.faq-cat-tabs li a {
			padding: 15px 10px 15px 10px;
			background-color: #ffffff;
			border: 1px solid #dddddd;
			color: #777777;
		}

		.nav-tabs li a:focus,
		.panel-heading a:focus {
			outline: none;
		}

		.panel-heading a,
		.panel-heading a:hover,
		.panel-heading a:focus {
			text-decoration: none;
			color: #777777;
		}

		.faq-cat-content .panel-heading:hover {
			background-color: #efefef;
		}

		.active-faq {
			border-left: 5px solid #888888;
		}

		.panel-faq .panel-heading .panel-title span {
			font-size: 13px;
			font-weight: normal;
		}
	</style>
	</head>
	<body onload="updateSignIn()">	
	<script language="javascript" type="text/javascript">
		<!--//
		
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

	<div class="jumbotron jumbotron-sm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<h2 class="h2">
						FAQs <small>Feel free to ask question</small></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container">   
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="width:900px;margin-left: 30px;">
				<!-- Nav tabs category -->
				<ul class="nav nav-tabs faq-cat-tabs">
					<li class="active"><a href="#faq-cat-1" data-toggle="tab">About Uploads</a></li>
					<li><a href="#faq-cat-2" data-toggle="tab">About Registration</a></li>
				</ul>
		
				<!-- Tab panes -->
				<div class="tab-content faq-cat-content">
					<div class="tab-pane active in fade" id="faq-cat-1">
						<div class="panel-group" id="accordion-cat-1">
							<div class="panel panel-default panel-faq">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1">
										<h4 class="panel-title">
											FAQ Item Category  1
											<span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
										</h4>
									</a>
								</div>
								<div id="faq-cat-1-sub-1" class="panel-collapse collapse">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="panel panel-default panel-faq">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-2">
										<h4 class="panel-title">
											FAQ Item Category  1
											<span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
										</h4>
									</a>
								</div>
								<div id="faq-cat-1-sub-2" class="panel-collapse collapse">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="faq-cat-2">
						<div class="panel-group" id="accordion-cat-2">
							<div class="panel panel-default panel-faq">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion-cat-2" href="#faq-cat-2-sub-1">
										<h4 class="panel-title">
											FAQ Item Category  2
											<span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
										</h4>
									</a>
								</div>
								<div id="faq-cat-2-sub-1" class="panel-collapse collapse">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="panel panel-default panel-faq">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion-cat-2" href="#faq-cat-2-sub-2">
										<h4 class="panel-title">
											FAQ Item Category  2
											<span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
										</h4>
									</a>
								</div>
								<div id="faq-cat-2-sub-2" class="panel-collapse collapse">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
						</div>
					</div>
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
