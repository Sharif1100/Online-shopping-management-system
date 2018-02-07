<?php
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
$sq1 = "CREATE TABLE payment(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid varchar(100) NOT NULL,
location varchar(100) NOT NULL,
phonenumber int(24)NOT NULL,
email varchar(24)NOT NULL,
days int(24) NOT NULL,
productid int(6) NOT NULL,
productname varchar(24) NOT NULL,
accountspay int(24) NOT NULL,
signup_date TIMESTAMP
)";

if (mysqli_query($conn, $sq1)) {
    echo "Table is created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>