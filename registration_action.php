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
		$name = mysql_escape_string(@$_POST["name"]);
		$id = mysql_escape_string(@$_POST["id"]);
		$idlen = strlen($id);
		if ($idlen < 6 || $idlen > 15) {
			//length error
			echo "<script>alert('".$lang[$userlang]['registration_idformat1']."');history.back();</script>";
			return;
		}
		for($i=0;$i<$idlen;$i++) {
			if(!(substr( $id, $i, 1 ) >= 'a' && substr( $id, $i, 1 ) <= 'z') 
			&& !(substr( $id, $i, 1 ) >= 'A' && substr( $$id, $i, 1 ) <= 'Z') 
			&& !(substr( $id, $i, 1 ) >= '1' && substr( $id, $i, 1 ) <= '9')) {
				//format error
				echo "<script>alert('".$lang[$userlang]['registration_idformat2']."');history.back();</script>";
				return;
			}
		}
		$pw = mysql_escape_string(@$_POST["pw"]);
		$pwlen = strlen($pw);
		if ($pwlen < 6 || $pwlen > 15) {
			//length error
			echo "<script>alert('".$lang[$userlang]['registration_pwformat1']."');history.back();</script>";
			return;
		}
		$pw = hash("sha256","Glorious".$pw."Kim");
		$gender = mysql_escape_string(@$_POST["gender"]);
		$class = mysql_escape_string(@$_POST["class"]);
		$major = mysql_escape_string(@$_POST["major"]);
		if ($class == null || $class == "") {
			$class = "2019";
		}
		$email = mysql_escape_string(@$_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			//format error
			echo "<script>alert('".$lang[$userlang]['registration_emailformat1']."');history.back();</script>";
			return;
		}
		$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
		if(mysqli_connect_errno()) {
			echo "Connection Failed".mysqli_connect_error();
			return;
		}
		$sql = "select num from accounts where id='$id'";
		$res = mysqli_query($conn,$sql);
		while($z = mysqli_fetch_array($res)) {
			//same id exists.
			echo "<script>alert('".$lang[$userlang]['registration_sameid']."');history.back();</script>";
			return;
			mysqli_close($conn);
			return;
		}
		
		$sql = "insert into accounts values(null, '$id', '$pw','$email','$name','$gender','$class','$major','None',0,1)";
		mysqli_query($conn, $sql);
		
		mysqli_close($conn);
		echo "<script>location.href='index.php';</script>";
		?>
	</body>
</html>