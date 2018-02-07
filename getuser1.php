<?php
$q = $_REQUEST['q'];

$con = mysqli_connect('localhost','root','rafsan','sp1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT id FROM products WHERE name ='$q' ";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
  
	   echo $_GET["product_id"]=$row["id"] ;
		
}


?>