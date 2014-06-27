<html>
<title>BONJO</title>
<style>
.mbox
{
	width:300px;
	height:400px;
	background-color:#FFF;
	border-width:thick;
	border-color:#333;
	box-shadow:10px 10px 10px #666;
	vertical-align:central;
	margin-left:+500px;
	
}
.ibox
{
	position:relative;
	width:300px;
	height:300px;
	background-color:#CCC;
	vertical-align:central;
}
.font
{
	text-align:center;
	font-family:Consolas;
	font-stretch:extra-expanded;
	font-size:48px;
	color:#FFF;
}
.infont
{
	text-align:left;
	font-family:Consolas;
	font-size:18px;
	color:#FFF;
}
.btn
{
	width:65px;
	height:30px;
	margin-left:+115px;
	background-color:#FFF;
	color:#CCC;
	font-family:Consolas;
	font-size:14px;
	font-weight:bold;
}
</style>
	
<head>

</head>
<body>
<div id="alerts" class="ibox" style="margin-left:0px; margin-top:-15px; float:left; background-color:#FFF">
<div class="ibox" id="alert_err" style="margin-left:0px; visibility:hidden; width:160px;  height:160px;box-shadow:10px 10px 10px #666;">
<p class="infont" style="font-size: 16px"><b>Wrong Username Or Password</b></p>
</div>
</div>
<?php
if(isset($_GET['remarks']))
{
	$remarks=$_GET['remarks'];
	if($remarks=="fail")
	{
		echo"<script>document.getElementById('alert_err').style.visibility='visible'</script>";
	}
}
?>

<div id="container" class="mbox">

<div class="ibox">
<h1 class="font">SIGN IN</h1>
<br>

<form name="in" action="chk.php" method="post">
<p class="infont" style="margin-left:15px;"><b>Username :</b><input type="text" id="uname" name="uname"/></p>

<p class="infont" style="margin-left:15px;"><b>Password :</b><input type="password" id="pword" name="pword"/></p>
<br>
<input type="submit" value="SUBMIT" id="submit" class="btn"/>
</form>
</div>
<h1 class="font" style="color:#CCC; font-size:25px; text-align:center">FORGOT PASSWORD ?</h3>

<h1 class="font" style="color:#CCC; font-size:25px; text-align:center"><a href="http://localhost/MY_WORKS/BONJOsignup1.php"> SIGN UP </a></h2>
</div>
</body>
<html>