<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>BuzzMovie :: Login</title>

	
	
	<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="css/styles.css" rel="stylesheet" type="text/css"/>
	<link href="css/materialize.css" rel="stylesheet" type="text/css" media="screen,projection"/>

	<script src="js/jquery.flexisel.js" type="text/javascript"></script>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.backstretch.js" type="text/javascript"></script>
	<script src="js/jquery.backstretch.min.js" type="text/javascript"></script>
	<script src="js/materialize.js" type="text/javascript"></script>

	<script src="js/buzzmovie_login.js" type="text/javascript"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<script>
	jQuery(document).ready(function() {
		Login.init();
		$('select').material_select();
	});
	</script>
</head>

<body class="login">
	<div class="content2 card light-green darken-4">
		<form class="form-vertical register-form" action="login_action.php" onsubmit="return validateForm()" method="post" id="signUpForm">
			<h3>LOGIN</h3>
			<p>Enter your ID and Password.</p>
			<div class="control-group">
				<div class="control">
					<div class="input-field col s12">
						<input id="id" name="id" type="text" class="validate inputBox" required>
						<label class="summary_l" for="id">ID</label>
					</div>
					<div class="input-field col s12">
						<input id="password" name="password" type="password" class="validate inputBox" required>
						<label class="summary_l" for="password">Password</label>
					</div>

					<?php
						$prev = $_GET['prev'];
						echo '<input type="hidden" name="prev" value="'.$prev.'">';	
					?>

					<!--<div class="input-field col s12">
						<input id="school" type="text" class="inputBox inputBoxMarginB validate" required>
						<label class="summary_l" for="email">학교</label>
					</div>-->
					
					<div class="card-action card-align-right">
              			<button class="btn-flat waves-effect waves-light button_request" type="submit" name="action"  style="padding: 0;">Login</button>
              		</div>
				</div>
			</div>
		</form>
	</div>
</body>