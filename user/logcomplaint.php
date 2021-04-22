<?php 
	session_start();
	require ('../connect.php');

	$complaint = mysql_query("SELECT * FROM student WHERE id ='$_SESSION[id]'");
	// print_r(mysql_fetch_assoc($complaint));
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<title>Finalyearproject | Logcomplaint</title>
  <!--Stylings   -->
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
			   word-spacing: ;
				color: white;}
		input[type="submit"]{margin-left: 300px;}
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
</div>
            
       
<div class="container">
<hr>
	<div class="row">
		<div class="col-md-4" style="background-color: midnightblue;border: 3px solid white;text-align: left;">
		 <nav class="navbar-nav">
  		  <div class="container-fluid">
      	    <ul class="navbar-nav">
          	 <li><a href="dashboard.php" class="btn btn-link " role="button">Dashboard</a></li>
              <li><a href="logcomplaint.php" class="btn btn-link" role="button" style="color: yellow;">Log-Complaint</a></li>
               <li><a href="history.php" class="btn btn-link" role="button">Com.history</a></li>
          		 <li><a href="feedback.php" class="btn btn-link" role="button">Feedback</a></li>
         		   <li><a href="../logout.php" class="btn btn-link" role="button">Logout</a></li>
       		</ul>
  		  </div>
		 </nav>
		</div>
		<div class="col-md-8">
			 <h3 style="font-family: poor richard; color: midnightblue; text-align: center;">Log-Complaint</h3>
<form  method="post" action="load.php" enctype="multipart/form-data">

  <table border="0" cellpadding="5" width="100%" style="font-size:14px;font-family:Lucida Bright; font-weight:normal;">
       				
  					<tr>
                    	<td style="color: midnightblue;">To:</td>
                        <td ><input type="text" class="form-control" readonly value="studentaffairs@complaint.unilorin.edu.ng" name="affairs" required size="55" style="color: midnightblue;" /></td>
                    </tr>	
       				<tr>
                    	<td style="color: midnightblue;">Student Id Number:</td>
                        <td style="color: midnightblue;"><input type="text" readonly name="Matricnumber" class="form-control" value="<?php
          extract($_SESSION);
          echo $Matricnumber." ";
          ?>" required size="55" /></td>
                    </tr>
                    <tr>
                    	<td style="color: midnightblue;">Select-Com.Category:</td>
                        <td> <select class="form-control" name="category" style="color: midnightblue;">
    	  					 <option>Hostel</option>
    	     					<option>NYSC Mobilization</option>
    	      						<option>Student deciplinary commity</option>
   			   							<option>others</option>
   			  				</select>
						</td>
                    </tr>
                    <tr>
                    	<td style="color: midnightblue;">Compose Message:</td>
                        <td style="color: midnightblue;"><textarea class="form-control" name="message" required=""></textarea></td>
                    </tr>
                    <tr>
                    	<td style="color: midnightblue;">Attachment(Optional):</td>
                        <td><input type="file" name="attach"></td>
                    </tr>
                    <tr>
					<td></td><td style="color: midnightblue;">
            	Note: File Size must not exceed 5MB</td>
					</tr>
                     
					<tr>
					<td></td><td>
            	<button id="sbtn" class="btn btn-success" style="margin-left: 0px;" name="compmessage">Send Message</button></td>
					</tr>
                			 </table>
           </form>

          

		</div>		
	</div>
</div>        


 <div class="footer">
	<p class="col-auto">&copy 2019 Student Final year Project | All Right Reserved.</p>
</div>
</body>

</html>
