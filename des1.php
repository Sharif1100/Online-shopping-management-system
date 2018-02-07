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
$b="";
if(isset($_POST["e1"])){
$b=$_POST["e1"];
//echo $i;	
	
}
if($b==""){
echo "you must select one"."</br>";	
	
	
}
else{
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
$_SESSION["des"]=$b;
header("Location:des2.php");

mysqli_close($conn);

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
