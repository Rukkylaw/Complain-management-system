<?php
$id = $_GET['id'];
// block any attempt to explore the filesystem
if (isset($_GET['file'])&& basename($_GET['file']) == $_GET['file']) {
$getfile = $_GET['file'];
}
else {
$getfile = NULL;
}
// define error handling
$nogo = 'Sorry, download unavailable';
if (!$getfile) {
// go no further if filename not set
//echo $nogo;
?>
<script type="text/javascript">
	alert("jhghjghjb");
	window.location.href="view_details.php?<?php base64_encode($_GET['id']) ?>";
</script>

<?php

} 
else {
// define the pathname to the file
$filepath = 'attach/'.$getfile;
// check that it exists and is readable
if (file_exists($filepath) && is_readable($filepath)) {
// get the file's size and send the appropriate headers
$size = filesize($filepath);
header('Content-Type: application/octet-stream');
header('Content-Length: '.$size);
header('Content-Disposition: attachment; filename='.$getfile);
header('Content-Transfer-Encoding: binary');
// open the file in binary read-only mode
// suppress error messages if the file can't be opened
$file = @ fopen($filepath, 'rb');
if ($file) {
// stream the file and exit the script when complete
fpassthru($file);
exit;
}
else {
echo "$nogo";
}
}
else { //echo $nogo;?>

<script type="text/javascript">
	alert("Sorry, download unavailable");
	window.location.href="view_details.php?id=<?php echo base64_encode($id) ?>";
</script>

<?php
//echo $id;
}
}
?>