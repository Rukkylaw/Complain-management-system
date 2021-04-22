<?php
require_once("../connect.php");
  require_once("../session.php");
  confirm_logged_in();
  $Matricnumber = $_SESSION['Matricnumber'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
	<title>finalyearproject | History</title>
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
          <li><a href="dashboard.php" class="btn btn-link " role="button">Dashboard</a></li>
          <li><a href="logcomplaint.php" class="btn btn-link" role="button">Log-Complaint</a></li>
          <li><a href="history.php" class="btn btn-link" role="button" style="color: yellow;">Com.History</a></li>
          <li><a href="feedback.php" class="btn btn-link" role="button">Feedback</a></li>
          <li><a href="../logout.php" class="btn btn-link" role="button">Logout</a></li>
       </ul>
  </div>
</nav>
</div>
<div class="col-md-8">
<h3 style="font-family: poor richard; color: midnightblue; text-align: center;">Complaint History</h3>
	<div class="table-responsive">
                                <table style="font-family: ariel;" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                    <tr>
                      <th>Refrence Number</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                                    
                                    <tbody>
                                    <?php 
                                      $selcomp = "SELECT * FROM tblcomplaints WHERE Matricnumber='$Matricnumber'";
                                  $res = mysql_query($selcomp) or die(mysql_error());
                                  // var_dump(myssql_fetch_assoc($res));
                                    while($selrow = mysql_fetch_assoc($res)){
                                      $ref = $selrow['ref_num'];
                                      $media = $selrow['attach'];
                                      $category = $selrow['category'];
                                      $status = $selrow['status'];
                                    ?>
                                    <tr>
                                      <td><?php echo $ref; ?></td>
                                        <td><?php echo $category; ?></td>
                                        <td>
                                            <?php
                                              if($status == 1){ ?>
                                                <button class="btn-warning">In Process</button>
                                              <?php }

                                              else if($status == 0){ ?>
                                                <button class="btn-danger">Delivered</button>
                                              <?php }
                                              else if($status == 2){ ?>
                                                <button class="btn-success">processed</button>
                                              <?php } 
                                            ?>
                                        </td>
                                        <td style="text-align: center;"><a href="viewdetails.php?id=<?php echo base64_encode($ref); ?>" title="View Details"><img src="img/refresh.png" width="25" height="25"></a></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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