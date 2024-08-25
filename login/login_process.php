<?php
include "../admin/config.php";

$category = $_POST['category'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($category === "user") {
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
} else {
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
}

if ($stmt = $conn->prepare($sql)) {
    
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if ($category === "user") {
            header("Location: ../homepage/home.html");
        } else {
            header("Location: ../admin/admin.html");
        }
    } else {
        if ($category === "user") {
            echo "<h1>Invalid User</h1>";
        } else {
            echo "Sorry, Admin not found";
        }
    }
    $stmt->close();
} else {
    echo "Error: Could not prepare statement";
}

$conn->close();
?>
