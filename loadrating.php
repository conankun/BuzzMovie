<?php
include_once("header.php");
$imdbid = mysql_escape_string($_GET["imdbid"]);

$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}
$sql = "select rating,imdbid from ratings where imdbid='$imdbid'";
$res = mysqli_query($conn,$sql);
$tr = false;
while($z = mysqli_fetch_array($res)) {
	$tr = true;
	echo sprintf("%.1lf", $z['rating']);
	break;
}
if($tr == false) {
	echo "Unrated.";
}
mysqli_close($conn);


?>