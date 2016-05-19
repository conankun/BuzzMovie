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
		</script>
	</head>
	<body>
	<?php include_once("nav_bar.php"); ?>
	  <div class="row">
	  	<div class="col s12" style="padding:0;">
	      <ul class="tabs">
		    <?php 
			    if($uid != null) {
			?>
	        <li class="tab col s4"><a class="active" href="#featured"><?php echo $lang[$userlang]['featured'];?></a></li>
	        <li class="tab col s4"><a href="#search"><?php echo $lang[$userlang]['search'];?></a></li>
	        <li class="tab col s4"><a href="#recommended"><?php echo $lang[$userlang]['recommend'];?></a></li>
	        <?php 
			    } else {
			?>
				<li class="tab col s12"><a class="active" href="#featured"><?php echo $lang[$userlang]['featured'];?></a></li>
			<?php 
			    }
			?>
	      </ul>
	    </div>
	  </div>
		<div id="featured" class="container">
			<div class="row">
				<?php
					$con = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
					$sql = "select imdbid,rating from ratings order by RAND() limit 0,3";
					$res = mysqli_query($con,$sql);
					
					while($z = mysqli_fetch_array($res)) {
						
						$data = file_get_contents("http://www.omdbapi.com/?i=".$z['imdbid']."&y=&plot=short&r=json");
						$data = json_decode($data, true);
						
						$f = @fopen('movie_images/'.$data['imdbID'].'.jpg','r');
						if ($f == null) {
							//if poster doesn't exist, download.
							file_put_contents('movie_images/'.$data['imdbID'].'.jpg', file_get_contents($data['Poster']));	
						} else {
							fclose($f);
						}
						
				?>
			        <div class="col s12 m6 l4" onclick="javascript:location.href='<?php echo "movie_detail.php?imdbid=".$data['imdbID'];?>'">
			          <div class="card hoverable waves-effect waves-light">
			            <div class="card-image">
			              <img src='<?php echo 'movie_images/'.$data['imdbID'].'.jpg';?>'>
			              <span class="card-title"><?php echo $data['Title']."(".$data['Year'].")";?></span>
			            </div>
			            <div class="card-content">
			              <p><?php echo $data['Plot'];?></p>
			            </div>
			            <div class="card-action">
			              <a href="#"><?php echo $lang[$userlang]['more'];?></a>
			            </div>
		            </div>
		        </div>
		        <?php
			    	}
			    	mysqli_free_result($res);
			    	mysqli_close($con);
				?>
		    </div>
		</div>
		
		<?php
			if($uid != null) {	
		?>
		<div id="search" class="container">
			<div class="row">
				<form>
				    <div class="input-field col s3">
						<select name="genre" id="genre">
							<option value="movie"><?php echo $lang[$userlang]['movie'];?></option>
							<option value="series"><?php echo $lang[$userlang]['series'];?></option>
							<option value="episode"><?php echo $lang[$userlang]['episode'];?></option>
						</select>
						<label for="genre"><?php echo $lang[$userlang]['genre'];?></label>
					</div>
			        <div class="input-field col s9">
			          <i class="material-icons prefix">search</i>
			          <input type="text" name="searchbar" id="searchbar" class="materialize-textfield"></textarea>
			          <label for="icon_prefix"><?php echo $lang[$userlang]['searchbyname'];?></label>
			        </div>
			    </form>
  			</div>
			<div class="row center-align">
			  <div id="content_search">
				  <?php echo $lang[$userlang]['noentriesfound'];?>
				  
  				</div>
  				<script>
	  				$(document).ready(function() {
		  				$('#searchbar').keypress(function(e){
			  				if(e.which == 13) {
				  				$.ajax({
					  				url: "search.php",
					  				type: "POST",
					  				data: {search:$('#searchbar').val(), genre:$('#genre').val()},
					  				success:function(data) {
						  				$('#content_search').html(data);
					  				},
					  				beforeSend:function() {
						  				$('#content_search').html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div>');
					  				}
			  					});
		  					}
		  				});
	  				});
	  			</script>
  				
			  </div>
		    </div>
		</div>
		
		<div id="recommended" class="container">
			<div class="row">
				<form>
				    <div class="input-field col s12">
						<select name="recommendation" id="recommendation">
							<option disabled selected value="overall"><?php echo $lang[$userlang]['choosecriteria'];?></option>
							<option value="overall"><?php echo $lang[$userlang]['overall'];?></option>
							<option value="major"><?php echo $lang[$userlang]['majorrecommendation'];?></option>
							<option value="gender"><?php echo $lang[$userlang]['genderrecommendation'];?></option>
							<option value="class"><?php echo $lang[$userlang]['classrecommendation'];?></option>
						</select>
						<label for="recommendation"><?php echo $lang[$userlang]['recommendation'];?></label>
					</div>
			    </form>
  			</div>
  			<div class="row center-align">
			  <div id="content_rec">
				  <?php echo $lang[$userlang]['noentriesfound'];?>
				  
  				</div>
  			</div>
  			<script>
	  				$(document).ready(function() {
		  				$('#recommendation').change(function(){
				  				$.ajax({
					  				url: "loadtoprating.php",
					  				type: "GET",
					  				data: {filter:$('#recommendation').val()},
					  				success:function(data) {
						  				$('#content_rec').html(data);
					  				},
					  				beforeSend:function() {
						  				$('#content_rec').html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div>');
					  				}
			  					});
		  				});
	  				});
	  		</script>
		</div>
		<?php } ?>
		<?php include_once("footer.php"); ?>
	</body>
</html>