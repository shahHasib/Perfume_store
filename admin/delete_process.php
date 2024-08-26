<?php
include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];

    // Fetch the image path to delete the image file
    $sql = "SELECT image_path FROM products WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $stmt->bind_result($image_path);
        $stmt->fetch();
        $stmt->close();

        // Delete the image file
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Prepare the SQL statement to delete the item from the database
    $sql = "DELETE FROM products WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $item_id);
        if ($stmt->execute()) {
            echo "Item deleted successfully!";
        } else {
            echo "Error deleting item: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
