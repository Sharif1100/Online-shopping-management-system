<?php
session_start();
$a=$_SESSION["id1"];
$mysqli = new mysqli("localhost","root","rafsan","sp1");
if ($mysqli->connect_errno) {
   die('Connection Error');

}

if(isset($_POST['Submit'])  && isset($_POST['useremail']) && isset($_POST['password']) )
{

		$email      =  $_POST['useremail'];
		$password   =  $_POST['password'];

	if (!empty($email) && !empty($password)) {
		
		$sql = "SELECT id,role FROM users WHERE email ='".$email."' AND password = '".$password."'";

		$user = $mysqli->query($sql);

		$check_user = $user->num_rows;

		if ($check_user > 0) {
			
		    /* fetch object array */
		    while ($userId = $user->fetch_object()) {
				$_SESSION['userId'] = 	$userId->id;
				$_SESSION['admin']  = 	$userId->role;
			    
				break;
				//header("Location: profile.php");
		    }
		if($userId->role==1){
			header("Location: profile.php");
}
elseif($userId->role==2){
			header("Location: profile1.php");
}
else{
	
			header("Location: profile2.php");
}
	
}
else{
	header("Location: login.php");
		}

		$mysqli->close();
	}
	else 
	{
		header("Location: login.php");
	}

	
}
else
{
	header("Location: login.php");
}
?>