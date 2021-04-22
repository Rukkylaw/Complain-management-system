<style type="text/css">
	#colyellow{
		background-color: #ffcc00;
	}
	ul li a{font-family: ariel;}
	ul li a{font-size: 20px;}
	ul li a:active{color: yellow;}
</style>
<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
								
									<li>
										<a href="newcomplaint.php">
											<i class="icon-tasks"></i>
											New Complaints
											<?php
$rt = mysql_query("SELECT * FROM tblcomplaints where status='0'");
$num1 = mysql_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="inprocess-complaint.php">
											<i class="icon-tasks"></i>
											Processing Complaint
                   <?php 
                 
$rt = mysql_query("SELECT * FROM tblcomplaints where status='1'"); 
$num1 = mysql_num_rows($rt);
{?><b id="colyellow" class="label pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-complaint.php">
											<i class="icon-inbox"></i>
											Closed Complaints
	     <?php                   
$rt = mysql_query("SELECT * FROM tblcomplaints where status='2'");
$num1 = mysql_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								
							
							
							<li >
								<a href="feedbac.php">
									<i class="icon-tasks"></i>
									View Feedback
								</a>
							</li>
								
							<li >
								<a href="addadmin.php">
									<i class="icon-group"></i>
									Add-Admin
								</a>
							</li>
							

							<li>
								<a href="logout.php">
									<i class="icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
