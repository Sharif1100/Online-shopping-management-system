<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<form action="addquan3.php" method="post">
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
$x=$_SESSION["addquan"];
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo " products:"."</br>";
 
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["category_id"]==$x){
		echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["name"]."</br>"."</br>"; 
       
	   $count=$count+1;
		}
    }
	   if($count==0){
	
	echo "no orders!"."</br>";
	
}

	
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