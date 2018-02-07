<?php
function getJSONFromDB1($sql){
	$conn = mysqli_connect("localhost", "root","","sp1");
	
	echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);

}
?>