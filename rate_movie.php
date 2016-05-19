<?php
include_once("header.php");
$imdbid = mysql_escape_string($_GET["imdbid"]);
$rating = mysql_escape_string($_GET["rating"]);
/*
Add id vertification soon!!!! 	
*/

if($rating == null) {
	$rating = 0;
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
$myrating = 0;
while($z = mysqli_fetch_array($res)) {
	$tr = true;
	$myrating = $z["rating"];
	break;
}
mysqli_free_result($res);
$sql = "select * from accounts where id='$uid'";
$res = mysqli_query($conn,$sql);
$mymajor = "";
$mygender = "";
$myclass="";
while($z = mysqli_fetch_array($res)) {
	$mymajor = $z["major"];
	$mygender = $z["gender"];
	$myclass = $z["class"];
	break;
}
mysqli_free_result($res);
if($tr == false) {
	//insert
	$sql = "insert into rating_log values(null, '$uid', '$imdbid', $rating)";

	mysqli_query($conn,$sql);
	
	
	//overall rating
	$sql = "select * from ratings where imdbid='$imdbid'";
	
	$res = mysqli_query($conn,$sql);
	$tr2 = 0;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr2 = 1;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	if($tr2 == 1) {
		$rate1 = $rat * $ratn;
		$rate1 = $rate1 + $rating;
		$ratn = $ratn + 1;
		
		$rate1 = $rate1 / (double)$ratn;
		
	
		
		$sql = "update ratings set rating = $rate1 where imdbid='$imdbid'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings set rating_num=rating_num+1 where imdbid='$imdbid'";
		mysqli_query($conn,$sql);
		
		echo $rate1;
		
	} else {
		$sql = "insert into ratings values(null, '$imdbid', $rating, 1)";
	
		mysqli_query($conn,$sql);
		
		echo $rating;
	}
	
	//major rating
	$sql = "select * from ratings_major where imdbid='$imdbid' and major='$mymajor'";
	$res = mysqli_query($conn,$sql);
	$tr2 = 0;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr2 = 1;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	if($tr2 == 1) {
		$rate1 = $rat * $ratn;
		$rate1 = $rate1 + $rating;
		$ratn = $ratn + 1;
		
		$rate1 = $rate1 / (double)$ratn;
		
		$sql = "update ratings_major set rating = $rate1 where imdbid='$imdbid' and major='$mymajor'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_major set rating_num=rating_num+1 where imdbid='$imdbid' and major='$mymajor'";
		mysqli_query($conn,$sql);
		
		
	} else {
		$sql = "insert into ratings_major values(null, '$imdbid','$mymajor', $rating, 1)";
	
		mysqli_query($conn,$sql);
		
	}
	//gender rating
	$sql = "select * from ratings_gender where imdbid='$imdbid' and gender='$mygender'";
	$res = mysqli_query($conn,$sql);
	$tr2 = 0;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr2 = 1;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	if($tr2 == 1) {
		$rate1 = $rat * $ratn;
		$rate1 = $rate1 + $rating;
		$ratn = $ratn + 1;
		
		$rate1 = $rate1 / (double)$ratn;
		
		$sql = "update ratings_gender set rating = $rate1 where imdbid='$imdbid' and gender='$mygender'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_gender set rating_num=rating_num+1 where imdbid='$imdbid' and gender='$mygender'";
		mysqli_query($conn,$sql);
		
		
	} else {
		$sql = "insert into ratings_gender values(null, '$imdbid','$mygender', $rating, 1)";
	
		mysqli_query($conn,$sql);
		
	}
	//class rating
	$sql = "select * from ratings_class where imdbid='$imdbid' and class='$myclass'";
	$res = mysqli_query($conn,$sql);
	$tr2 = 0;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr2 = 1;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	if($tr2 == 1) {
		$rate1 = $rat * $ratn;
		$rate1 = $rate1 + $rating;
		$ratn = $ratn + 1;
		
		$rate1 = $rate1 / (double)$ratn;
		
		$sql = "update ratings_class set rating = $rate1 where imdbid='$imdbid' and class='$myclass'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_class set rating_num=rating_num+1 where imdbid='$imdbid' and class='$myclass'";
		mysqli_query($conn,$sql);
		
		
	} else {
		$sql = "insert into ratings_class values(null, '$imdbid','$myclass', $rating, 1)";
	
		mysqli_query($conn,$sql);
		
	}
	//echo "Rated.";
} else {
	//erase
	$sql = "delete from rating_log where imdbid='$imdbid' and userid = '$uid'";
	mysqli_query($conn,$sql);
	
	//Overall rating
	$sql = "select * from ratings where imdbid='$imdbid'";
	$res = mysqli_query($conn,$sql);
	$tr = false;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr = true;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	$rate1 = $rat * $ratn;
	$rate1 = $rate1 - $myrating;
	$ratn = $ratn - 1;
	
	if($ratn == 0) {
		$sql = "delete from ratings where imdbid='$imdbid'";
		echo "Unrated.";
		mysqli_query($conn,$sql);
	} else {
		$rate1 = $rate1 / (double)$ratn;
		$sql = "update ratings set rating = $rate1 where imdbid='$imdbid'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings set rating_num=rating_num-1 where imdbid='$imdbid'";
		mysqli_query($conn,$sql);
		
		echo $rate1;
	}
	
	//Major rating
	$sql = "select * from ratings_major where imdbid='$imdbid' and major='$mymajor'";
	$res = mysqli_query($conn,$sql);
	$tr = false;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr = true;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	$rate1 = $rat * $ratn;
	$rate1 = $rate1 - $myrating;
	$ratn = $ratn - 1;
	
	if($ratn == 0) {
		$sql = "delete from ratings_major where imdbid='$imdbid' and major='$mymajor'";
		mysqli_query($conn,$sql);
	} else {
		$rate1 = $rate1 / (double)$ratn;
		$sql = "update ratings_major set rating = $rate1 where imdbid='$imdbid' and major='$mymajor'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_major set rating_num=rating_num-1 where imdbid='$imdbid' and major='$mymajor'";
		mysqli_query($conn,$sql);
		
	}
	
	//gender rating
	
	$sql = "select * from ratings_gender where imdbid='$imdbid' and gender='$mygender'";
	$res = mysqli_query($conn,$sql);
	$tr = false;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr = true;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	$rate1 = $rat * $ratn;
	$rate1 = $rate1 - $myrating;
	$ratn = $ratn - 1;
	
	if($ratn == 0) {
		$sql = "delete from ratings_gender where imdbid='$imdbid' and gender='$mygender'";
		mysqli_query($conn,$sql);
	} else {
		$rate1 = $rate1 / (double)$ratn;
		$sql = "update ratings_gender set rating = $rate1 where imdbid='$imdbid' and gender='$mygender'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_gender set rating_num=rating_num-1 where imdbid='$imdbid' and gender='$mygender'";
		mysqli_query($conn,$sql);
		
	}
	
	
	//class rating

	$sql = "select * from ratings_class where imdbid='$imdbid' and class='$myclass'";
	$res = mysqli_query($conn,$sql);
	$tr = false;
	$rat = 0;
	$ratn = 0;
	while($z = mysqli_fetch_array($res)) {
		$tr = true;
		$rat = $z['rating'];
		$ratn = $z['rating_num'];
		break;
	}
	mysqli_free_result($res);
	$rate1 = $rat * $ratn;
	$rate1 = $rate1 - $myrating;
	$ratn = $ratn - 1;
	
	if($ratn == 0) {
		$sql = "delete from ratings_class where imdbid='$imdbid' and class='$myclass'";
		mysqli_query($conn,$sql);
	} else {
		$rate1 = $rate1 / (double)$ratn;
		$sql = "update ratings_class set rating = $rate1 where imdbid='$imdbid' and class='$myclass'";
		mysqli_query($conn,$sql);
		
		$sql = "update ratings_class set rating_num=rating_num-1 where imdbid='$imdbid' and class='$myclass'";
		mysqli_query($conn,$sql);
		
	}	

}
mysqli_close($conn);

?>