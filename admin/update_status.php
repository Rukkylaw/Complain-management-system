
<?php
session_start();
include('../connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}?>
<?php
	$cid = $_GET['ref_num'];
	$qr = mysql_query("UPDATE tblcomplaints SET status ='1' WHERE ref_num='$cid'");
	header("location:complaint-details.php?cid=$cid");

?>