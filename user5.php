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
$quanpro="";
if(isset($_SESSION["quanpro"])){
	$quanpro=$_SESSION["quanpro"];
	
}
$sees=$_SESSION["sees"];
$quan="";
$a=$_SESSION["pay"];
$b=$_SESSION["sign"];
//echo $a."</br>";
//echo $b."</br>";
$date1= date("Y/m/d");
$date2= date("h:i:s");
$datearr=explode("/",$date1);
$datearr2=explode(":",$date2);

$acc="";
//echo $datearr[2];
$z=0;	
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

//echo $b;
$datearr3=explode(" ",$b);	
//$datearr4=explode("-",$datearr3);
$c=$datearr3[0];
$datearr4=explode("-",$c);
//echo $datearr4[2];
$d=$datearr3[1];
$datearr5=explode(":",$d);

$diff=$datearr[0]-$datearr4[0];
$diff2=$datearr[1]-$datearr4[1];
$diff3=$datearr[2]-$datearr4[2];

$diff4=$datearr2[0]-$datearr5[0];
//$diff5=$datearr2[1]-$datearr5[1];
//$diff6=$datearr2[2]-$datearr5[2];
//echo $diff."</br>";
//echo $diff2."</br>";
//echo $diff3."</br>";
//echo $diff4."</br>";
$sq1 = "SELECT * FROM payment";
$result1 = mysqli_query($conn, $sq1)or die(mysqli_error());
    // output data of each row

if (mysqli_num_rows($result1) > 0) {    
	while($row1 = mysqli_fetch_assoc($result1)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row1["id"]==$a){
		$acc=$row1["accountspay"];
	   
	   }  
	}
}
if($acc !=0){
if($diff<=0 && $diff2<=0){
	if($diff3<=1){
	if($diff<=24){	
$sql = "DELETE FROM payment WHERE id='$a'";
if (mysqli_query($conn, $sql)) {
    echo "order cancel!"."</br>";
$sq9 = "SELECT * FROM products";
$result9 = mysqli_query($conn, $sq9)or die(mysqli_error());
    // output data of each row

if (mysqli_num_rows($result9) > 0) {    
	while($row9 = mysqli_fetch_assoc($result9)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row9["id"]==$sees){
		$quan=$row9["quantity"];
	   
	   }  
	}
}
$quan=$quan + $quanpro;
$sq3="UPDATE products
SET quantity='$quan' WHERE id='$sees'";
if (mysqli_query($conn, $sq3));

  } 
 }
 else{
	 echo "order can't be cancel!"."</br>";
}
 }
 
 else{
	 echo "order can't be cancel!"."</br>";
	 
 }
}
else{
	echo "order can't be cancel!"."</br>";
}
}
else{
echo "you have already paid !"."</br>";	
	
	
}
mysqli_close($conn);	
?>
<a href="profile2.php">go back</a>

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