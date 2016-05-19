<?php
include_once("../header.php");
$name = mysql_escape_string($_GET["name"]);
$id = mysql_escape_string($_GET["id"]);
$pw = mysql_escape_string($_GET["pw"]);
$pw = hash("sha256","Glorious".$pw."Kim");
$email = mysql_escape_string($_GET["email"]);

$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}
$sql = "select num from accounts where id='$id'";
$res = mysqli_query($conn,$sql);
while($z = mysqli_fetch_array($res)) {
	//same id exists.
	echo "Same ID Already Exists.";
	mysqli_close($conn);
	return;
}

$sql = "insert into accounts (num, id, pw, email, name, isAdmin, status) values(null, '$id', '$pw','$email','$name',0,1)";
mysqli_query($conn, $sql);

mysqli_close($conn);
echo "Successful";
?>