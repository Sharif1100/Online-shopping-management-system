<?php session_start(); 
//$a=$_GET["id]; 
if (isset($_SESSION['userId'])) { 
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
if(isset($_GET["id"])){
 $a=$_GET["id"]; 
$_SESSION["id1"]=$a;
//echo $a;

}?>


	<div class="signup">
		<?php require 'template/header1.php'; ?>

		<?php// require 'template/menu3.php'; ?>
	
		<div class="maincontent">
			<div class="content">
			
				<b>Login :</b>
				<form action="postLogin.php" method="post">
					<div>
						<label for="useremail" >UserName</label><br>
						<input type="email" name="useremail" id="useremail" placeholder="email" /><br>
					</div>
					<div>
						<label for="password" >Password</label><br>
						<input type="password" name="password" id="password" placeholder="Password" /><br>
						<input type="submit" name="Submit" value="Login" /></br>
				<a href="index.php">Go Back<a>	
					</div>
				
				</form>
				<a href="signup.php">create a acount<a>
			</div>
			<div class="sidebar">
			<?php //require 'template/sidemenu.php'; ?>
			    
			</div>
		</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
		</div>
	

</body>
</html>