
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
	<title>Admin| Closed Complaints</title>
	<link type="text/css" href="./css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Closed Complaints</h3>
							</div>
							<div class="module-body table">


							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" style="font-family: ariel;" >
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Matric No</th>
											<th>Date</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$query=mysql_query("SELECT * FROM tblcomplaints WHERE status='2'");
while($row=mysql_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($row['ref_num']);?></td>
											<td><?php echo htmlentities($row['Matricnumber']);?></td>
											<td><?php echo htmlentities($row['reg_date']);?></td>
										
											<td><button type="button" class="btn btn-success">Closed</button></td>
											
											<td>   <a href="closed_compprc.php?cid=<?php echo htmlentities($row['ref_num']);?>"> View Details</a> 
											</td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>