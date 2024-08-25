<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Perfume Store</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="webProfile">

                <img src="../resources/webLogo.png" alt="" class="webImage">
                <h1 class="webName">
                    Online Perfume Store
                </h1>
            </div>
            <div class="links">
                <a href="../login/login.html" class="link">Login</a>

            </div>
        </nav>
    </header>
    <div class="adsSection">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
    </div>
<div class='perfumes'>
<?php
include "../admin/config.php";
$sql = "SELECT name, description, price, image_path FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='item'>
                <div class='itemImage'>
                    <img src='" . $row["image_path"] . "' alt='" . $row["name"] . "'>
                </div>
                <div class='itemDetails'>
                    <h1 class='itemName'>" . $row["name"] . "</h1>
                    <p class='itemDescription'>" . $row["description"] . "</p>
                    <p class='itemPrice'>Price: $" . $row["price"] . "</p>
                    <button>Cart now</button>
                </div>
            </div>";
    }
} else {
    echo "<p>No items found.</p>";
}
$conn->close();
?>
</div>


    <footer>
        <div class="quickLinks">
            <a href="" class="link">Home</a>
            <a href="" class="link">Login</a>
            <a href="" class="link">About Us</a>
            <a href="" class="link">Contact Us</a>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>