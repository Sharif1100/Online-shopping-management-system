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
$a="";
$b=$_SESSION["cat"];
if(isset($_SESSION['userId'])){
$a=$_SESSION['userId'];
//echo $i;	
$ar=array();	
$i=0;
}?>
<form action="bestp3.php" method="post">
<?php
$conn = mysqli_connect("localhost", "root", "","sp1");
$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
	if($b==$row["category_id"]){
	//echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["name"]."</br>"."</br>"; 
//$key=$row["id"];
	$ar[$i]=$row["discount"];
	$i=$i+1;
	 }
	}
}
rsort($ar);
$arrlength = count($ar);


//$arrlength = count($ar);
for($x = 0; $x < $arrlength; $x++) {
$result1 = mysqli_query($conn, $sq2)or die(mysqli_error());
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
	while($row1 = mysqli_fetch_assoc($result1)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";

    //echo $numbers[$x];
    //echo "<br>";
 if(($b==$row1["category_id"])&&($row1["discount"]==$ar[$x])){
	
	echo "Name: "."   ".$row1["name"]."  ". "Prize:"." ".$row1["discount"]."</br>"; 
	 echo '<input type="radio" name="e1" value="'.$row1["id"].'">'."</br>"; 
   echo '<img width="100px" height="100px" src="'.$row1["image"].'">'."</br>"."</br>";
	  break;
	  }
	 }
	}
}
mysqli_close($conn);	

?>

<input type="submit" value="open">
</form>
</div>
</div>	
		<div class="footer">
			<p>&copy; Sharif 2017</p>
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
