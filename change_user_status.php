<?php
include_once("header.php");
if(!$isAdmin) return;
$id = mysql_escape_string($_GET["id"]);
$status = mysql_escape_string($_GET["status"]);

//$key = mysql_escape_string($_GET["key"]);

$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}

$sql = "update accounts set status=$status where id='$id'";
mysqli_query($conn,$sql);
echo $status;
mysqli_close($conn);


?>