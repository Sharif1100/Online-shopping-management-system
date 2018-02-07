<?php 
session_start(); 

if(isset($_SESSION["id1"])){
$a=$_SESSION["id1"];
}
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
		<?php require 'template/header.php'; ?>
		<?php require 'template/menu2.php'; ?>
		<div class="maincontent">
			<div class="content">
				<?php 
				$mysqli = new mysqli("localhost", "root","rafsan","sp1");
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
			<?php require 'template/sidemenu.php'; ?>
			    
			</div>
		</div>	
		<div class="footer">
			<p>&copy; AIUB 2016</p>
		</div>
	</div>
<script>
function showUser(str) {
  
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    //document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("result").innerHTML=this.responseText;
  
	
	
   //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      	
	}
   
      //document.onload=this.responseText;
  
  }
 
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}


</script>	

</body>
</html>

