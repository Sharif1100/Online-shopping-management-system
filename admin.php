
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

	$conn = mysqli_connect("localhost", "root", "","sp1");
	
$sq2 = "SELECT * FROM users";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
//echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["role"]==2){
				echo "name:".$row["firstName"]." ".$row["lastName"] ."</br>";
				echo "email:".$row["email"]."</br>";
				if($row["gender"]==1){
				echo "gender:"."Male"."</br>";
				}
				else{
				echo "gender:"."Female"."</br>";	
				}
				echo "phone:".	$row["phone"]."</br>";
				echo "signup date:".$row["signup_date"]."</br>"."</br>";
		
	   
	   }
}
}	
mysqli_close($conn);
?>
<a href="profile.php">GO BACK</a>
</div>
</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
		</div>
	</div>

</body>
</html>