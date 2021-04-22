
<?php
session_start();
include('../connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add Admin</title>
	<link type="text/css" href="./css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
<style>
	
	.header{align-content: center;
				  font-family: Time new roman;
				}
		
		h1{ font-size: 30px;
			 font-family: poor Richard; 
			  color: white;
				text-align: left;
				 margin-top: 15px;			}

		.footer { border: 2px solid midnightblue;
					text-align: center;
					 font-size: 20px;
					  font-family: Poor Richard;
					   margin-top: 2px;
					    background-color: midnightblue;
					     color: white;
					 	  height: 1px;}

		tr,th,td{border:1px solid skyblue;}

		table{font-family: poor Richard;
				font-size: 20px;
					font-weight: bold;
						padding-right: 30px;}

		.btn{font-family:ariel;
			  font-size: 20px;
			   word-spacing: 20px;
				color: white;}
.dropbtn {
  background-color: white;
  color: midnightblue;
  padding: 6px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: gray; color: yellow;}


</style>

	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
</head>
<body>

<div class="wrapper">
	<div class="header">
	<div class="row">
		<div class="col-md-12"><img src="include/pro00.jpg" class="img-responsive" height="auto;" width="100%;"></div>
	</div> 
	<div style="background-color: midnightblue;">
		
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<h2 style="color: white; margin-left: 100px; float: left">CMS | Administrator</h2>
		</div><div class="col-md-4"></div>
		<div class="col-md-3" style="float: right;">
	<img src="images/user2.png" class="nav-avatar" width="60px;" height="60px;">
	<div class="dropdown"  style="margin-top: 10px;">
  <button class="dropbtn">Welcome Admin</button>
  <div class="dropdown-content">
    
								<a href="addadmin.php">Add Admin</a>
								<a href="logout.php">Logout</a>
  </div>
</div> 
		</div>
</div>
		
						
	</div>
		</div>

	</div>
	
		<div class="container">
<hr>
			<div class="row">

			<div class="col-md-3">
<?php include('include/sidebar.php');?>
	</div>

<div class="col-md-9">			
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Administrator</h3>
							</div>
							<div class="module-body">

									<br />

			<form class="form-horizontal row-fluid"  method="post">
									
<div class="control-group">
<label class="control-label" for="basicinput">Enter Username</label>
<div class="controls">
<input type="text" placeholder="Enter a user name"  name="username" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Enter Password</label>
<div class="controls">
<input type="password" placeholder="Enter Password of choice"  name="password" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<div class="controls">
<button type="submit" name="tbl_admin" class="btn" style="background-color: midnightblue; color: white;">Submit</button>
</div>
</div>
				</form>
	<?php if(isset($_POST['tbl_admin'])){
		 extract($_POST);
	 $username = $_POST['username'];
	$password = $_POST['password'];
  $sql = "INSERT INTO tbl_admin(username,password) VALUES('$username','$password')" or die(mysql_error());

 mysql_query($sql) or die(mysql_error());

 echo '<script> alert("You successfully added an admin.")</script>';

}
?>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div>
	</div>

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>