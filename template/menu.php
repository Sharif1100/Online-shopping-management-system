<?php if ( isset($_SESSION['userId']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { ?> 
	<div class="adminMenu">
		<ul>	
			<li><a href="addCategory.php">Categories</a></li>
		     <li><a href="deleteCategory.php">Delete Categories</a></li>
           <li><a href="editCategory.php">Edit Categories</a></li>			 
			<li><a href="addproduct.php">Add Product</a></li>			
			<li><a href="profile1.php">My Profile</a></li>
			<li><a href="editProduct.php">Edit Product</a></li>
			<li><a href="deleteProduct.php">Delete Product</a></li>
			<li><a href="emp3.php">Check Transection</a></li>
	   <li><a href="addquan.php">Add Quantity</a></li>
	  <li><a href="des.php">Product Description</a></li>
		</ul>
	</div>
 <?php
 } 

?>
