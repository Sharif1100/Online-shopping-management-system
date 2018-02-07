
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
//echo print_r($_POST);
$a=$_POST['uname'];
$b=$_POST['uname2'];
$c=$_POST['date'];
$d=$_POST['month'];
$e=$_POST['year'];
//$f=$_POST['gender'];
$g=$_POST['phone'];
$email=$_POST['emailid'];
$i=$_POST['password'];
$j=$_POST['confirmpassword'];
$f="";

if(isset($_POST["gender"])){
	$f=$_POST["gender"];
//echo $f;	
}
if($a==""||$b==""||$c==""||$d==""||$e==""||$f==""||$g==""||$email==""||$i==""||$j==""){
echo "you must provide all info"."<br/>";	
}
else{
	$fname=strlen($a);
	$lname=strlen($b);
	$phone=strlen($g);
	$len=strlen($i);
	
	$h=filter_var($email,FILTER_VALIDATE_EMAIL);
if(($fname>2)&&($lname>1)&&($phone==11)&&($i==$j)&&($i==$len>7)&&($email==$h)){
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq2 = "SELECT * FROM users";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if(($row["phone"]==$g)||($row["email"]==$h)){
			
			echo "your info already exist in another account"."</br>";
		break;
       }
	   
	}
	if(($row["firstName"]!=$a)&&($row["phone"]!=$g)&&($row["email"]!=$h)){
$sq1 = "INSERT INTO users (firstName,lastName,gender,phone,email,password,role)
VALUES ('$a','$b','$f','$g','$h','$i','2')";
mysqli_query($conn, $sq1)or die(mysqli_error($conn)); 

	echo "completed"; 

	}
}
else{
$sq3 = "INSERT INTO users (firstName,lastName,gender,phone,email,password,role)
VALUES ('$a','$b','$f','$g','$h','$i','2')";
mysqli_query($conn, $sq3)or die(mysqli_error());

	echo "completed";	
  
}

mysqli_close($conn);
}
else{
	   echo "you should do correct info!";
	  
	
 }
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
