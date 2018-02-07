
<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<form action="tran1.php" method="post">
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
$track="";
$track1="";	
$track2="";
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq2 = "SELECT * FROM payment";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["accountrec"]!=0){
		$track=$row["signup_date"];

		$datearr=explode(" ",$track);	
//$datearr4=explode("-",$datearr3);
$c=$datearr[0];
$datearr2=explode("-",$c);
	//echo $datearr2[1]."</br>";	
		
		if(($datearr2[0]!=$track2)&&($datearr2[1]==$track1)){
				echo '<input type="radio" name="e1" value="'.$datearr[0].'">'.$row["signup_date"]."</br>"."</br>";
			$track1=$datearr2[1];
			$track2=$datearr2[0];
		}
		else if($datearr2[1] !=$track1){
				echo '<input type="radio" name="e1" value="'.$datearr[0].'">'.$row["signup_date"]."</br>"."</br>";
			$track1=$datearr2[1];
			$track2=$datearr2[0];
		}
	   
	   }
}
}	

mysqli_close($conn);	

?>

<input type="submit" value="open">
</div>
</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>