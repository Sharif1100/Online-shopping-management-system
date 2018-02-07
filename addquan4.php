rafsan<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<form action="addquan5.php" method="post">
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
				$count=0;
$a=$_SESSION['userId'];
$x=$_SESSION["addquan1"];
$y="";
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo " products name:"."  ".$x."</br>";
  while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$x){
		$y=$row["quantity"];
		echo "quantity: " ."  ".$row["quantity"]."</br>"; 
       echo "price: " ."  ".$row["discount"]."</br>";
	   $count=$count+1;
		}
    }?>
	ADD QUANTITY:
	<div>
			<label>Product quantity</label><br>
			<input type="number" name="quan" placeholder="Product quantity" /><br>	
	</div>
	   <?php
	   if($count==0){
	
	echo "no orders!"."</br>";
	
}
$_SESSION["addquan2"]=$y;
	
}
mysqli_close($conn);
?>
<input type="submit" value="open">
</form>
</div>
</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
		</div>
	</div>

</body>
</html>
