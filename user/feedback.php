<?php
require_once("../connect.php");
  require_once("../session.php");
  confirm_logged_in();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
	<title>finalyearproject | Feedback</title>
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

		input[type='submit']{font-family: poor richard;
			  font-size: 28px;
			   word-spacing: 20px;
				color: white;
				margin-left: 300px;}

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
          <li><a href="dashboard.php" class="btn btn-link " role="button">Dashboard</a></li>
          <li><a href="logcomplaint.php" class="btn btn-link" role="button">Log-Complaint</a></li>
          <li><a href="history.php" class="btn btn-link" role="button">Com.History</a></li>
          <li><a href="feedback.php" class="btn btn-link" role="button" style="color: yellow;">Feedback</a></li>
          <li><a href="../logout.php" class="btn btn-link" role="button">Logout</a></li>
       </ul>
  </div>
</nav>
</div>

<div class="col-md-8">
		<h3 style="font-family: poor richard; color: midnightblue; text-align: center;">Please leave feedback</h3>
<form class="form-control" enctype="multipart/form-data" method="POST">
<table border="0" cellpadding="5" width="100%" style="font-size:14px;font-family:Lucida Bright; font-weight:normal;">
       				
  					<tr>
                    	<td style="color: midnightblue;">Have your complaint been resolved?</td>
                        <td ><input type="radio" name="resolved" value="Yes"> Yes
 							 <input type="radio" name="resolved" value="No"> No
 						</td>
                    </tr>	
                    <tr>
                    	<td style="color: midnightblue;">Were you satisfied?</td>
                        <td ><input type="radio" name="satisfied" value="Yes"> Yes
 							 <input type="radio" name="satisfied" value="No"> No
 						</td>
                    </tr>	
                     <tr>
                    	<td style="color: midnightblue;">Please leave a comment to help serve you better:</td>
                        <td ><textarea name="comment" class="form-control" style="color:midnightblue;"></textarea>
	   					</td>
                    </tr>	
                     <tr>
                    	<td style="color: midnightblue;"></td>
                        <td> <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin-left: 0px;"></td>
                    </tr>	
</table>
</form>

<?php 
if (isset($_POST['submit'])) {
	# code...
	extract($_POST);
	$studentid=$_SESSION['id'];
	$resolved=$_POST['resolved'];
	$satisfied=$_POST['satisfied'];
	$comment=$_POST['comment'];

	$sql = "INSERT INTO feedback(studentid,resolved,satisfied,comment) VALUES('$studentid','$resolved','$satisfied','$comment')" or die(mysql_error()); 
	 mysql_query($sql) or die(mysql_error());

echo '<script> alert("Thank you for your Feedback")</script>';
}

 ?>

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