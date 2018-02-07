<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
session_start();

if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}?>
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


<?php

$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq1 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq1)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
?>
<form action="postDeleteproduct.php"" method="POST" >	
					<div>
						<input type="radio" name="v2" value="<?php echo $row["id"] ?>" /><?php echo $row["name"]?><br>

						</div>
						 
<?php	 
	  }?>			
									
				
					<div>
						<input type="submit" name="Submit" value="Select Product" />
					</div>
				</form>
<?php
	}
  mysqli_close($conn);

?>

</div>
</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>