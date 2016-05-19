<?php
include_once("header.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset='utf8'>
		<title><?php echo $lang[$userlang]['title']." :: ".$lang[$userlang]['login'];?></title>
	</head>
	<body>
<?php
$key = $ukey;
$name = mysql_escape_string($_POST["name"]);
$pw = mysql_escape_string($_POST["pw"]);
$pwlen = strlen($pw);
if ($pwlen < 6 || $pwlen > 15) {
	//length error
	echo "<script>alert('".$lang[$userlang]['registration_pwformat1']."');history.back();</script>";
	return;
}
$pw = hash("sha256","Glorious".$pw."Kim");
$email = mysql_escape_string($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//format error
	echo "<script>alert('".$lang[$userlang]['registration_emailformat1']."');history.back();</script>";
	return;
}
$major = mysql_escape_string($_POST["major"]);
$class = mysql_escape_string($_POST["class"]);
$gender = mysql_escape_string($_POST["gender"]);
$interest = mysql_escape_string($_POST["interest"]);
$intlen = strlen($interest);
if ($intlen > 10000) {
	//length error
	return;
}
$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}
$sql = "select num,pw,isAdmin from accounts where id='$uid'";
$res = mysqli_query($conn,$sql);
$tr = false;
$num = 0;
$isAdmin = 0;
while($z = mysqli_fetch_array($res)) {
	if(hash('sha256', hash('sha256', $uid.$z['pw'])) == $key) {
		$tr = true;
		$num = $z['num'];
		$isAdmin = $z['isAdmin'];
		//authentication successful.
	}
	break;
}
if($tr == false) {
	echo "Inappropriate approach";
	mysqli_close($conn);
	return;
}
$sql = "delete from accounts where num = ".$num;
mysqli_query($conn, $sql);
$sql = "insert into accounts values($num, '$uid', '$pw','$email','$name','$gender','$class','$major','$interest',$isAdmin,1)";
mysqli_query($conn, $sql);

mysqli_close($conn);
echo "<script>location.href='edit_profile.php';</script>";
?>
	</body>
</html>