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
$b=$_SESSION["cat1"];
//echo $b;
if(isset($_SESSION['userId'])){
$a=$_SESSION['userId'];
//echo $i;	
$ar=array();	
$i=0;
}?>
<form action="bests3.php" method="post">
<?php
$conn = mysqli_connect("localhost", "root", "","sp1");
$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
	if($b==$row["category_id"]){
	$ar[$i]=$row["id"];
	$i=$i+1;
	 }
	}
}
//rsort($ar);
//$arrlength = count($ar);
$ar1=array();
$count=0;
$sq3="SELECT * FROM payment";
$arrlength = count($ar);
for($x = 0; $x < $arrlength; $x++) {
$result1 = mysqli_query($conn, $sq3)or die(mysqli_error());
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
	while($row1 = mysqli_fetch_assoc($result1)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";

    //echo $numbers[$x];
    //echo "<br>";
 if(($row1["productid"]==$ar[$x])&&($row1["accountrec"]!=0)){
$quan=$row1["quantity"];
 $count=$count+$quan;
 $ar1[$row1["productid"]]=$count;	

	  }
	 }
	$count=0;
	}
}
arsort($ar1); 
/*foreach($ar1 as $k => $id){
    //echo $k."=>".$id."</br>";
	}*/
$sq4 = "SELECT payment.productname,products.id,products.image,products.discount,payment.productid
FROM payment
INNER JOIN products
ON (payment.productid=products.id)";
foreach($ar1 as $k => $id){
    //echo $k."=>".$id."</br>";

$result2 = mysqli_query($conn, $sq4)or die(mysqli_error());

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		if($k==$row["productid"]){
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>"; 
	echo "best sell product:"."</br>";	
	echo "Name: "."   ".$row["productname"]."  ". "Prize:"." ".$row["discount"]."</br>"; 
	 echo '<input type="radio" name="e1" value="'.$row["id"].'">'."</br>"; 
   echo '<img width="100px" height="100px" src="'.$row["image"].'">'."</br>"."</br>";	
		break;
		}
	}
 }
}
mysqli_close($conn);	

?>

<input type="submit" value="BUY NOW!">
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
