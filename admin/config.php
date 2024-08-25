<?php
$conn = new mysqli("localhost","root","","perfume_project");

if($conn->connect_error){
    echo "Error:".$conn->connect_error;
}
else{
    echo "<script>alert('Database connected Successfully.')</script>";
}

$table="CREATE TABLE IF NOT EXISTS users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
phone INT(13) NOT NULL,
email VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
date TIMESTAMP);";

$table1="CREATE TABLE IF NOT EXISTS admin(
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
date TIMESTAMP);";

if($conn->query($table) === TRUE && $conn->query($table1) === TRUE){
    echo "<script>alert('Table created')</script>";
}

?>