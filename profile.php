<?php 
session_start(); 
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
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
		<?php require 'template/menu1.php'; ?>
		<div class="maincontent">
			<div class="content">
				<?php 
				$mysqli = new mysqli("localhost", "root","rafsan","sp1");
								$sq2 = "SELECT * FROM products";
$result2 = mysqli_query($mysqli, $sq2)or die(mysqli_error());
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["quantity"]<=10){
 echo '<blink>'."your"." ".$row["name"]." "."at"." ".$row["category_id"]." "."is"." ".$row["quantity"].'</blink>'."</br>"; 
	  //echo $row["image"];
	   }
	   
	}
}
							
				if ($mysqli->connect_errno) {
				   header("Location: signup.php");
				}

				$sql = "SELECT * FROM users WHERE id ='".$_SESSION['userId']."'";

					$user = $mysqli->query($sql);

					$check_user = $user->num_rows;

				 if ($check_user > 0) {

				    /* fetch object array */
				    while ($profile = $user->fetch_object()) { 
						 echo "<h3>Hello ! ".$profile->firstName .' '.$profile->lastName."</h3>
						 <div class='profile'>
						 	<p><b>Email : </b>".$profile->email."</p>
						 	<p><b>BirthDate : </b>".$profile->birthday."</p>
						 	<p><b>Gender : </b>";

					 			if($profile->gender == 1) {
					 				echo "Male";
					 			} else {
					 				echo "Female";
					 			}

						 	echo "</p>
						 	<p><b>Phone : </b>".$profile->phone."</p>
						 </div>";
				  		}
					} 
				?> 
			
				
			</div>
			<div class="sidebar">
			<?php// require 'template/sidemenu.php'; ?>
			    
			</div>
		</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>
	<!-- inclue jquery -->
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

</body>
</html>