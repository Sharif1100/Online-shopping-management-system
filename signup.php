<script src="3.js" type="text/javascript">
//onsubmit="return check()"
</script>
<?php session_start(); 
 if(isset($_GET["id"])){
 $a=$_GET["id"]; 
$_SESSION["id1"]=$a;
 }
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
	<div class="signup">
		<?php require 'template/header1.php'; ?>

		<?php //require 'template/menu.php'; ?>
		<div class="maincontent">
			<div class="content">
			
				<b>SignUp :</b>
				<form action="postSignup.php" method="POST">
					<div class="single">
						<label for="firstName">First Name: </label>
						<input type="text" id="firstName" name="firstName" placeholder="First Name">
					</div>
					<div class="single">
						<label for="lastName">Last Name: </label>
						<input type="text" id="lastName" name="lastName" placeholder="Last Name">
					</div>
					<div class="single">
						<label for="email">Email: </label>
						<input type="email" id="email" name="email" placeholder="Email" onkeyup="test4()"><span id="value4" style="color:blue">type something</span>
					</div>
					<div class="single">
						<label for="password">Password: </label>
						<input type="password" id="password" name="password" placeholder="Password" onkeyup="test6()"><span id="value6" style="color:blue">type something</span>
					</div>
					<div class="single">
						<label for="conpass">Confirm Password: </label>
						<input type="password" id="conpass" name="conpass" placeholder="Confirm Password"onkeyup="test7()"><span id="value7" style="color:blue">confirm pass must match with pasword</span>
					</div>
					<div class="single">
						<label >Birth: </label>
						<select name="birthDate">
							<?php $i = 1; while ($i <= 31) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select>
						<select name="birthMonth">
							<?php $i = 1; while ($i <= 12) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select>
						<select name="birthYear">
							<?php $i = 1960; while ($i <= 2016) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select>
					</div>
					<div class="single">
						<label for="gender">Gender: </label>
						<input type="radio" id="gender" name="gender" value="1" onclick="test5()"> Male <span id="value5" style="color:blue">select anyone</span>
						<input type="radio" id="gender" name="gender" value="0" onclick="test5()"> Female
					</div>
					<div class="single">
						<label for="phone">Phone: </label>
						<input type="text" id="phone" name="phone" placeholder="Phone"onkeyup="test3()"><span id="value3" style="color:blue">type something</span>
					</div>
					<input type="submit" name="submit" value="submit" onclick="return check()"></br>
				<a href="index.php">Go Back<a>	
				</form>
				
			</div>
		<!--	<div class="sidebar">
			<?php //require 'template/sidemenu.php'; ?>
			</div>-->
		</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
		</div>
	</div>


</body>
</html>