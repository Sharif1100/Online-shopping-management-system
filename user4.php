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
$x="";
if(isset($_POST["e1"])){
$a=$_POST["e1"];

//echo $i;	
}
$pid="";
if($a==""){
echo "you must select one"."</br>";	
	
}
else{
	
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");

$_SESSION["pay"]=$a;	
$sq2 = "SELECT * FROM payment";
$sq3 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
$result2 = mysqli_query($conn, $sq3)or die(mysqli_error());
echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["id"]==$a){
		$x=$row["signup_date"];
		$pid=$row["productid"];
		$_SESSION["quanpro"]=$row["quantity"];
		echo $row["productname"]."</br>"."</br>"; 
      $_SESSION["sees"]=$row["productid"];
	  // $sees=$row["productid"];
	   if($row["accountspay"]!=0){
		   
		  echo "NOT PAID:".$row["accountspay"]."</br>" ;
	      }
		  else{
			  echo "PAID:".$row["accountrec"]."</br>" ;
			  
		  }
	   
	   
	   }
	   
	}

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result2)) {
if($row1["id"]==$pid){
	  //echo "quantity: " ."  ".$row1["quantity"]."</br>";
	  
       echo " real price: " ."  ".$row1["price"]."</br>";
       echo "price: " ."  ".$row1["discount"]."</br>"; 
       
	   echo '<img width="300px" height="300px" src="'.$row1["image"].'">'."</br>";

	   if($row1["uniqueP"]==1){
		 echo "unique product!"."</br>"."</br>"."</br>";  
		   
	   }
	   else{
		   
		   echo "</br>"."</br>"."</br>";
	   }

	  
	  }
	  }
	}	
}
$_SESSION["sign"]=$x;
//echo $_SESSION["sign"];	

mysqli_close($conn);	


}
?>
<a href="user5.php">cancel</a>
<h1 style="color:red;">note:you can cancel order within 24 hours</h1>
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