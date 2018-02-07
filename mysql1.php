<?php
$conn = mysqli_connect("localhost", "root", "rafsan","sp1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
$sq1 = "CREATE TABLE products(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL,
  quantity int(11) NOT NULL,
  price int(11) NOT NULL,
  category_id varchar(11) NOT NULL,
  image varchar(255) DEFAULT NULL,
  discount int(11) DEFAULT NULL,
  uniqueP varchar(5) DEFAULT NULL,
signup_date TIMESTAMP
)";

if (mysqli_query($conn, $sq1)) {
    echo "Table is created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>