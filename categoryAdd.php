<?php 
session_start(); 
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	} else {
		if($_SESSION['admin'] !=0) {
			header("Location: login.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Category </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="signup">
		<?php require 'template/header.php'; ?>
		<?php require 'template/menu.php'; ?>
		<div class="maincontent">
			<div class="content">
			<b>Add product :</b>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
					<div>
						<label>Product name</label><br>
						<input type="text" name="name" placeholder="Product name" /><br>
					</div>
					
					<div>
						<input type="submit" name="Submit" value="Add" />
					</div>
				</form>
				
			</div>
			<div class="sidebar">
			<?php require 'template/sidemenu.php'; ?>
			    
			</div>
		</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>