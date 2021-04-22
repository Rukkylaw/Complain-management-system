<?php
require_once("../connect.php");
  require_once("../session.php");
  confirm_logged_in();

       $_SESSION['Matricnumber'] = $_SESSION['Matricnumber'];
     
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
	<title>finalyearprojec | Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/js/bootstrap.js">
	<style>
		
		.header{align-content: center;
				  font-family: Time new roman;
				}
		
		h1{ font-size: 40px;
			 font-family: poor Richard; 
			  color: white;
				text-align: center;
				 margin-top: 15px;			}

		.footer { border: 2px solid midnightblue;
					text-align: center;
					 font-size: 25px;
					  font-family: Poor Richard;
					   margin-top: 10px;
					    background-color: midnightblue;
					     color: white;}

		tr,th,td{border:1px solid skyblue;}

		table{font-family: poor Richard;
				font-size: 20px;
					font-weight: bold;
						padding-right: 30px;}

		.btn{font-family: poor richard;
			  font-size: 28px;
			   word-spacing: 20px;
				color: white;}
			</style>
		
</head>
<body>
<div class="wrapper">
	<div class="header">
	<div class="row">
		<div class="col-md-12"><img src="../image/pro00.jpg" class="img-responsive" height="auto;" width="100%;"></div>
	</div> 
	<div style="background-color: midnightblue; margin-top: -10px;">
		
		<h1>Welcome to Unilorin Complaint Dashboard</h1></div>

	</div>

<div class="container">
		

<hr>
	<div class="row">
		<div class="col-md-4" style="background-color: midnightblue;border: 3px solid white;text-align: left;">
		 <nav class="navbar-nav">
  <div class="container-fluid">
      <ul class="navbar-nav">
          <li ><a href="dashboard.php" class="btn btn-link " role="button" style="color: yellow;">Dashboard</a></li>
          <li><a href="logcomplaint.php" class="btn btn-link" role="button">Log-Complaint</a></li>
         <li><a href="history.php" class="btn btn-link" role="button">Com.History</a></li>
          <li><a href="feedback.php" class="btn btn-link" role="button">Feedback</a></li>
          <li><a href="../logout.php" class="btn btn-link" role="button">Logout</a></li>
       </ul>
  </div>
</nav>
</div>

		<div class="col-md-1"></div>
		<div class="col-md-7" style="margin-top: 10px;">
		<h3 style="font-family: poor richard; color: midnightblue; text-align: center;">User's Profile</h3>
				<table class="table table-responsive">
			<tr class="success"><th>Matric Number</th>
			<th><?php
          extract($_SESSION);
          echo $Matricnumber." ";
          ?></th>
			<th rowspan="5" style="padding-top: 40px;"><?php
          extract($_SESSION);
          echo"<img src='image/".$photo."' width='180' height='200'/>";
          ?></th></tr>

			<tr>
				<td>Fullname</td>
				<td><?php
          extract($_SESSION);
          echo $Surname." ";
          echo $Middlename." ";
          echo $Firstname." ";
          ?></td>
				
			</tr>
			<tr>
				<td>Faculty</td>
				<td><?php
          extract($_SESSION);
          echo $Faculty." ";
          ?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php
          extract($_SESSION);
          echo $Department." ";
          ?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><?php
          extract($_SESSION);
          echo $Level." ";
          ?></td>
			</tr>
			
		</table>
			
		</div>
		
	</div>
</div>

<div class="footer">
	<p class="col-auto">&copy 2019 Student Final year Project | All Right Reserved.</p>
</div>
</div>
</body>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</html>