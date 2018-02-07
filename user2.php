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
	<?php require 'template/header.php'; ?>
		<?php //require 'template/header1.php'; ?>
		<?php require 'template/menu2.php'; ?>
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
$a=$_POST["loc"];
$b=$_POST["num"];
$c=$_POST["email"];
	$phone=strlen($b);
	//$len=strlen($i);
	
	$email=filter_var($c,FILTER_VALIDATE_EMAIL);
$d="";
$quan=$_POST["quan"];
$e=$_POST["days"];
$f=$_SESSION["id1"];
$g=$_SESSION["pname"];
$h=$_SESSION["price"];
$k=$_SESSION['userId'];
$l=$_SESSION["quantity"];

if(isset($_POST["pay"])){
$d=$_POST["pay"];	
	
}
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
if($a==""||$b==""||$c==""||$d==""||$e==""||$quan==""){
	echo "you must provide all info!"."</br>";
}
elseif($l<$quan){
	echo "sorry stock is limited!"."</br>";
	
}
elseif($quan<=0){
	echo "quantity is in correct!"."</br>";
}
elseif($phone==11 &&($email)){
	
$quan1=$h*$quan;	
	$sq1 = "INSERT INTO payment (userid,location,phonenumber,email,days,productid,quantity,productname,accountspay)
VALUES ('$k','$a','$b','$c','$e','$f','$quan','$g','$quan1')";
mysqli_query($conn, $sq1)or die(mysqli_error($conn)); 
echo "sir,your purchased successfully!we will contact with you very recently! you can  cancel your order within 24 hours 'cancel order' in the menu bar list.thank you! :)"."</br>";


//echo $d;
$l=$l-$quan;
$sq3="UPDATE products
SET quantity='$l' WHERE id='$f'";
if (mysqli_query($conn, $sq3)); 
$_SESSION["id1"]="";
$_GET["id"]="";
mysqli_close($conn);
}
else{
	echo "you email or phone number is incorrect!"."</br>";
}

?>
<a href="profile2.php">GO BACK</a>

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