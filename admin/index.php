<?php
session_start();

include("../connect.php");
if(isset($_POST['submit']))
{
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
$ret=mysql_query("SELECT * FROM admin WHERE username='$username' and password='$password'");
if(mysql_num_rows($ret)>0)
{
		while ($row = mysql_fetch_array($ret)) {
			//$extra="change-password.php";
			$_SESSION['alogin']= $row['username'];
			header("location:addadmin.php");
			exit();
			
		}
}
else
{
$_SESSION['errmsg']="Invalid username or password";
header("location:index.php");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Login</title>
	<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="../user/css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<style>
		.container{background: url("../image/full01.jpg") no-repeat center;
			 	  font-weight: bolder;
			 	  margin-top: -25px;
			 	  background-size: cover;}

		
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
				form { background-color: #ffffff;
  				  border: 1px solid black;
  				   opacity: 0.7;
  					filter: alpha(opacity=70); /* For IE8 and earlier */
					 width: ;
					  padding-top: 20px;}
input[type=text] {
  			  width: 60%;
  			   padding: 12px 20px;
   			    margin: 8px 0;
   				 background-color: midnightblue;
   				  color: white;}

		input[type=password] {
  			  width: 60%;
  			   padding: 12px 20px;
   			    margin: 8px 0;
   				 background-color: midnightblue;
   				  color: white;}

   		input[type=submit] {background-color: midnightblue;
    			border: none;
    			 color: white;
    			  padding: 5px 20px;
    			   text-decoration: none;
    				margin: 6px 2px;
    				 cursor: pointer;
    				  font-family: Poor Richard;
    					font-size: 20px;
    					 font-weight: bolder;
    			}
		label{ width: 20%;
				padding: 12px 10px;
				 margin: 8px 0px;
				  border: 1px solid black;
				  	text-align: left;
				  	 font-family: Poor Richard;
				  	  font-size: 18px;
				  	  /* overflow: hidden;*/
				}
			ul { list-style-type: none;
   				  margin: 0;
   				   padding: 0;
   				    overflow: hidden;
   					 background-color: midnightblue;
				}

		li {  float: middle;
    			border-right:1px solid #bbb;
    			text-decoration: none;
			}

		li:last-child { border-right: none;
			}

		li a { display: block;
    			color: white;
    			 text-align: center;
    			  padding: 0px 0px;
    			   text-decoration: none;
			}

		li a:hover:not(.active) { background-color: white;
     				color: midnightblue;
			}

		.active { font-style: italic;
           font-family: pristins;}
          a:hover{color:midnightblue;
          			border: 2px solid white;
          				background-color: white;}
          	a{color: white;}
			</style>
		
		
		
</head>
<body>
<div class="wrapper">
	<div class="header">
	<div class="row">
		<div class="col-md-12"><img src="../image/pro00.jpg" class="img-responsive" height="auto;" width="100%;"></div>
	</div> 
	<div style="background-color: midnightblue;">
		<div class="row">
			<div class="col-md-6">
				 		<h3 style="color: white; padding-left:50px;">Complaint Management System | Admin </h3>
			 </div>
			<div class="col-md-4"></div>
			<div class="col-md-2"><a href="http://localhost:8080/project/index.html" >
						Back to Portal
						</a>
			</div>
		</div>
		</div>
		<div style="background-color: #4682B4; height: 20px; margin-top: -7px;">
		 	
		 </div>

	</div>

<div class="container">
<hr>
<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center><h5 style="font-weight: bolder; font-family: poor Richard; font-size: 30px; padding-top: 10px; color: yellow;">For Administrative Staffs Only</h5>
		<form method="post" class="form-signin">
    	<div>
    		
    	</div>
    			   <label> Username:</label><input type="text" name="username"><br>
  				 <label> Password:</label><input type="password" name="password"><br>
  			    <input type="submit" name="submit" value="Submit">
  			    <div class="row">
  			    	<div class="col-md-12">
  			    		<p style="border: 1px solid black; width: 77%; text-align: left; font-family: time new roman; font-size: 19px; color: midnightblue;">
  			      	NOTE: YOUR LOGIN ID IS YOUR STAFF IDENTIFICATION NUMBER AND YOUR SURNAME IS YOUR PASSWORD UNLESS IT HAS BEEN CHANGED BY YOU.</p>
  			    	</div>
  			    </div>   
 		</form> 
 		</center>
		</div>
		<div class="col-md-2"></div>
	</div>

</div>
<div class="footer">
		<p class="col-auto">&copy 2019 Student Final year Project | All Right Reserved.</p>
	</div>

</div>


		
</body>
</html>