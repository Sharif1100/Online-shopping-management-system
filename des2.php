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
$count=0;
$a=$_SESSION['userId'];
$x=$_SESSION["des"];
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo " products:"."</br>";
 
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["category_id"]==$x){
		echo "name: " ."  ".$row["name"]."</br>"; 
	  echo "quantity: " ."  ".$row["quantity"]."</br>";
	  
       echo " real price: " ."  ".$row["price"]."</br>";
       echo "price: " ."  ".$row["discount"]."</br>"; 
       
	   echo '<img width="300px" height="300px" src="'.$row["image"].'">'."</br>";

	   if($row["uniqueP"]==1){
		 echo "unique product!"."</br>"."</br>"."</br>";  
		   
	   }
	   else{
		   
		   echo "</br>"."</br>"."</br>";
	   }
	   $count=$count+1;
		}
           
	}
	   if($count==0){
	
	echo "no orders!"."</br>";
	
}

	
}
mysqli_close($conn);
?>
<?php
if($_SESSION['admin']==2){
?>
<a href ="profile1.php">Go Back</a>
<?php
}
else{
?>
<a href ="profile.php">Go Back</a>

<?php
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
