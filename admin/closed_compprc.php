

<?php
session_start();
include('../connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

else{
	$cid=$_GET['cid'];

	if(isset($_POST['replymessage'])){

			$message = $_POST['message'];
			$filename = $_FILES['attach']['name'];
			$ext = pathinfo($filename,PATHINFO_EXTENSION);
			move_uploaded_file($_FILES['attach']['tmp_name'],'replyfiles/'.$filename);

		$reply = "UPDATE tblcomplaints SET status='2',adminmessage='$message',adminattach='$filename' WHERE ref_num = '$cid'";
		mysql_query($reply);

	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Complaint Details</title>
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
			<div class="row">
			<?php include('include/sidebar.php');?>				
			<div class="span9">
				<div class="content">
					<div class="module">
							<div class="module-head">
								<h3>Complaint Details</h3>								
							</div>
					<div class="module-body table">
						<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%" style="font-family: ariel;">
							<tbody>

					<?php $id =$_GET['cid'];
						$query=mysql_query("SELECT u.*, c.* FROM student u, tblcomplaints c WHERE u.Matricnumber=c.Matricnumber AND c.ref_num ='$id'");
							$row=mysql_fetch_array($query);
								{	?>									
											<tr>
									<td><b>Ref Number</b></td>
									<td><?php echo htmlentities($row['ref_num']);?></td>
									<td><b>Faculty</b></td>
									<td> <?php echo htmlentities($row['Faculty']);?></td>
									
								</tr>

										<tr>
											<td><b>Student Name</b></td>
											<td><?php echo htmlentities($row['Surname']);?></td>
											<td><b>Department</b></td>
											<td> <?php echo htmlentities($row['Department']);?></td>
										
										</tr>
										<tr>
											<td><b>Matric</b></td>
											<td><?php echo htmlentities($row['Matricnumber']);?></td>
											<td ><b>Category</b></td>
											<td colspan="1"> <?php echo htmlentities($row['category']);?></td>
											
										</tr>
										<tr>
											<td><b>Message</b></td>	
											<td colspan="4"  style="height:auto; width: 1000px text-align:justify;font-weight: bold;"> <?php echo htmlentities($row['message']);?></td>
										</tr>

											</tr>
										<tr>
											<td><b>File(if any) </b></td>
											<td colspan="5"> <?php $cfile=$row['attach'];
												if($cfile=="" || $cfile=="NULL")
												{
												  echo "File NA";
												}
										else{
											?>
											<a href="../user/image/<?php echo htmlentities($row['attach']);?>" target="_blank"/> Click to view or download file
											</a>
												<?php } ?>
										</td>
										</tr>
										<tr>
											<td><b>Final Status</b></td>
											
											<td colspan="5">
												<?php if($row['status']=="2"){ echo "<p style='color:blue;'>"."Complaint closed"."</p>";}?>
											</td>
										</tr>
										<tr>
											<td style="text-align: center;font-size: 14px;font-weight: bolder" colspan="5">ADMINISTRATOR RESPONSE</td>
										</tr>
										<tr>
											<td><b>Admin Message</b></td>	
											<td colspan="4"  style="height:auto;text-align:justify;font-weight: bold"> 
												<?php echo htmlentities($row['adminmessage']);?></td>
										</tr>
										<tr>
											<td><b>Attached File</b></td>	
											<td colspan="4"  style="height:auto;text-align:justify;font-weight: bold"> 
												<?php
												$att = $row['adminattach'];
												if($att!= ""){ ?>
													 	<a href="replyfiles/<?php echo htmlentities($row['adminattach']);?>" target="_blank"/> Click to view or download file</a>																		
																<?php }
													else{
														echo "File NA";
													}

												?>
											</td>
										</tr>
										
										<?php  } ?>
										
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