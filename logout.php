<?php
	include_once("header.php");	
	$prev = xss_prevention(@$_POST["prev"]);
	if($prev == "" || $prev == null) {
		$prev = "index.php";
	}
	session_destroy();
?>
<script>
	location.href="<?php echo $prev;?>";
</script>