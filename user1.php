<!DOCTYPE html>
<html>
<head>
	<title>OnlineShooping</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
session_start();

//if(isset($_SESSION["id1"])){
//$a=$_SESSION["id1"];
//}
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
$b="";
$c="";
$d="";
$e="";
$f="";
$g="";
$h="";
$k="";
if(isset($_SESSION['userId'])){
$k=$_SESSION['userId'];
//echo $i;	
	
}
if (isset($_SESSION["id1"])){
$a=$_SESSION["id1"];
//echo $a;
}
if($a=="")
{
echo "you have nothing to purchase"."</br>";	
}
else{
?>	
<form action="user2.php"  method="post">
<h1>PAYMENT ISSUSE:</h1>	
location:<input value="" type="text" name="loc" />
</br></br>
phone number:<input value="" type="text" name="num" />
</br></br>	
email address:<input value="" type="text" name="email" />
</br></br>	
payment type:<input type="radio" name="pay" value="cash">Cash	
</br></br>
order time:<select name="days">
<option value="1">1 Week</option>
<option value="2">2 Week</option>
<option value="3">3 week</option>
<option value="4">4 week</option>
</select>
</br> </br>
Quantity:<input value="" type="text" name="quan" />
</br></br>
<input type="submit" value="submit"/></br>
</form>
<?php
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$a){
		$b=$row["name"];	
		$c=$row["quantity"];
		$d=$row["price"];
		$e=$row["category_id"];
		$f=$row["image"];
		$g=$row["discount"];
		$h=$row["uniqueP"];
		break;
       }
	   
	}
$_SESSION["pname"]=$b;
$_SESSION["price"]=$g;
$_SESSION["quantity"]=$c;
}
	
$sq3 = "SELECT * FROM category";
$result2 = mysqli_query($conn, $sq3)or die(mysqli_error());

if (mysqli_num_rows($result2) > 0) {
//echo $e; 
 // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		
		//echo $row2["category_name"];
		if($row2["id"]==$e){
echo "category name:"."  ".$row2["category_name"]."</br>";
       }
	   
	}
}	
echo "product name:".$b."</br>";	
echo "product price:".$d."</br>";	
echo "product discount:".$g."</br>";
echo '<img width="300px" height="300px" src="'.$f.'">'."</br>"."</br>";
mysqli_close($conn);	
}
?>
<?php
if(isset($_SESSION["id1"])){
?>
<a href="user6.php">CANCEL TRANSECTION</a></br>

<?php
}
?>
<a href="profile2.php">GO BACK</a>
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