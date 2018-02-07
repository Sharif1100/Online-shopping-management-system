<?php
session_start();
$a=$_SESSION["id1"];
$mysqli = new mysqli("localhost", "root", "rafsan", "sp1");
if ($mysqli->connect_errno) {
   header("Location: signup.php");
}
	$firstName  =  $_POST['firstName'];
	$lastName   =  $_POST['lastName'];
	$email      =  $_POST['email'];
	$password   =  $_POST['password'];
	$conpass    =  $_POST['conpass'];
	$birthDate  =  $_POST['birthDate'];
	$birthMonth =  $_POST['birthMonth'];
	$birthYear  =  $_POST['birthYear'];
	$gender     = "";
	$phone		=  $_POST['phone'];
if(isset($_POST['gender'])){
	$gender= $_POST['gender'];
	
	
}

if(($firstName=="") || ($lastName=="") || ($email=="") || ($password=="") || ($conpass=="") || ($gender=="")  || ($phone=="") ){
	
header("Location: signup.php");	
}
else
{
	//$phone=strlen($g);
	//$len=strlen($i);
	
	$h=filter_var($email,FILTER_VALIDATE_EMAIL);
	if ((strlen($password)>7)&&($password==$conpass)&&($h)&&(strlen($phone)==11)) {
		$inputDate = "".$birthYear."-".$birthMonth."-".$birthDate."";
		$inputDate = str_replace(' ', '', $inputDate);

		$sq2 = "SELECT * FROM users";
$result = mysqli_query($mysqli, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if(($row["phone"]==$phone)||($row["email"]==$email)){
			
			echo "your email or phone number already exist  in another account"."</br>";
		break;
       }
	   
	}
	if(($row["phone"]!=$phone)&&($row["email"]!=$email)){
$sql = "INSERT INTO users (firstName, lastName,email,password,birthday,phone,gender)
						VALUES ('".$firstName."','".$lastName."','".$email."','".$password."','".$inputDate."','".$phone."','".$gender."')";

		if ($mysqli->query($sql)) {
		    header("Location: login.php");
		} else {
		    header("Location: signup.php");
		}

	}
}
		

		$mysqli->close();
		
}
else{
	echo "you must give correct info!"."</br>";
}
/*else
	{
		header("Location: signup.php");
	}*/

}

?>