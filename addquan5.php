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
$a=$_SESSION['userId'];
$b=$_POST["quan"];
$c=	$_SESSION["addquan1"];
$d=$_SESSION["addquan2"];

if($b==""){
echo "you must select one"."</br>";	
	
	
}
else{
$conn = mysqli_connect("localhost", "root", "","sp1");

//header("Location:addquan4.php");

$add=$b+$d;
$sq1="UPDATE products
SET quantity='$add' WHERE id='$c'";
if (mysqli_query($conn, $sq1)){
	
echo "add successfully!"."</br>";	
}
	



mysqli_close($conn);

}
?>
<a href="profile1.php">GO BACK</a>

</div>
</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
		</div>
	</div>

</body>
</html>