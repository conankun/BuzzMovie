<?php
	include_once("header.php");
	include_once("major_list.php");
	
	if($uid == null) {
		return;
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
			function validateForm() {
				var a = document.getElementById("pw").value;
				var b = document.getElementById("pw2").value;
				if(a!=b) {
					alert("<?php echo $lang[$userlang]['passnotdiff'];?>")
					return false;
				}
				return true;
			}
		</script>
</head>

<body>
	<?php include_once("nav_bar.php"); ?>
	<?php 
		
		$con = mysqli_connect($mysql_ip, $mysql_id, $mysql_pw, $mysql_db);
		$sql = "select * from accounts where id = '$uid'";
		$res = mysqli_query($con, $sql);
		
		while($z = mysqli_fetch_array($res)) {
		
	?>
	
	<div class="container">
		<div class="row">
		<form class="form-vertical register-form" action="edit_profile_action.php" onsubmit="return validateForm()" method="post" id="signUpForm">
			<h3><?php echo $lang[$userlang]['edit_profile'];?></h3>
			<p><?php echo $lang[$userlang]['registration_instruction'];?></p>
			<div class="control-group">
				<div class="control">
					<div class="input-field col s12">
						<input id="name" name="name" value="<?php echo $z['name'];?>" type="text" class="materialize-textfield" required>
						<label for="name"><?php echo $lang[$userlang]['name'];?></label>
					</div>

					<div class="input-field col s12">
						<input id="email" name="email" value="<?php echo $z['email'];?>" type="email" class="materialize-textfield" required>
						<label for="email"><?php echo $lang[$userlang]['email'];?></label>
					</div>	
					
					<div class="input-field col s12 m12" style="padding-bottom:1px !important;">
						<select name="gender" id="gender" class="summary_l select_reg_no_bottom">
							<option value="Male" <?php if(strcmp($z['gender'],"Male") == 0) echo "selected";?>><?php echo $lang[$userlang]['male'];?></option>
							<option value="Female" <?php if(strcmp($z['gender'],"Female") == 0) echo "selected";?>><?php echo $lang[$userlang]['female'];?></option>
						</select>
						<label for="gender"><?php echo $lang[$userlang]['gender'];?></label>
					</div>	
					
					
					<div class="input-field col s12" style="padding-bottom:1px !important;">
						<select name="major" id="major" class="summary_l select_reg_no_bottom">
							<?php
								foreach ($major as $value) {
									echo "\t\t\t\t\t\t\t";
									echo "<option value='".$value."'";
									if(strcmp($value, $z['major']) == 0) {
										echo " selected";
									}
									echo ">".$value."</option>\n";
								}	
							?>
						</select>
						<label for="major"><?php echo $lang[$userlang]['major'];?></label>
					</div>
									
					<div class="input-field col s12">
						<select name="class" id="class">
							<?php
								$year = date('Y');
								for($i = $year + 4; $i >= $year - 20; $i--) {
									echo "<option value='".$i."'";
									if($i == $z['class']) {
										echo " selected";
									}
									echo ">Class of ".$i."</option>\n";
									if($i != $year-20) echo "\t\t\t\t\t\t\t";
								}	
							?>
						</select>
						<label for="class"><?php echo $lang[$userlang]['class'];?></label>
					</div>					
					
					<div class="input-field col s12">
						<input id="pw" name="pw" type="password" class="materialize-textfield" required>
						<label for="pw"><?php echo $lang[$userlang]['pw'];?></label>
					</div>
					
					<div class="input-field col s12">
						<input id="pw2" name="pw2" type="password" class="materialize-textfield" required>
						<label for="pw2"><?php echo $lang[$userlang]['pw2'];?></label>
					</div>
					
					<div class="input-field col s12">
			          <textarea id="interest" name="interest" class="materialize-textarea"><?php echo $z['interest'];?></textarea>
			          <label for="interest"><?php echo $lang[$userlang]['interest'];?></label>
			        </div>
					
					<?php
						echo '<input type="hidden" name="prev" value="'.$prev.'">';	
					?>

					<!--<div class="input-field col s12">
						<input id="school" type="text" class="inputBox inputBoxMarginB validate" required>
						<label for="email">학교</label>
					</div>-->
					
					<div class="col s12 card-action card-align-right" style="padding-right:30.5px;">
              			<button class="btn waves-effect waves-light" type="submit" name="action">
              			<i class="material-icons right">cloud</i>
              			<?php echo $lang[$userlang]['edit_profile'];?></button>
              		</div>
				</div>
			</div>
		</form>
		</div>
	</div>
	<?php 
			break;
		}
	?>
	<?php include_once("footer.php"); ?>
</body>