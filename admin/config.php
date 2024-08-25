<?php
$conn = new mysqli("localhost","root","","perfume_project");

if($conn->connect_error){
    echo "Error:".$conn->connect_error;
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

$table2 = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);";


if($conn->query($table) === TRUE && $conn->query($table1) === TRUE && $conn->query($table2) === TRUE){
    
}

?>