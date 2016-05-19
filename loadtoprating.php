<?php 
	include_once("header.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<script>
			var starSelected = 0;
			var turn = 0;
			function goDetail(imdbid) {
				location.href="movie_detail.php?imdbid="+imdbid;
			}
			function initiate(sector, star, imdbid) {
				if(star == -1) {
					$.ajax({
						url: "loadmyrating.php",
						type: "GET",
						data:{'imdbid':imdbid},
						success:function(data) {
							if(data == "Inappropriate approach") {
								$('#rate'+sector).html('<?php echo $lang[$userlang]['rate'];?>');
								star = 0;
								turn = 0;
							} else if(data == "Unrated.") {
								// do not have
								$('#rate'+sector).html('<?php echo $lang[$userlang]['rate'];?>');
								star = 0;
								turn = 0;
							} else {
								//already have
								turn = 1;
								$('#rate'+sector).html('<?php echo $lang[$userlang]['unrate'];?>');
								star = parseInt(data);
							}
							starSelected = star;
							for(var j = 1; j <= star; j++) {
								document.getElementById("s"+sector+j.toString()).style.color = "#ee6e73";
							}
							for(var j = star + 1; j <= 5; j++) {
								document.getElementById("s"+sector+j.toString()).style.color = "BLACK";
							}
						},
						beforeSend:function() {
							
						}
					});
				} else {
					starSelected = star;
					for(var j = 1; j <= star; j++) {
						document.getElementById(sector+j.toString()).style.color = "#ee6e73";
					}
					for(var j = star + 1; j <= 5; j++) {
						document.getElementById(sector+j.toString()).style.color = "BLACK";
					}
				}
			}
		</script>
	</head>
	<body>
<?php
$filter = mysql_escape_string($_GET["filter"]);
if($uid == null || $uid=="") {
	echo $lang[$userlang]['noentriesfound'];
	return;
}
if($filter != "overall" && $filter != "gender" && $filter != "class" && $filter != "major") {
	echo $lang[$userlang]['noentriesfound'];
	return;
}

$conn = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
if(mysqli_connect_errno()) {
	echo $lang[$userlang]['noentriesfound'];
	return;
}
$sql = "select * from ratings order by rating desc limit 0, 10";
if ($filter != "overall") {
	$sql2 = "select * from accounts where id='$uid'";
	$res = mysqli_query($conn,$sql2);
	$my = "";
	while($z = mysqli_fetch_array($res)) {
		$my = $z[$filter];
		break;
	}
	mysqli_free_result($res);
	$sql = "select * from ratings_".$filter." where ".$filter." = '".$my."' order by rating desc limit 0,10";
}
$res = mysqli_query($conn, $sql);
$k = 0;
echo '<ul class="collection">';
while ($z = mysqli_fetch_array($res)) {
	$imdbid=$z['imdbid'];
	$data = file_get_contents("http://www.omdbapi.com/?i=".$imdbid."&y=&plot=short&r=json");
	$data = json_decode($data, true);		
	//validate
	$tr = (strcmp($data['Poster'],'N/A') == 0 ? false : true);
	//download image first
	$f = @fopen('movie_images/'.$imdbid.'.jpg','r');
	if ($f == null) {
		//if poster doesn't exist, download.
		if (strcmp($data['Poster'],'N/A') != 0) {
		@file_put_contents('movie_images/'.$imdbid.'.jpg', file_get_contents($data['Poster']));				
		}
	} else {
		fclose($f);
	}
	
	echo '<li class="collection-item avatar hoverable" style="cursor:pointer;">';
				
	if($tr == false) {
		echo '<img onclick=goDetail("'.$data['imdbID'].'")  src="images/notfound.png" alt="" class="circle" width="100px" height="100px">';
		$f = @fopen('movie_images/'.$data['imdbID'].'.jpg','r');
		if($f != null) {
			fclose($f);
			unlink('movie_images/'.$data['imdbID'].'.jpg');
		}
	} else {
		echo '<img onclick=goDetail("'.$data['imdbID'].'")  src="movie_images/'.$data['imdbID'].'.jpg" alt="" class="circle" width="100px" height="100px">';
	}
	echo '<span onclick=goDetail("'.$data['imdbID'].'")  class="title">'.$data['Title'].'('.$data['Year'].')</span>';
				
	echo '<p></p>';
				
	echo '<a class="waves-effect waves-light secondary-content modal-trigger" href="#modal'.$k.'" onclick=initiate("'.$k.'",-1,"'.$data['imdbID'].'") ><i class="material-icons">grade</i></a>';
				echo '</li>';
				?>
				<!-- Modal Structure -->
			  <div id="modal<?php echo $k;?>" class="modal bottom-sheet center-align">
			    <div class="modal-content">
			      <h5><?php echo $lang[$userlang]['howwasyourmovie'];?></h5>
			      <img class="hide-on-small-only" src="movie_images/<?php echo $data['imdbID'];?>.jpg" width=100px height=100px class="circle">
			      <br>
			      <p class="hide-on-small-only"><b><?php echo $data['Title']."(".$data['Year'].")";?></b></p>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>1">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>2">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>3">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>4">grade</i>
			      <i class="rating_star medium material-icons" id="s<?php echo $k;?>5">grade</i>
			      <script>
				      <?php
				      for($i = 5; $i>=1; $i--) {
					  ?>
					      $('#s<?php echo $k.$i; ?>').click(function () {
							   //enable - #26a69a
							   if(turn != 1) {
							   if (starSelected == <?php echo $i; ?>) {
								   //delete all
								for(var j = 1; j <= 5; j++) {
									document.getElementById('s<?php echo $k;?>'+j.toString()).style.color = "BLACK";
								}
								starSelected = 0;
							   } else {
								   <?php for($j = $i + 1; $j <= 5; $j++) { ?>
								   document.getElementById('s<?php echo $k.$j; ?>').style.color = "BLACK";
								   <?php } ?>
								    
								   <?php for($j = 1; $j <= $i; $j++) { ?>
								   document.getElementById('s<?php echo $k.$j; ?>').style.color = "#ee6e73";
								   <?php } ?>
								   starSelected = <?php echo $i; ?>;
							   }
							   }
					      });
					      
					      $('#s<?php echo $k.$i; ?>').mouseover(function () {
						      if(turn != 1) {
							<?php for($j = $i + 1; $j <= 5; $j++) { ?>
								document.getElementById('s<?php echo $k.$j; ?>').style.color = "BLACK";
							<?php } ?>
							    
							<?php for($j = 1; $j <= $i; $j++) { ?>
								document.getElementById('s<?php echo $k.$j; ?>').style.color = "#ee6e73";
							<?php } ?>
							}
					      });
					      
					      $('#s<?php echo $k.$i; ?>').mouseout(function () {
						      if(turn != 1) {
						  		for(var j = 1; j <= starSelected; j++) {
									document.getElementById('s<?php echo $k;?>'+j.toString()).style.color = "#ee6e73";
								}
							    for(var j = starSelected + 1; j <= 5; j++) {
									document.getElementById('s<?php echo $k;?>'+j.toString()).style.color = "BLACK";
								}
							}
					      });
				      <?php } ?>
				      $(document).ready(function() {
		  				$('#rate<?php echo $k;?>').click(function(){
				  				$.ajax({
					  				url: "rate_movie.php",
					  				type: "GET",
					  				data: {imdbid:'<?php echo $data['imdbID'];?>', rating:starSelected},
					  				success:function(data) {
						  				if(turn == 1) {
							  				Materialize.toast('<?php echo $lang[$userlang]['sucunrat'];?>',4000);
						  				} else {
						  					Materialize.toast('<?php echo $lang[$userlang]['sucrat'];?>',4000);
						  				}
						  				turn = 1-turn;
					  				},
					  				beforeSend:function() {
						  				
					  				}
			  					});
		  				});
	  				});
				  </script>
			    </div>
			    <div class="modal-footer">
			      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><?php echo $lang[$userlang]['cancel'];?></a>
			      <a href="#!" id="rate<?php echo $k;?>" class=" modal-action modal-close waves-effect waves-green btn-flat"><?php echo $lang[$userlang]['rate'];?></a>
			    </div>
			  </div>
				
				<?php
		$k++;
		
}
echo "</ul>";

mysqli_free_result($res);

mysqli_close($conn);


?>
		<script>
		  	$(document).ready(function(){
		  		// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		  		$('.modal-trigger').leanModal();
			});
		</script>
	</body>
</html>