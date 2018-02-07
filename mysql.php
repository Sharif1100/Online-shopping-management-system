<?php
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
$sq1 = "CREATE TABLE users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstName varchar(100) NOT NULL,
lastName varchar(100) NOT NULL,
email varchar(100) NOT NULL,
password varchar(255) NOT NULL,
 birthday date NOT NULL,
 gender varchar(20) NOT NULL,
 phone varchar(30) NOT NULL,
 role tinyint(1) NOT NULL DEFAULT '0',
signup_date TIMESTAMP
)";

if (mysqli_query($conn, $sq1)) {
    echo "Table is created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>