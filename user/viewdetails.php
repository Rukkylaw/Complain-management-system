<?php 
session_start();
if (!isset($_SESSION['id']) && !isset($_GET['id'])) {
//echo 'no permission';
header("location:../index.php");
}
?>
<?php
	 require ('../connect.php');
	 $id = base64_decode($_GET['id']);
	 	$view = mysql_query("SELECT * FROM tblcomplaints WHERE ref_num ='$id'");
	 	$viewresult = mysql_fetch_array($view);
	 	$downloadattch = $viewresult['attach'];
    $adminattach = $viewresult['adminattach'];

		$result2 = mysql_query("SELECT * FROM student WHERE id ='$_SESSION[id]'");
			while($row = mysql_fetch_array($result2)){?>
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
	<title>Finalyearproject | Complaint Report</title>
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
              <li><a href="logcomplaint.php" class="btn btn-link" role="button">Log-Complaint</a></li>
               <li><a href="history.php" class="btn btn-link" role="button">Com.history</a></li>
          		 <li><a href="feedback.php" class="btn btn-link" role="button">Feedback</a></li>
         		   <li><a href="../logout.php" class="btn btn-link" role="button">Logout</a></li>
       		</ul>
  		  </div>
		 </nav>
		</div>
		<div class="col-md-8">
			 <h3 style="font-family: poor richard; color: midnightblue; text-align: center;">Recommended Action</h3>
				<div id="ja-contentwrap" class="clearfix ">
					<div id="ja-content" class="column" style="width:99.99%">
						<div id="ja-current-content" class="column" style="width:99.99%">
				<div id="ja-content-main" class="ja-content-main clearfix">
								
<div class="item-page">

		<div class="article-head">
	<div class="content" style="font-size: 12px; font-family: ariel;">
	<hr>
	<h4>Sent Message</h4>
    	<table width="100%" style="font-family: ariel;">
    		<tr>
    			<td><b>To:</b> <?php echo $viewresult['affairs']; ?></td>
    			<td><b>From Matric No:</b> <?php echo $viewresult['Matricnumber']; ?></td>
    		</tr>
    		<tr>
    		<td><p style="color: black;">
    				<?php
    					if($downloadattch !=""){
    						?>
    Attachment:<?php echo "<a href='download_attach.php?file=$downloadattch && id=$id' style='color:green'>Download Attachment </a>";  ?>	 					<?php }
    					else{
    						echo "<b>Attachment:</b> <b style='color:orange'>No file is attached<p>";
    					}
    				?></p>
    			</td>
    			<td><b>Date:</b> <?php echo $viewresult['reg_date']; ?></td>
    		</tr>
    		<tr>
    			
    		</tr>
    		<tr>
    			<td style="text-align:justify; font-family: ariel;"  colspan="3"><?php echo $viewresult['message']; ?></td>
    		</tr>
       </table>
      <?php
        if( $viewresult['status']==2){
      ?>
    <hr style="color: black;">
    <h4>Responce</h4>

<table width="100%" style="font-family: ariel; ">
        <tr>
          <td><b>To: </b> <?php echo $viewresult['Matricnumber']; ?></td>
       	   <td><b>From: </b> <?php echo $viewresult['affairs']; ?></td>
        </tr>
        <tr>
         <td>
            <?php
              if($adminattach!=""){
                ?>
              <b>Attachment:</b><?php echo "<a target='_blank' href='../admin/replyfiles/$adminattach'>Download Attachment</a>";  ?> 
              <?php }
              else{
                echo "<b>Attachment:</b> <b style='color:orange'>No file is attached<p>";
              }
            ?>
            </td>
          <td ><b>Date:</b><?php echo $viewresult['lastupdatedate'];?></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td style="text-align: justify;"  colspan="3"><?php echo $viewresult['adminmessage']; ?></td>
        </tr>
             </table>
    <?php } else{ }?>
<table width="100%" style="font-family: ariel; ">

		<tr>
          <td style="padding-left: 300px;"><a href="print_file.php?id=<?php echo base64_encode($id); ?>" target="_target"><b style="color: black;">PRINT </b><img src="img/paper.png" width="20" height="20"></a></td>
        </tr>
 </table>



  </div> 
  <!-- end of div for contents -->
	
</div>
</div></div>
			</div>
				</div>
</div>
          

		</div>		
	</div>
</div>        


 <div class="footer">
	<p class="col-auto">&copy 2019 Student Final year Project | All Right Reserved.</p>
</div>
</body>

</html>
 <?php } ?>