
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
$a=$_SESSION["pay3"];
$b=$_SESSION["pro"];
$payquan="";
if(isset($_SESSION["payquan"])){
$payquan=$_SESSION["payquan"];	
	
}
$quan2="";
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
$sql = "DELETE FROM payment WHERE id='$a'";
if (mysqli_query($conn, $sql)); 
$sq2 = "SELECT * FROM products";
$result2 = mysqli_query($conn, $sq2)or die(mysqli_error());
    // output data of each row

if (mysqli_num_rows($result2) > 0) {    
	while($row = mysqli_fetch_assoc($result2)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$b){
		$quan2=$row["quantity"];
	   
	   }  
	}
}
//echo $b."</br>";
$quan2 = $quan2 + $payquan;

$sq5="UPDATE products
SET quantity='$quan2' WHERE id='$b'";
if (mysqli_query($conn, $sq5)){	
	echo "orders cancel!"."</br>"; 
}
?>
</div>
</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>