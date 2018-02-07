<?php 
$title = $_GET['search'];
$mysqli = new mysqli("localhost", "root","rafsan", "sp1");
if ($mysqli->connect_errno) {
   die("connection error");
}
$sql = "SELECT id,name FROM products where name like '%$title%'";

$products = $mysqli->query($sql);
$check = $products->num_rows;

 if ($check > 0) {
    while ($product = $products->fetch_object()) { 
		$result[] =  $product; 
	}
	echo json_encode($result);
} 

$mysqli->close();