<?php
include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];
    
    // Handle image upload
    $target_dir = "../resources/";
    $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a real image or fake image
    $check = getimagesize($_FILES["item_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["item_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
            // Insert item into the database
            $sql = "INSERT INTO products (name, description, price, image_path) VALUES (?, ?, ?, ?)";
            
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssds", $item_name, $item_description, $item_price, $target_file);
                $stmt->execute();
                $stmt->close();
                echo "Item added successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
</head>
<body>
    <h2>Add Item</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required><br><br>
        <label for="item_description">Item Description:</label>
        <textarea id="item_description" name="item_description" required></textarea><br><br>
        <label for="item_price">Item Price:</label>
        <input type="number" id="item_price" name="item_price" step="0.01" required><br><br>
        <label for="item_image">Item Image:</label>
        <input type="file" id="item_image" name="item_image" required><br><br>
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
