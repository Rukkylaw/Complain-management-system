<?php 
if (isset($_POST['submit'])){

	require_once("session.php");
 	require_once("connect.php");

  $loginid = $_POST['Matricnumber'];
  $password = $_POST['Surname'];

  $sql = "SELECT * FROM student WHERE Matricnumber='$loginid' AND Surname='$password'";

  $query= mysql_query($sql) or die(mysql_error());
  

    if(mysql_num_rows($query)==1){
      $student=mysql_fetch_array($query) or die(mysql_error());

      $_SESSION['id'] = $student['id'];
      $_SESSION['Matricnumber'] = $student['Matricnumber'];
      $_SESSION['Surname'] = $student['Surname'];
      $_SESSION['Middlename'] = $student['Middlename'];
      $_SESSION['Firstname'] = $student['Firstname'];
      $_SESSION['Faculty'] = $student['Faculty'];
      $_SESSION['Department'] = $student['Department'];
      $_SESSION['Level'] = $student['Level'];
      $_SESSION['photo'] = $student['image'];
      	 header('location: user/dashboard.php');
    }
     else {
        header('location: login.php?id=error'); 
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>finalyearproject | Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
	<style>
		.container{background: url("image/full01.jpg") no-repeat center;
			 	  font-weight: bolder;
			 	  margin-top: -30px;
			 	  background-size: cover;}

		h1{ font-size: 50px;
				font-family: poor Richard; 
				color: midnightblue;
			
				text-align: center;}

		.header {  font-family: Time new roman;
					 text-align:;
			}.footer { border: 2px solid midnightblue;
					text-align: center;
					 font-size: 25px;
					  font-family: Poor Richard;
					   margin-top: 10px;
					    background-color: midnightblue;
					     color: white;
			}
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

		li {  float: left;
    			border-right:1px solid #bbb;
			}

		li:last-child { border-right: none;
			}

		li a { display: block;
    			color: white;
    			 text-align: center;
    			  padding: 14px 16px;
    			   text-decoration: none;
			}

		li a:hover:not(.active) { background-color: white;
     				color: midnightblue;
			}

		.active { font-style: italic;
           font-family: pristins;
			}

	</style>
</head>

<body>
<div class="wrapper">
	
	<div class="header">
	<div class="row">
		<div class="col-md-3"><img src="image/lastlogo.png"></div>
		<div class="col-md-6" style=""><h1>Student Affairs Unit</h1></div>
		<div class="col-md-3"></div>
	</div>
		  <nav>
		   <ul>
   		    <li><a href="index.html">Home</a></li>
 			 <li><a href="faq.html">Faq</a></li>
			 <li class="active"><a href="login.php"> Student Login</a></li>
			  <li style="float: right;"><a href="http://localhost:8080/project/index.html">
						<h7 style="margin-top: 5px;">Back to Portal</h7>
						</a></li>
			  </ul>
		 </nav>
		 <div style="background-color: #4682B4; height: 40px;"></div>
	</div>

	<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center><h5 style="font-weight: bolder; font-family: poor Richard; font-size: 30px; padding-top: 10px; color: yellow;">For Registered Users Only</h5>
		<form method="post" class="form-signin">
    	<div>
    		
    	</div>
   			 <label >Login ID:</label><input type="text" name="Matricnumber"><br>
  			   <label> Password:</label><input type="password" name="Surname"><br>
  			    <input type="submit" name="submit" value="Submit">
  			    <div class="row">
  			    	<div class="col-md-12">
  			    		<p style="border: 1px solid black; width: 77%; text-align: left; font-family: time new roman; font-size: 19px; color: midnightblue;">
  			      	NOTE: YOUR LOGIN ID IS YOUR MATRICULATION NUMBER OR YOUR JAMB REGISTRATION NUMBER 
  			      	(if you don't have Matriculation Number yet) AND YOUR SURNAME IS YOUR PASSWORD UNLESS IT'AS BEEN CHANGED BY YOU.</p>
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
<script src="assets/plugins/jquery-2.0.3.min.js"></script>
         <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>