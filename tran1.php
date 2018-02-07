
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
$income=0;
if(isset($_POST["e1"])){
$a=$_POST["e1"];

//echo $i;	
}
if($a==""){
	echo "you must select one!"."</br>";
	
	
}
else{
	//echo $a;
	$date1=explode("-",$a);	
	//echo $date1[1];
	$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
	
$sq2 = "SELECT * FROM payment";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
//echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["accountrec"]!=0){
		$track=$row["signup_date"];

$datearr2=explode(" ",$track);	
//echo $datearr2[0]."</br>";
$c=$datearr2[0];
$date2=explode("-",$c);

//$e=$date2[1];
//echo $e."</br>";
//echo $c;
//echo $datearr3[0]."</br>";
//echo $datearr3[1]."</br>";	
	//echo $datearr3[1]."</br>";
	//echo $datearr[1];	
		if(($date2[0]==$date1[0])&&($date2[1]==$date1[1])){
				echo "user email:".$row["email"]."</br>";
				echo "Pproduct name:".$row["productname"]."</br>";
				echo "balance receieved:".$row["accountrec"]."</br>";
				echo "transection date:".$row["signup_date"]."</br>"."</br>";
		
		echo "transected By:".$row["emp"]."</br>"."</br>";
		$income=$income+$row["accountrec"];
		}
	   
	   }
}
}	
echo " total income of this month is:".$income."</br>";
mysqli_close($conn);
	
	
	
	
}



?>
<a href="profile.php">GO BACK</a>
</div>
</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>

</body>
</html>