<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 
session_start(); 

//$productId = $_GET['id'];


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
$catId=$_SESSION["editcat"];
$mysqli = new mysqli("localhost", "root","rafsan","sp1");
if ($mysqli->connect_errno) {
       die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

	$name  =  $_POST['name'];

if($name==""){
echo "you can't any field empty"."</br>";	
	
	
}
else{
	
		$sql = "UPDATE category SET category_name   ='".$name."'
								WHERE id   =$catId";

	

	if ($mysqli->query($sql) == true ) {
	    echo "update category successfully"."</br>";
	} else {
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;die();
	    //header("Location: editproduct3.php");
	    $_SESSION['a_p_message'] = 'Something wrong.';
	}



	$mysqli->close();

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