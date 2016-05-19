<?php
	session_start();
	$backpage = $_GET["backpage"];
	if($backpage == '' || $backpage == null) {
		$backpage = "main.php";
	}
	setcookie("id","",time()-1);
	session_destroy();
	echo "<script>location.href='$backpage';</script>";	
?>