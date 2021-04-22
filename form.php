<!DOCTYPE html>
<html>
<head>
	<title>finalproject</title>
</head>
<body>
<h3 style="text-align: center; font-size: 30px; font-family: ariel">Enter student list into database.</h3>
  <div style="border: 2px solid violet">
  <form class="form-horizontal" enctype="multipart/form-data" method="POST" id="block-validate" style="padding-top: 20px; padding-bottom: 20px; font-size: 18px; font-family: ariel">
     <div class="form-group">
         <label class="control-label col-lg-4">Matric number</label>
           <div class="col-lg-4">
            <input type="text" id="required2" name="Matricnumber" placeholder="15/52ha***" class="form-control" />
           </div>
      </div>
      <div class="form-group">
         <label class="control-label col-lg-4">Surname</label>
          <div class="col-lg-4">
            <input type="text" id="text" name="Surname" class="form-control" />
           </div>
      </div>
      <div class="form-group">
         <label class="control-label col-lg-4">Middlename</label>
          <div class="col-lg-4">
            <input type="text"  name="Middlename" class="form-control" />
           </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-lg-4">Firstname</label>
        <div class="col-lg-4">
         <input type="text"  name="Firstname" class="form-control" />
        </div>
      </div>
     <div class="form-group">
        <label class="control-label col-lg-4">Sex</label>
          <div class="col-lg-4" style="font-size: 17px">
            <input type="radio" name="sex" value="male" >Male<br>
            <input type="radio" name="sex" value="female" >Female<br>
            </div>
      </div>

 <div class="form-group">
        <label class="control-label col-lg-4">Faculty</label>
          <div class="col-lg-4">
           <input type="text" name="Faculty" class="form-control" />
          </div>
      </div>      

       <div class="form-group">
        <label class="control-label col-lg-4">Department</label>
          <div class="col-lg-4">
           <input type="text" name="Department" class="form-control" />
          </div>
      </div>      
     
     
       <div class="form-group">
        <label class="control-label col-lg-4">Level</label>
          <div class="col-lg-4">
           <input type="number" name="Level" class="form-control" />
          </div>
      </div>      
     
       <div class="form-group">
        <label class="control-label col-lg-4">Profile picture</label>
          <div class="col-lg-4">
           <input type="file" name="image"/>
          </div>
      </div>
     

     <div class="form-actions no-margin-bottom" style="text-align:center;">
      <input type="submit" value="Register"  name="student" class="btn btn-primary btn-lg " style="background-color: violet">
      </div>
  </form>
  </div>

<?php
require_once("connect.php");

 if(isset($_POST['student'])){
 extract($_POST);
 $Matricnumber = $_POST['Matricnumber'];
 $surname = $_POST['Surname'];
 $middlename = $_POST['Middlename'];
 $firstname = $_POST['Firstname'];
 $sex = $_POST['sex'];
 $faculty = $_POST['Faculty'];
 $department = $_POST['Department'];
 $level = $_POST['Level'];
 $photo = $_FILES['image']['name'];

 if(move_uploaded_file($_FILES["image"]["tmp_name"], "image/".$photo)){

 $sql = "INSERT INTO student(Matricnumber,Surname,Middlename,Firstname,Sex,Faculty,Department,Level,image) VALUES('$Matricnumber','$surname','$middlename','$firstname','$sex','$faculty','$department',$level','$photo')" or die(mysql_error());

 mysql_query($sql) or die(mysql_error());
}}
?>
<h2>Cell that spans two rows:</h2>
<table style="width:100%">
  <tr>
    <th>Name:</th>
    <td>Bill Gates</td>
  </tr>
  <tr>
    <th rowspan="2">Telephone:</th>
    <td>555 77 854</td>
  </tr>
  <tr>
    <td>555 77 855</td>
  </tr>
</table>


</body>
</html>
<h4 style="font-family: poor richard; font-size: 19px; margin-left: -17px;">Main Menu</h4>