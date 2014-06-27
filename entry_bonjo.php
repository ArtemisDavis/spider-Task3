<html>
<head></head>
<body>
<?php

session_start();

$con=mysqli_connect("localhost","root") or die("Connection Failed In First Step");
mysqli_select_db($con,"bonjo_main") or die("Connection Failed In Second Step");


$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$mail=mysqli_real_escape_string($con,$_POST['mail']);
$dofb=mysqli_real_escape_string($con,$_POST['dofby']).".".mysqli_real_escape_string($con,$_POST['dofbm']).".".mysqli_real_escape_string($con,$_POST['dofbd']);

$sex=mysqli_real_escape_string($con,$_POST['sex']);
$uname=mysqli_real_escape_string($con,$_POST['uname']);
$pword=sha1(mysqli_real_escape_string($con,$_POST['pword']));
$rpword=mysqli_real_escape_string($con,$_POST['rpword']);
$github=mysqli_real_escape_string($con,$_POST['ghblink']);
$dept=mysqli_real_escape_string($con,$_POST['dpt']);
$intrst=mysqli_real_escape_string($con,$_POST['intrst']);

// Data Formating

$fname=strtolower($fname);
$fname=ucfirst($fname);

$lname=strtolower($lname);
$lname=ucfirst($lname);

$regexpmail = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

$regexppword = "/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/";

$regexpgithub = "/^(?:http\:\/\/github\.com\/|https\:\/\/github\.com\/)/";




if(preg_match($regexpmail,$mail))
{
}
else
{
	header("location: BONJOsignup1.php?remarks=mail");
}

$result=mysqli_query($con,"SELECT * FROM users WHERE uname='$uname';");
if(mysqli_num_rows($result))
{
	header("location: BONJOsignup1.php?remarks=uname");
}

if(!preg_match($regexppword,$pword))
{
	header("location: BONJOsignup1.php?remarks=pword");
}

if(strcmp($pword,$rpword)!=0)
{
	header("location: BONJOsignup1.php?remarks=rpword");
}

if(preg_match($regexpgithub,$github))
{
	
}
else
{
	header("location: BONJOsignup1.php?remarks=git");
}
if($_FILES['pic']['error']>0 ||$_FILES['pic']['size']>204800 )
{
		header("location: BONJOsignup1.php?remarks=pic");
}
else
{
	$tmp_name=$_FILES['pic']['tmp_name'];
	$pic_name=$_FILES['pic']['name'];
	move_uploaded_file($tmp_name,"uploads/$pic_name");
}
	
if(!mysqli_query($con,"INSERT INTO users(fname, lname, email, dofb, sex, uname, pword, github, dept, pic, intrst) VALUES ('$fname','$lname','$mail','$dofb','$sex','$uname','$pword','$github','$dept','$pic_name','$intrst');"))
{
	die('Error: ' . mysqli_error($con));
	echo"<p> Please retry again at this <a href='bonjosignup1.php'>link</a></p>";
}
else
{
mysqli_close($con);
header("location: BONJOhome.php?fname=$fname&lname=$lname");
}

?>

</body>
</html>
