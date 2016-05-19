<?php
	session_start();
	
	$uid = @$_SESSION['uid'];
	$ukey = @$_SESSION['key'];
	
	/*
		Mysql Connection Info
	*/
	
	//contains mysql connection information.
	include_once("../header.php");
	
	if($uid != null) {
		$con = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
		$sql = "select isAdmin from accounts where id='$uid'";
		$res = mysqli_query($con, $sql);
		$isAdmin = 0;
		while($z = mysqli_fetch_array($res)) {
			$isAdmin = $z['isAdmin'];
		}
		mysqli_free_result($res);
		mysqli_close($con);
	}
	
	function xss_prevention($str) {
		$str = str_replace("<","&lt;",$str);
		$str = str_replace("<","&gt;",$str);
		$str = str_replace("&","&amp;",$str);
		$str = str_replace("\"","&quot;",$str);
		return $str;
	}
	
	include_once("translate.php");
	
		
?>