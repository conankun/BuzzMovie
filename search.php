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
						$(document).ready(function() {
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
			//<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
			$search  = @$_POST["search"];
			$genre = @$_POST["genre"];
			if(!isset($search) || !isset($genre)) {
				echo $lang[$userlang]['noentriesfound'];
				return;
			}
			if(strcmp($genre, "movie") != 0 && strcmp($genre, "series") != 0 && strcmp($genre, "episode") != 0) {
				echo $lang[$userlang]['noentriesfound'];
				return;
			}
			$search = str_replace(" ","%20",$search);
			$data = file_get_contents("http://www.omdbapi.com/?s=".$search."&r=json&page=1&type=".$genre);
			$data = json_decode($data, true);
			
			if(strcmp($data['Response'],"False") == 0) {
				echo $lang[$userlang]['noentriesfound'];
				return;
			}
			
			$total = $data['totalResults'];
			echo '<ul class="collection">';
			$limit = $total > 10 ? 10 : $total;
			for($k=0;$k<$limit;$k++) {
				$data2 = $data['Search'][$k];
				
				//validate
				$tr = (strcmp($data2['Poster'],'N/A') == 0 ? false : true);
				//download image first
				$f = @fopen('movie_images/'.$data2['imdbID'].'.jpg','r');
				if ($f == null) {
					//if poster doesn't exist, download.
					if (strcmp($data2['Poster'],'N/A') != 0) {
						@file_put_contents('movie_images/'.$data2['imdbID'].'.jpg', file_get_contents($data2['Poster']));	
						
					}
				} else {
					fclose($f);
				}
				echo '<li class="collection-item avatar hoverable" style="cursor:pointer;">';
				
				if($tr == false) {
					echo '<img onclick=goDetail("'.$data2['imdbID'].'")  src="images/notfound.png" alt="" class="circle" width="100px" height="100px">';
					$f = @fopen('movie_images/'.$data2['imdbID'].'.jpg','r');
					if($f != null) {
						fclose($f);
						unlink('movie_images/'.$data2['imdbID'].'.jpg');
					}
				} else {
					echo '<img onclick=goDetail("'.$data2['imdbID'].'")  src="movie_images/'.$data2['imdbID'].'.jpg" alt="" class="circle" width="100px" height="100px">';
				}
				echo '<span onclick=goDetail("'.$data2['imdbID'].'")  class="title">'.$data2['Title'].'('.$data2['Year'].')</span>';
				
				echo '<p></p>';
				
				echo '<a class="waves-effect waves-light secondary-content modal-trigger" href="#modal'.$k.'" onclick=initiate("'.$k.'",-1,"'.$data2['imdbID'].'") ><i class="material-icons">grade</i></a>';
				echo '</li>';
				
				?>
				<!-- Modal Structure -->
			  <div id="modal<?php echo $k;?>" class="modal bottom-sheet center-align">
			    <div class="modal-content">
			      <h5><?php echo $lang[$userlang]['howwasyourmovie'];?></h5>
			      <?php if($tr) {?>
			      <img class="hide-on-small-only" src="movie_images/<?php echo $data2['imdbID'];?>.jpg" width=100px height=100px class="circle">
			      <?php } else {?>
			      <img class="hide-on-small-only" src="images/notfound.png" width=100px height=100px class="circle">
			      <?php } ?>
			      <br>
			      <p class="hide-on-small-only"><b><?php echo $data2['Title']."(".$data2['Year'].")";?></b></p>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>1">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>2">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>3">grade</i>
			      <i class="medium material-icons rating_star" id="s<?php echo $k;?>4">grade</i>
			      <i class="rating_star medium material-icons" id="s<?php echo $k;?>5">grade</i>
			      <script>
				      $(document).ready(function() {
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
		  				
		  				$('#rate<?php echo $k;?>').click(function(){
				  				$.ajax({
					  				url: "rate_movie.php",
					  				type: "GET",
					  				data: {imdbid:'<?php echo $data2['imdbID'];?>', rating:starSelected},
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
			}
			echo '</ul>';
		
		/*
			
			<ul class="collection">
				    <li class="collection-item avatar">
				      <img src="images/yuna.jpg" alt="" class="circle">
				      <span class="title">Title</span>
				      <p>First Line <br>
				         Second Line
				      </p>
				      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle">folder</i>
				      <span class="title">Title</span>
				      <p>First Line <br>
				         Second Line
				      </p>
				      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle green">insert_chart</i>
				      <span class="title">Title</span>
				      <p>First Line <br>
				         Second Line
				      </p>
				      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle red">play_arrow</i>
				      <span class="title">Title</span>
				      <p>First Line <br>
				         Second Line
				      </p>
				      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
				    </li>
			  	</ul>
			  	
		*/
		?>
			
			  
			  <script>
				  $(document).ready(function(){
				    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
				    $('.modal-trigger').leanModal();
				  });
			  </script>
	</body>
</html>