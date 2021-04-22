<?php 
session_start();
if (!isset($_SESSION['userid']) && !isset($_GET['id'])) {
//echo 'no permission';
header("location:../index.php");
}
require ('../connect.php');
        $id = base64_decode($_GET['id']);
        $view = mysql_query("SELECT * FROM tblcomplaints WHERE ref_num ='$id'");
        $viewresult = mysql_fetch_array($view);
        $downloadattch = $viewresult['attach'];
        $result2 = mysql_query("SELECT * FROM student WHERE id ='$_SESSION[id]'");
            while($row = mysql_fetch_array($result2)){ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Finalyearproject | Myreport</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.minp.css">
  <!-- Font Awesome -->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.minp.css">
    <meta name="author" content="synerge">
    <meta name="keywords" content="Synerge">
     <link rel="shortcut icon" href="img/favicon.png" >


</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <img src="../image/lastlogo.png">
          <small class="pull-right">Date: <?php $today = date ("F j, Y"); PRINT "$today" ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-8 invoice-col">
       <address>
        <strong>Message Details</strong><br>
          Status: 
          <?php 
          if($viewresult['status'] ==2){echo "<a class='btn-success'>processed</a>";}else{echo "<a class='btn-success'>In Process</a>";} ?><br>
        </address>
        
      </div>
      <!-- /.col -->
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
        <b>Matric No:</b> <?php echo $row['Matricnumber']; ?><br>
        <b>Name:</b> <?php echo $row['Surname']; ?><br>
        <b>Department:</b> <?php echo $row['Department']; ?></br>
        <b>Faculty:</b> <?php echo $row['Faculty']; ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="text-muted well well-sm no-shadow"   style="border:1px dotted black;height: auto">
        <b >Student's Message: </b>
      <?php echo $viewresult['message']; ?>
    </div>

 <div class="text-muted well well-sm no-shadow"   style="border:1px dotted black;height: auto">
        <b >Admin Reply: </b>
      <?php echo $viewresult['adminmessage']; ?>
    </div>
   
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
         We advise that if response is not given within 24 hours student should visit the student affairs for manual processing.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Let's Get In Touch!</p>
              https://www.unilorin.edu.ng/index.php
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

<?php } ?>
