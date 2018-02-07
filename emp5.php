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
		//$c=$_SESSION["product"];
$a=$_SESSION["pay3"];
$b=$_SESSION["pay2"];
$d="";
$useremail="";

if(isset($_SESSION["useremail"])){
	$useremail=$_SESSION["useremail"];
	
	//echo $useremail;
}

//echo $c."</br>";
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq1="UPDATE payment
SET accountspay='0', accountrec='$b',emp='$useremail' WHERE id='$a'";


if (mysqli_query($conn, $sq1)) {
  	echo "transection successfully!"."</br>";    
} 
else {
    echo "Error: " . $sq1 . "<br>" . mysqli_error($conn);
}	


//if (mysqli_query($conn, $sq2));
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