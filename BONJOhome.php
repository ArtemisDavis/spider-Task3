<?php
if(isset($_GET['fname']))
{
	$fname=strip_tags($_GET['fname']);
	$lname=strip_tags($_GET['lname']);
	echo "Welcome ".$fname." ".$lname;
}
else
{
	header("location:BONJOsignin.php");
}


?>
<html>
<head>
</head>
<body>

</body>
<html>