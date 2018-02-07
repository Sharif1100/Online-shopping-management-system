<div class="mainmenu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<?php 
			$mysqli = new mysqli("localhost","root","","sp1");
			if ($mysqli->connect_errno) {
			   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
			}
			// for all category select
			$menusql = "SELECT * FROM category";

			$menuCategory = $mysqli->query($menusql);

			$check_menuCategory = $menuCategory->num_rows;

			if ($check_menuCategory > 0) { 	
			    /* fetch object array */
			    while ($menuCategories = $menuCategory->fetch_object()) { ?>
		    		<li><a href="categoryProduct.php?id=<?php echo $menuCategories->id; ?>"><?php echo $menuCategories->category_name; ?></a></li>	
	  			<?php }
			} 
		?>
				
		<li><a href="">Contact</a></li>			
	</ul>
	
</div>
	<div class="adminMenu">
		<ul>				
			<li><a href="user1.php">transection process</a></li>			
			<li><a href="profile2.php">My Profile</a></li>
			<li><a href="user3.php">Accounts</a></li>		
		</ul>
	</div>
