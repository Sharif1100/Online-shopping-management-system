<div class="header">
<div class="logo">
		<img src="images/logo.jpg"/>
	</div>	
	
	
	<div class="login">	
		
			<?php if (isset($_SESSION['userId'])) { ?>
			<pre>
				                                           <a href="logout.php">Logout</a>
			</pre>
			<?php } else {?>
			<a href="login.php">Sign In</a>
			<a href="signup.php">Sign Up</a>
			<?php } ?>
	
	</div>
	
	</div>