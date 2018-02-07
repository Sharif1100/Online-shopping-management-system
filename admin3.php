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
		<?php require 'template/menu1.php'; ?>
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
$a="";
if (isset($_POST["e1"])) { 
	    $a=$_POST["e1"];
	}

if($a==""){
	
	echo "you must select one!"."</br>";
}
else{	
$conn = mysqli_connect("localhost", "root", "","sp1");
			
$sq2 = "DELETE FROM users WHERE id=$a";

if (mysqli_query($conn, $sq2))?>
<h1 style="color:red;"><?php	echo "record is deleted successfully!"."</br>";?> </h1>    
<?php
}

  mysqli_close($conn);
?>
</div>
</div>	
		<div class="footer">
			<p>&copy;Sharif 2017</p>
		</div>
	</div>

</body>
</html>