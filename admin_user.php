<?php include_once("header.php"); ?>
<?php
	if(!$isAdmin) {
		return;
	}
?>
<!doctype html>
<html>
	<head>
		<title><?php echo $lang[$userlang]['title']; ?></title>
		
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Your Website Title" />
		<meta property="og:description"   content="Your description" />
		
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
	<?php include_once("nav_bar.php");?>
	<div class="container">
		<div class="row">
			<div class="col s12">
			<ul class="collection with-header">
		        <li class="collection-header"><h4>LOCK / BAN / ACTIVATE USERS</h4></li>
		        <?php
			        $con = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
					$sql = "select id,status from accounts";
					$res = mysqli_query($con, $sql);
					$isAdmin = 0;
					$cnt = 0;
					while($z = mysqli_fetch_array($res)) {
						$cnt++;
			    ?>
		        <li class="collection-item"><div><?php echo $z['id'];?><a href="#modal<?php echo $cnt;?>" class="secondary-content modal-trigger"><i class="material-icons">send</i></a></div></li>
		        
		        <div id="modal<?php echo $cnt; ?>" class="modal bottom-sheet">
				    <div class="modal-content center-align">
				      <h6 id="userid"><?php echo $z['id']; ?></h6>
				      	<p>
					    	<input class="with-gap" name="status<?php echo $cnt; ?>" value="-1" type="radio" id="E-1<?php echo $cnt; ?>" <?php if($z['status'] == -1) { ?>checked<?php  } ?> />
					    	<label for="E-1<?php echo $cnt; ?>">LOCK</label>
					    	
					    	<input class="with-gap" name="status<?php echo $cnt; ?>" value="0" value="ban" id="E0<?php echo $cnt; ?>" type="radio" <?php if($z['status'] == 0) { ?>checked<?php  } ?> />
					    	<label for="E0<?php echo $cnt; ?>">BAN</label>
					    	
					    	<input class="with-gap" name="status<?php echo $cnt; ?>" value="1" type="radio" id="E1<?php echo $cnt; ?>" <?php if($z['status'] == 1) { ?>checked<?php  } ?> />
					    	<label for="E1<?php echo $cnt; ?>">ACTIVATE</label>
						</p>
				    </div>
				    <div class="modal-footer">
				      <a href="#!" onclick="modalCall_<?php echo $cnt; ?>()" class=" modal-action modal-close waves-effect waves-green btn-flat">CHANGE</a>
				    </div>
				</div>
				
				<script>
					function modalCall_<?php echo $cnt; ?>() {
						var stat = $("input:radio[name='status<?php echo $cnt;?>']:checked").val();
						$.ajax({
								url: "change_user_status.php",
								type: "GET",
								data:{'status':stat, 'id':'<?php echo $z['id']; ?>'},
								success:function(data) {
									if(stat == data) {
										//success
										var str="";
										if(stat == 0) {
											str = "Banned";
										} else if(stat == 1) {
											str = "Activated";
										} else if(stat == -1) {
											str = "Locked";
										}
										Materialize.toast(str+' User ' + '<?php echo $z['id']; ?>', 4000);
									} else {
										var str="";
										if(stat == 0) {
											str = "ban";
										} else if(stat == 1) {
											str = "activate";
										} else if(stat == -1) {
											str = "lock";
										}
										Materialize.toast("Failed to " + str+' User ' + '<?php echo $z['id']; ?>', 4000);
									}
								},
								beforeSend:function() {
									
								}
						});
					}
				</script>
				
		        <?php
			        }
					mysqli_free_result($res);
					mysqli_close($con);
			    ?>
		      </ul>
			</div>
		</div>
	</div>
	
	
	
	<script>
		$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal-trigger').leanModal();
		});
	</script>
	<?php include_once("footer.php"); ?>
	</body>
</html>