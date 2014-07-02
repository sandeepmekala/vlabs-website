<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aakash Vlabs v1.0 - Second Page</title>

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
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
<style>
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
</head>
<body>

	<?php
	include("db.php");
		//Connect to MySQL Server
	mysql_connect($dbhost, $dbuser, $dbpass);
		//Select Database
	mysql_select_db($dbname) or die(mysql_error());
		// Retrieve data from Query String
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$picture = $_FILES['picture']['name'];
	$specialized_subject = $_POST['specialized_subject'];
	$validation_doc = $_FILES['validation_doc']['name'];

		// Escape User Input to help prevent SQL Injection
	$Username = mysql_real_escape_string($Username);
	$Password = mysql_real_escape_string($Password);
	$first_name = mysql_real_escape_string($first_name);
	$last_name = mysql_real_escape_string($last_name);
	$email = mysql_real_escape_string($email);
	$contact = mysql_real_escape_string($contact);
	$picture = mysql_real_escape_string($picture);
	$specialized_subject = mysql_real_escape_string($specialized_subject);
	$validation_doc = mysql_real_escape_string($validation_doc);

	$query1 = "INSERT INTO contributor (Username, Password, first_name, last_name,email,contact,picture,specialized_subject,validation_doc) VALUES ('$Username','$Password','$first_name','$last_name','$email','$contact','assets/img/user_pictures/$picture','$specialized_subject','assets/img/user_docs/$validation_doc')";
	$qry_result1 = mysql_query($query1) or die(mysql_error());

	/*if($qry_result1)
	{
		echo "Uploaded successfully...";
	}
	else{
		echo "Failed to upload. Please try again...";
	}*/
	
	?>
	
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" href="index.php"> <i class="glyphicon glyphicon-bullhorn"></i>  &nbsp; Aakash Vlab <small>v1.0</small></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right">
		  <ul class="nav navbar-nav">
			<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-pushpin"></i> &nbsp; Change Class</a></li>
			<li><a href="signIn.php"><i class="glyphicon glyphicon-user"></i> &nbsp; Sign in</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				  <i class="glyphicon glyphicon-exclamation-sign"></i> &nbsp; About <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
      				<li><a href="contributorReg.php">Contributor Registration</a></li>
					<li><a href="#">	Reviewer Registration</a></li>
					<li class="divider"></li>
					<li><a href="#">Contact Us</a></li>
					<li class="divider"></li>
					<li><a href="aboutFAQs.php">FAQs</a></li>
					<li class="divider"></li>
					<li><a href="aboutUs.php">About Us</a></li>
				</ul>
			</li>
			
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container" style="min-height:900px;">
		<p><h5 id="registration" class="text-success">You have successfully registered. Now you can login</h5></p>
		<?php
			if(is_array($_FILES)) {
				$sourcePath = $_FILES['picture']['tmp_name'];
				$sourcePath2 = $_FILES['validation_doc']['tmp_name'];
				if((is_uploaded_file($_FILES['picture']['tmp_name']))&&(is_uploaded_file($_FILES['validation_doc']['tmp_name']))) {
					$targetPath = "assets/img/user_pictures/".$_FILES['picture']['name'];
					$targetPath2 = "assets/img/user_docs/".$_FILES['validation_doc']['name'];
					if((move_uploaded_file($sourcePath,$targetPath))&&(move_uploaded_file($sourcePath2,$targetPath2))) {
		?>
					
					<div class="container">
						<div class="row">							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
							
							  <div class="panel panel-info">
								<div class="panel-heading">
								  <h3 class="panel-title"><?php echo $Username;?></h3>
								</div>
								<div class="panel-body">
								  <div class="row">
									<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo 'assets/img/user_pictures/'.$picture;?>" width="100" height="100" border="0" class="img-circle"> </div>
									
									<!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
									  <dl>
										<dt>DEPARTMENT:</dt>
										<dd>Administrator</dd>
										<dt>HIRE DATE</dt>
										<dd>11/12/2013</dd>
										<dt>DATE OF BIRTH</dt>
										   <dd>11/12/2013</dd>
										<dt>GENDER</dt>
										<dd>Male</dd>
									  </dl>
									</div>-->
									<div class=" col-md-9 col-lg-9 "> 
									  <table class="table table-user-information">
										<tbody>
										  <tr>
											<td>First name</td>
											<td><?php echo $first_name;?></td>
										  </tr>
										  <tr>
											<td>Last name</td>
											<td><?php echo $last_name;?></td>
										  </tr>
										  <tr>
											<td>Subject</td>
											<td><?php echo $specialized_subject;?></td>
										  </tr>
										  <tr>
											<td>Email</td>
											<td><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></td>
										  </tr>
											<td>Phone Number</td>
											<td><?php echo $contact;?></td>
										  </tr>
										  <tr>
											<td>validation doc</td>
											<td><a href="<?php echo 'assets/img/user_docs/'.$validation_doc;?>"><?php echo $validation_doc;?></a></td>
										  </tr>
										  <tr>
											<td>Specification</td>
											<td>Contributor</td>
										  </tr>
										</tbody>
									  </table>
									  <div class="collapse navbar-collapse navbar-right">
									  <a href="editProfile.php" class="btn btn-primary">Edit Profile</a>
									  <a href="signIn.php" class="btn btn-primary">Login</a>
									  </div>
									</div>
								  </div>
								</div>
								<div class="panel-footer">
									<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
									<a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
									<span class="pull-right">
										<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
									</span>
								</div>
								
							  </div>
							</div>
						  </div>
						</div>
					
		<?php
				}
			}
		}
		?>
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
