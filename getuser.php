<?php
$q = $_REQUEST['q'];

$con = mysqli_connect('localhost','root','rafsan','sp1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM products" ;

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    
        if (stristr($q, substr($row["name"], 0, $len))) {
		//echo $row["name"]."</br>";
       echo '<ul>';
	   echo '<li><a href="singleProduct.php?product_id='. $row['id'] . '">' . $row['name'] . '</a></li>'."</br>";
		echo '</ul>'."</br>";
		
		}
    
	}
}
//$p=$q.;
//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT * FROM products WHERE name ='".$p."'";

/*if($_REQUEST['signal']=='read'){
$sql="SELECT * FROM products WHERE name >'$q' ";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
    
    //echo  $row['id'];
    
	//if($row['name']==$q){
		
		
	//echo  $row['name']."</br>";	
		//break;
	//}
//	else{
	  echo $row['name']."</br>";
    //}
	

	
	
	
	
	
	
	//echo  $row['Age'] . "</td>";
    //echo $row['Hometown'] . "</td>";
    //echo $row['Job'] . "</td>";
    
}
}*/
$str="";for($i=0;$i<100000;$i++){$str.="slowing down";}
mysqli_close($con);
?>