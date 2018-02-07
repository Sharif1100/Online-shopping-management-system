<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action="emp4.php" method="post">
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
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq2 = "SELECT * FROM payment";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo "order product:"."</br>"; 
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["accountspay"]!=0){
		echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["productname"]."</br>"."</br>"; 
       $count=$count+1;
	   }
    }
	   if($count==0){
	?>
	<h1 style="color:red;"><?php	echo "no orders!"."</br>";?> </h1>
	<?php
	
}

	
}
mysqli_close($conn);

if($count==0){
}
else{?>

<input type="submit" value="open">
</form>
<?php } ?>

</div>
</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>