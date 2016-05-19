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
		$prev = xss_prevention(@$_POST["prev"]);
		if($prev == "" || $prev == null) {
			$prev = "index.php";
		}
		$id = mysql_escape_string(@$_POST["id"]);
		$pw = mysql_escape_string(@$_POST["pw"]);
		$pw = hash("sha256","Glorious".$pw."Kim");
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
		
		if($tr == true) {
			$_SESSION['key'] = hash('sha256', hash('sha256', $id.$pw)); // this will be a session key
			$_SESSION['uid'] = $id;
			echo "<script>location.href='".$prev."'</script>";
		} else {
			echo "<script>alert('".$lang[$userlang]['login_fail']."');history.back();</script>";
		}
		
		mysqli_close($conn);
		
		?>
	</body>
</html>