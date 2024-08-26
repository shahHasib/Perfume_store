<?php
include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];
    
    // Handle image upload if a new image is provided
    $target_dir = "../resources/";
    $uploadOk = 1;
    $imageFileType = "";

    if (!empty($_FILES["item_image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
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
                // Update the item with new image
                $sql = "UPDATE products SET name = ?, description = ?, price = ?, image_path = ? WHERE id = ?";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("ssdsi", $item_name, $item_description, $item_price, $target_file, $item_id);
                    $stmt->execute();
                    $stmt->close();
                    echo "Item updated successfully!";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update the item without changing the image
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $item_name, $item_description, $item_price, $item_id);
            $stmt->execute();
            $stmt->close();
            echo "Item updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
