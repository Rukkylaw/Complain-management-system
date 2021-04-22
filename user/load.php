 <?php 
require_once('../session.php');
require ('../connect.php');
	 if(isset($_POST['compmessage'])){
	 	// var_dump($_FILES);
 		$_SESSION['Matricnumber'] = $_SESSION['Matricnumber'];
 		$attachfile = '';
 		if (isset($_FILES['attach'])) {
	 		$attachfile = $_FILES['attach']['name'];
 			# code...
 		}


		$ext = pathinfo($attachfile,PATHINFO_EXTENSION);
			if(move_uploaded_file( $_FILES['attach']['tmp_name'],'attach/'.$attachfile)){

		
				$affairs = mysql_real_escape_string($_POST['affairs']);
				$Matricnumber = mysql_real_escape_string($_POST['Matricnumber']);
				$category = mysql_real_escape_string($_POST['category']);
				$message = mysql_real_escape_string($_POST['message']);
				$status = 0;
				$attach = mysql_real_escape_string($attachfile);
				$refnumber = strtoupper (uniqid());
				
				$insmessage = "INSERT INTO tblcomplaints(`ref_num`, `affairs`,`Matricnumber`,`category`,`message`,`attach`,`status`) VALUES ('$refnumber','$affairs','$Matricnumber','$category','$message','$attachfile','$status')";
				
				mysql_query($insmessage) or die(mysql_error());
			}


			else{
				echo "Unable to upload file";
			}
			?>
			<script type="text/javascript">
				alert("Message Sent");
				window.location.href="history.php";
			</script>

			<?php
	 }
		//$result2 = mysql_query("SELECT * FROM student WHERE id ='$_SESSION[id]'");
			//while($row = mysql_fetch_array($result2))
	 {?>
 <?php } ?>