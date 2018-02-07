<?php 
session_start(); 
	
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}

	
	$name="";
	$category="";
	$quantity="";
	$price="";
	$image="";
	$discount="";
	$unique="";
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	} else {
		if($_SESSION['admin'] == 0) {
			session_destroy();
			header("Location: login.php");
		}
$mysqli = new mysqli("localhost", "root", "rafsan","sp1");	
$a=$_SESSION["edit"];
//echo $a;
$sq2 = "SELECT * FROM products";
$result = mysqli_query($mysqli, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$a){
	$name=$row["name"];
	$category=$row["category_id"];
	$quantity=$row["quantity"];
	$price=$row["price"];
	$image=$row["image"];
	$discount=$row["discount"];
	$unique=$row["uniqueP"];
			
       }
	   
	}
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
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
				<b>edit product </b>
				<form action="postEditproduct.php" method="POST" enctype = "multipart/form-data">
					<div>
						<label>Product name</label><br>
						<input type="text" name="name" placeholder="Product name" value=<?php echo $name ?> /><br>
					</div>
					<div>
						<label>Product quantity</label><br>
						<input type="number" name="quantity" placeholder="Product quantity" value=<?php echo $quantity ?> /><br>	
					</div>
					<div>
						<label>Product price</label><br>
						<input type="number" name="price" placeholder="Product price" value=<?php echo $price ?> /><br>	
					</div>
					<div>
						<label>Product discount</label><br>
						<input type="number" name="discount" placeholder="Product discount" /><br>	
					</div>
					<div>
						<label>Product category</label><br>
						<?php
							
							if ($mysqli->connect_errno) {
							   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
							}
							// for all category select
							$sql = "SELECT * FROM category";

							$category = $mysqli->query($sql);

							$check_category = $category->num_rows;
						 ?>
						<select name="category_id" >
						<?php if ($check_category > 0) { 	
						    /* fetch object array */
						    while ($categories = $category->fetch_object()) { ?>
					    		<option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
				  			<?php }
						}?>
						</select>
					</div>
					<div>
						<label>Product Image</label><br>
						<input type="file" name="image" placeholder="Product Image" /><br> 
					</div>
					<div>
						<input type="checkbox" name="unique" value="1" checked> Unique
					</div>
					<div>
						<input type="submit" name="Submit" value="edit Product" />
					</div>
				</form>
				
			</div>
			
		</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>
	

</body>
</html>