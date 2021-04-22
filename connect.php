<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'project_db';

$conn = mysql_connect($host,$user,$password) or die(mysql_error());
mysql_select_db($database, $conn) or die (mysql_error());
?>