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