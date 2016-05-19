<nav>
		    <div class="nav-wrapper">
		      <a data-activates="mobile-demo" href="#" class="left button_side" style="padding-left:15px;"><i class="left material-icons" id="sidebar-button">menu</i></a><a href="index.php" class="brand-logo"><?php echo $lang[$userlang]['title']; ?></a>
		      
		      	<?php
				    if($uid == null) {
				?>
			    <ul id="nav-mobile" class="right hide-on-med-and-down">
				    <li><a href="login.php"><?php echo $lang[$userlang]['signin'];?></a></li>
				    <li><a href="registration.php"><?php echo $lang[$userlang]['signup'];?></a></li>
			    </ul>
			    
			    <ul id="mobile-demo" class="side-nav">
				    <li><a href="login.php"><i class="left material-icons">lock_open</i><?php echo $lang[$userlang]['signin'];?></a></li>
				    <li><a href="registration.php"><i class="left material-icons">assignment_ind</i><?php echo $lang[$userlang]['signup'];?></a></li>
			    </ul>
			    <?php
				    } else {
				?>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="edit_profile.php"><?php echo $lang[$userlang]['edit_profile'];?></a></li>
						<?php if($isAdmin) {?> <li><a href="admin_user.php">Administer Users</a> <?php } ?>
						<li><a href="logout.php"><?php echo $lang[$userlang]['logout'];?></a></li>
						
			    	</ul>
			    	
			    	<ul id="mobile-demo" class="side-nav">
						<li><a href="edit_profile.php"><i class="left material-icons">settings</i><?php echo $lang[$userlang]['edit_profile'];?></a></li>
						<?php if($isAdmin) {?> <li><a href="admin_user.php"><i class="left material-icons">mode_edit</i>Administer Users</a> <?php } ?>
						<li><a href="logout.php"><i class="left material-icons">lock_outline</i><?php echo $lang[$userlang]['logout'];?></a></li>
						
			    	</ul>
				<?php
					}	
				?>
		    </div>
	  </nav>