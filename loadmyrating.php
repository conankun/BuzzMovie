<?php
include_once("header.php");
$imdbid = mysql_escape_string($_GET["imdbid"]);
if(!isset($imdbid)) {
	echo "Inappropriate approach";
}
if(!isset($imdbid)) {
	echo "Inappropriate approach";
}
$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo "Connection Failed".mysqli_connect_error();
	return;
}
$sql = "select pw from accounts where id='$uid'";
$res = mysqli_query($conn,$sql);
$tr = false;
while($z = mysqli_fetch_array($res)) {
	if(hash('sha256', hash('sha256', $uid.$z['pw'])) == $ukey) {
		$tr = true;
		//authentication successful.
	}
	break;
}
if($tr == false) {
	echo "Inappropriate approach";
}
mysqli_free_result($res);

$sql = "select * from rating_log where imdbid='$imdbid' and userid = '$uid'";
$res = mysqli_query($conn,$sql);
$tr = false;
while($z = mysqli_fetch_array($res)) {
	$tr = true;
	echo sprintf("%d", $z['rating']);
	break;
}
if($tr == false) {
	echo "Unrated.";
}
mysqli_close($conn);


?>