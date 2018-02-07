<?php 
session_start(); 

if(isset($_SESSION["id1"])){
$a=$_SESSION["id1"];
}
	/*if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}*/
?>



<?php //session_start();
$mysqli = new mysqli("localhost", "root","rafsan","sp1");?>
<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="signup">
<?php
if(isset($_SESSION["admin"])){	
	$b=$_SESSION["admin"];
	if($b==0){
		require 'template/header1.php'; 

		 require 'template/menu2.php'; 
?>
	
		<div class="maincontent">
			<div class="content">
				
				<?php 
				//$mysqli = new mysqli("localhost", "root","","sp1");
				if ($mysqli->connect_errno) {
				   header("Location: signup.php");
				}
				$productId = $_GET['product_id'];

				$sql = "SELECT * FROM products WHERE id ='".$productId."'";

				$product = $mysqli->query($sql);

				$check_product = $product->num_rows;

				 if ($check_product > 0) {

				    /* fetch object array */
				    while ($singleProduct = $product->fetch_object()) { ?>
			    		<div class="single_product">
							 <div class="single_product_image">
							 	<img src="<?php echo $singleProduct->image ?>" alt="">
							 </div>
							 <div class="single_product_info">
							 	<h4><?php echo $singleProduct->name ?></h4>
							 	<p>Price : <?php echo $singleProduct->price ?></p>
							 	<p>Avilable : <?php echo $singleProduct->quantity ?></p>
								<p>Discount : <?php echo $singleProduct->discount ?></p>
							 
                         <p>Unique Product : <?php echo $singleProduct->uniqueP=0 ? 'No' : 'Yes' ?></p>
							 	
							 
								<div class="single_action">
								<?php 
								if(isset($_SESSION["admin"])){
								$b=$_SESSION["admin"];
								if($b==0){
									$_SESSION["id1"]=$singleProduct->id;
									?>
						<a href="user1.php">buy now!</a>
							<?php	
								}
								}
								else{?>
									<a href="login.php?id= <?php echo $singleProduct->id; ?>">buy now!</a>
								<?php } ?>
								</div>
							 	 
							 </div>
						 </div>
	
<?php
					}
					}
}
}
else{
?>

	<div class="signup">
		<?php  require 'template/header1.php'; 
		//require 'template/menu2.php'; ?>
		<div class="maincontent">
			<div class="content">
				<div>
					<?php 
						if(isset($_SESSION['a_p_message'])) {
							echo $_SESSION['a_p_message'];
							unset($_SESSION['a_p_message']);
						}
					 ?>
				</div>
				<?php 
				//$mysqli = new mysqli("localhost", "root","","sp1");
				if ($mysqli->connect_errno) {
				   header("Location: signup.php");
				}
				$productId = $_GET['product_id'];

				$sql = "SELECT * FROM products WHERE id ='".$productId."'";

				$product = $mysqli->query($sql);

				$check_product = $product->num_rows;

				 if ($check_product > 0) {

				    /* fetch object array */
				    while ($singleProduct = $product->fetch_object()) { ?>
			    		<div class="single_product">
							 <div class="single_product_image">
							 	<img src="<?php echo $singleProduct->image ?>" alt="">
							 </div>
							 <div class="single_product_info">
							 	<h4><?php echo $singleProduct->name ?></h4>
							 	<p>Price : <?php echo $singleProduct->price ?></p>
							 	<p>Avilable : <?php echo $singleProduct->quantity ?></p>
							 	<p>Discount : <?php echo $singleProduct->discount ?></p>
							 	<p>Category : <?php echo $singleProduct->category_id ?></p>
							 	<p>Unique Product : <?php echo $singleProduct->uniqueP=0 ? 'No' : 'Yes' ?></p>
							 	
							 
								<div class="single_action">
								<?php 
								if(isset($_SESSION["admin"])){
								$b=$_SESSION["admin"];
								if($b==0){
									$_SESSION["id1"]=$singleProduct->id;
									?>
                         <a href="user1.php">buy now!</a>
						
							<?php	
								}
								}
								else{?>
									<a href="login.php?id= <?php echo $singleProduct->id; ?>">buy now!</a>
								<?php } ?>
								<a href="index.php">go back</a>
								</div>
							 	 
							 </div>
						 </div>
				  		<?php }
					}
}					
				?> 
			
				
			</div>
			<div class="sidebar">
			<?php// require 'template/sidemenu.php'; ?>
			    
			</div>
		</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>
