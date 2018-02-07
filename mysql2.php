<?php
$conn = mysqli_connect("localhost", "root", "","sp1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
$sq1 = "CREATE TABLE category(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category_name varchar(100) NOT NULL,
signup_date TIMESTAMP
)";

if (mysqli_query($conn, $sq1)) {
    echo "Table is created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>