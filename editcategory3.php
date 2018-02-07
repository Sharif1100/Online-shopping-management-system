<?php 
session_start(); 
	
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}

	
	$name="";
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	} else {
		if($_SESSION['admin'] == 0) {
			session_destroy();
			header("Location: login.php");
		}
$mysqli = new mysqli("localhost", "root", "rafsan","sp1");	
$a=$_SESSION["editcat"];
//echo $a;
$sq2 = "SELECT * FROM category";
$result = mysqli_query($mysqli, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$a){
	$name=$row["category_name"];
			
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
				<form action="postEditcat.php" method="POST" enctype = "multipart/form-data">
					<div>
						<label>Product name</label><br>
						<input type="text" name="name" placeholder="Category name" value=<?php echo $name ?> /><br>
					</div>
					
				<div>
						<input type="submit" name="Submit" value="Update Product" />
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