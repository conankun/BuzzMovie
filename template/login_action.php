<?php
session_start();
include_once("../header.php");
$id = mysql_escape_string($_POST["id"]);
$pw = mysql_escape_string($_POST["pw"]);
$pw = hash("sha256","Glorious".$pw."Kim");
$backpage = $_POST["backpage"];
$autologin = $_POST["autologin"];
if($backpage == '' || $backpage == null) {
	$backpage = "main.php";
}

$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}
$sql = "select pw from accounts where id='$id'";
$res = mysqli_query($conn,$sql);
$tr = false;
while($z = mysqli_fetch_array($res)) {
	if($z['pw']==$pw) {
		//success
		$tr = true;
	}
}

mysqli_close($conn);

if($tr == true) {
	$_SESSION['id'] = $id;
	//$_SESSION['key'] = hash('sha256', hash('sha256', $id.$pw));
	if(isset($autologin)) {
		setcookie("id",$id,time()+200000000000);
	}
	echo "<script>location.href='$backpage';</script>";
} else {
	echo "<script>alert('Login-Failed. Check your id or password.');history.back();</script>";
}

?>