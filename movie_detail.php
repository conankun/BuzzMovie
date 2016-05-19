<?php include_once("header.php"); ?>
<!doctype html>
<html>
	<head>
		<title><?php echo $lang[$userlang]['title']; ?></title>
		
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/materialize.css" rel="stylesheet" type="text/css" media="screen,projection"/>
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		
		<script src="js/materialize.js" type="text/javascript"></script>
		
		
		<script>
			$(document).ready(function() {
				$('.button_side').sideNav(); 
				$(".button-collapse").sideNav();
				$('select').material_select();
			});
			var star = 0;
			var starSelected = 0;
			var turn = 0;
			
			function initiate(star, imdbid) {
				if(star == -1) {
					$.ajax({
						url: "loadmyrating.php",
						type: "GET",
						data:{'imdbid':imdbid},
						success:function(data) {
							
							if(data == "Inappropriate approach") {
								$('#ratebutton1').html('<?php echo $lang[$userlang]['rate'];?>');
								star = 0;
								turn = 0;
							} else if(data == "Unrated.") {
								// do not have
								$('#ratebutton1').html('<?php echo $lang[$userlang]['rate'];?>');
								star = 0;
								turn = 0;
							} else {
								//already have
								turn = 1;
								$('#ratebutton1').html('<?php echo $lang[$userlang]['unrate'];?>');
								star = parseInt(data);
							}
							starSelected = star;
							for(var j = 1; j <= star; j++) {
								document.getElementById("ss"+j.toString()).style.color = "#ee6e73";
							}
							for(var j = star + 1; j <= 5; j++) {
								document.getElementById("ss"+j.toString()).style.color = "BLACK";
							}
						},
						beforeSend:function() {
							
						}
					});
				}
			}
			
			function rating_update(imdbid) {
				$.ajax({
					url: "loadrating.php",
					type: "GET",
					data:{'imdbid':imdbid},
					success:function(data) {
						if(data == "Inappropriate approach") {
							star = 0;
							turn = 0;
						} else if(data == "Unrated.") {
							// do not have
							star = 0;
							turn = 0;
						} else {
							//already have
							star = parseFloat(data);
						}
						for(var j = 1; j <= parseInt(star); j++) {
							document.getElementById("s"+j.toString()).style.color = "#ee6e73";
						}
						for(var j = parseInt(star) + 1; j <= 5; j++) {
							document.getElementById("s"+j.toString()).style.color = "BLACK";
						}
						$('#rate1').html((Math.round(star * 10)/10).toString()+(((Math.round(star * 10)/10) - parseInt((Math.round(star * 10)/10))) == 0 ? ".0" : "")+"/5.0");
					},
					beforeSend:function() {
						
					}
				});
			}
			
		</script>
	</head>
	<body>
	<?php include_once("nav_bar.php"); ?>
	<?php
		$imdbid = $_GET['imdbid'];
		if(!isset($imdbid)) {
			//return;
			echo "Inappropriate approach.";
			return;
		}
		$data = file_get_contents("http://www.omdbapi.com/?i=".$imdbid."&y=&plot=full&r=json");
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
		$imgtag = "";
		if($tr == false) {
			$imgtag = '<img class="materialboxed" data-caption="'.$data['Title'].' Poster Not Exists" src="images/notfound.png" alt="" style="max-width:100%;max-height:100%">';
			$f = @fopen('movie_images/'.$imdbid.'.jpg','r');
			if($f != null) {
				fclose($f);
				unlink('movie_images/'.$imdbid.'.jpg');
			}
		} else {
			$imgtag = '<img class="materialboxed" data-caption="'.$data['Title'].' Poster" src="movie_images/'.$imdbid.'.jpg" alt="" style="max-width:100%;max-height:100%">';
		}

	?>	
		<div style="margin-top:20px;">
			<div class="row">
				<div align="center" class="col s12 m12 l5">
					<?php echo $imgtag;?>
				</div>
				<div class="col s12 m12 l6 offset-l1">
					<div class="hide-on-med-and-down">
						<h3 style="color:#ee6e73;margin-top:0;"><?php echo $data['Title'];?></h3>
						<strong style="color:rgba(117, 117, 117, 0.55);"><?php echo $data['Released']; ?></strong>
					</div>
					
					<div class="hide-on-large-only" style="margin-top:20px;" align="center">
						<h3 style="color:#ee6e73;margin-top:0;"><?php echo $data['Title'];?></h3>
						<strong style="color:rgba(117, 117, 117, 0.55);"><?php echo $data['Released']; ?></strong>
					</div>
					<hr>
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['rating'];?></strong>
						</div>
						<div class="valign col s6" id="rating">
							<i class="small material-icons" id="s1">grade</i>
							<i class="small material-icons" id="s2">grade</i>
							<i class="small material-icons" id="s3">grade</i>
							<i class="small material-icons" id="s4">grade</i>
							<i class="small material-icons" id="s5">grade</i>
						</div>
						<div class="center-align valign col s3" id="rate1"></div>
					</div>
					
					<hr>
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3" style="padding-left:12px;">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['runningtime'];?></strong>
						</div>
						<div class="valign col s9">
							<p><?php echo $data['Runtime'];?></p>
						</div>
					</div>
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['genre'];?></strong>
						</div>
						<div class="valign col s9">
							<p><?php 
								$genres = explode(", ",$data['Genre']);
								for($i = 0; $i < count($genres); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $genres[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Director(s)'];?></strong>
						</div>
						<div class="valign col s9 m9 l9">
							<p><?php 
								$directors = explode(", ",$data['Director']);
								for($i = 0; $i < count($directors); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $directors[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Writer(s)'];?></strong>
						</div>
						<div class="valign col s9 m9 l9">
							<p><?php 
								$writers = explode(", ",$data['Writer']);
								for($i = 0; $i < count($writers); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $writers[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Actor(s)'];?></strong>
						</div>
						<div class="valign col s9 m9 l9">
							<p><?php 
								$actors = explode(", ",$data['Actors']);
								for($i = 0; $i < count($actors); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $actors[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Language(s)'];?></strong>
						</div>
						<div class="valign col s9 m9 l9">
							<p><?php 
								$langs = explode(", ",$data['Language']);
								for($i = 0; $i < count($langs); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $langs[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
					
					<div class="row valign-wrapper" style="margin-bottom:0px;">
						<div class="valign col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Country(ies)'];?></strong>
						</div>
						<div class="valign col s9 m9 l9">
							<p><?php 
								$country = explode(", ",$data['Country']);
								for($i = 0; $i < count($country); $i++) {
									?>
									<div class="chip hoverable" style="margin-bottom:5px;margin-top:5px;">
										<?php
										echo $country[$i];
										?>
									</div>
									<?php
								}
								?></p>
						</div>
					</div>
					
				</div>
				<hr>
				<div class="row" style="margin-bottom:0px;">
						<div class="col s3 m3 l3">
							<strong style="color:rgba(117, 117, 117, 0.8);"><?php echo $lang[$userlang]['Plot'];?></strong>
						</div>
						<div class="col s9 m9 l9">
						</div>
				</div>
				<div class="row">
					<div class="col s12">
						<p><?php echo $data['Plot'];?></p>
					</div>
				</div>
			</div>
			<meta property="og:type"          content="website" />
			<meta property="og:title"         content="<?php $data['Title']; ?>" />
			<meta property="og:description"   content="<?php $data['Plot']; ?>" />
			<div class="row">
				<div class="col s12">
					
				</div>
			</div>
		</div>
		<div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
		    <a class="waves-effect waves-light btn-floating btn-large" style="background-color:#ee6e73 !important;">
		      <i class="large material-icons">add</i>
		    </a>
		    <ul>
				<li><a class="btn-floating green" href="https://www.google.com/maps/search/theater/" target="_blank"><i class="material-icons">my_location</i></a></li>
				
			    <li><a class="btn-floating yellow darken-1" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=buzzmovie.us/movie_detail.php?imdbid=<?php echo $imdbid;?>','name','width=600,height=400')"><i class="material-icons">format_quote</i></a></li>
			    <?php if($uid != null) { ?>
			    <li><a href="#modal0" class="waves-effect waves-light btn-floating modal-trigger red" style="background-color:#ee6e73;" onclick='<?php echo 'initiate(-1,"'.$data['imdbID'].'")';?>'>
			    <i class="large material-icons">grade</i></a></li>
			    <?php } ?>
		    </ul>
	  </div>
		<!-- <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
			
		    <a href="#modal0" class="waves-effect waves-light btn-floating btn-large modal-trigger" style="background-color:#ee6e73;" onclick='<?php echo 'initiate(-1,"'.$data['imdbID'].'")';?>'>
		      <i class="large material-icons">grade</i>
		    </a>
		</div> -->
		
		<!-- Modal Structure -->
			  <div id="modal0" class="modal bottom-sheet center-align">
			    <div class="modal-content">
			      <h5><?php echo $lang[$userlang]['howwasyourmovie'];?></h5>
			      <img class="hide-on-small-only circle" src="movie_images/<?php echo $data['imdbID'];?>.jpg" style="width:100px;height:100px;">
			      <br>
			      <p class="hide-on-small-only"><b><?php echo $data['Title']."(".$data['Year'].")";?></b></p>
			      <i class="medium material-icons rating_star" id="ss1">grade</i>
			      <i class="medium material-icons rating_star" id="ss2">grade</i>
			      <i class="medium material-icons rating_star" id="ss3">grade</i>
			      <i class="medium material-icons rating_star" id="ss4">grade</i>
			      <i class="rating_star medium material-icons" id="ss5">grade</i>
			      <script>
				      <?php
				      for($i = 5; $i>=1; $i--) {
					  ?>
					      $('#ss<?php echo $i; ?>').click(function () {
							   //enable - #26a69a
							   if(turn != 1) {
							   if (starSelected == <?php echo $i; ?>) {
								   //delete all
								for(var j = 1; j <= 5; j++) {
									document.getElementById('ss'+j.toString()).style.color = "BLACK";
								}
								starSelected = 0;
							   } else {
								   <?php for($j = $i + 1; $j <= 5; $j++) { ?>
								   document.getElementById('ss<?php echo $j; ?>').style.color = "BLACK";
								   <?php } ?>
								    
								   <?php for($j = 1; $j <= $i; $j++) { ?>
								   document.getElementById('ss<?php echo $j; ?>').style.color = "#ee6e73";
								   <?php } ?>
								   starSelected = <?php echo $i; ?>;
							   }
							   }
					      });
					      
					      $('#ss<?php echo $i; ?>').mouseover(function () {
						      if(turn != 1) {
							<?php for($j = $i + 1; $j <= 5; $j++) { ?>
								document.getElementById('ss<?php echo $j; ?>').style.color = "BLACK";
							<?php } ?>
							    
							<?php for($j = 1; $j <= $i; $j++) { ?>
								document.getElementById('ss<?php echo $j; ?>').style.color = "#ee6e73";
							<?php } ?>
							}
					      });
					      
					      $('#ss<?php echo $i; ?>').mouseout(function () {
						      if(turn != 1) {
						  		for(var j = 1; j <= starSelected; j++) {
									document.getElementById('ss'+j.toString()).style.color = "#ee6e73";
								}
							    for(var j = starSelected + 1; j <= 5; j++) {
									document.getElementById('ss'+j.toString()).style.color = "BLACK";
								}
							}
					      });
				      <?php } ?>
				      $(document).ready(function() {
		  				$('#ratebutton1').click(function(){
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
						  				rating_update('<?php echo $data['imdbID'];?>')
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
			      <a href="#!" id="ratebutton1" class=" modal-action modal-close waves-effect waves-green btn-flat"><?php echo $lang[$userlang]['rate'];?></a>
			    </div>
			  </div>
		
		<script>
			 $(document).ready(function(){
			    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			    $('.modal-trigger').leanModal();
			});
			rating_update('<?php echo $data['imdbID'];?>');
		</script>
		<?php include_once("footer.php"); ?>
	</body>
</html>