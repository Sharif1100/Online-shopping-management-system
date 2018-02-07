<?php if ( isset($_SESSION['userId']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { ?> 
	<div class="adminMenu">
		<ul>				
			<li><a href="emp1.php">Add Employee</a></li>			
			<li><a href="profile.php">My Profile</a></li>
			<li><a href="admin.php">employee details</a></li>
			<li><a href="admin2.php">remove employee</a></li>
			<li><a href="tran.php">Monthly Sell</a></li>
		
		</ul>
	</div>
<?php } ?>