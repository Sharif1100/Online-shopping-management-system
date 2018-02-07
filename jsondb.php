<?php
require_once("mysql1-to-json1.php");

if($_REQUEST["signal"]=="readNAME"){
	echo getJSONFromDB1("SELECT id FROM products WHERE name =".$_REQUEST['name']);
}
else{
	echo "Invalid request";
}

$str="";for($i=0;$i<100000;$i++){$str.="slowing down";}
?>