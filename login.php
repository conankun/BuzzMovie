<?php
	include_once("header.php");
	$prev = xss_prevention(@$_GET["prev"]);
	if($prev == "" || $prev == null) {
		$prev = "index.php";
	}
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
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
	<div class="container">
		<div class="row">
		<form class="form-vertical register-form" action="login_action.php" method="post" id="signUpForm">
			<h3></h3>
			<div class="control-group">
				<div class="control">
					<div class="input-field col s12">
						<input id="id" name="id" type="text" class="materialize-textfield" required>
						<label for="id"><?php echo $lang[$userlang]['id'];?></label>
					</div>
					<div class="input-field col s12">
						<input id="pw" name="pw" type="password" class="materialize-textfield" required>
						<label for="pw"><?php echo $lang[$userlang]['pw'];?></label>
					</div>
					
					
					<div class="col s12 card-action card-align-right" style="padding-right:30.5px;">
              			<button class="btn waves-effect waves-light" type="submit" name="action">
              			<i class="material-icons right">cloud</i>
              			<?php echo $lang[$userlang]['login'];?></button>
              		</div>
				</div>
			</div>
		</form>
		</div>
	</div>
	<?php include_once("footer.php"); ?>
</body>