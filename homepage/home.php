<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Store</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="webProfile">
                <img src="../resources/webLogo.png" alt="" class="webImage">
                <h1 class="webName">Perfume Store</h1>
            </div>
                <form method="GET" action="" class="searchArea">
                    <input type="search" name="search" class="search" placeholder="Search Products" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
                    <button type="submit" class="searchButton" >
                        <img src="../resources/search.png" class="searchImg"/>
                    </button>
                </form>
           
            <div class="links">
                <a href="../login/login.html" class="link">Login</a>
            </div>
        </nav>
    </header>
<!-- 
    <div class="adsSection">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
        <img src="../resources/per_1.png" alt="" class="ad">
    </div> -->

    <div class='perfumes'>
    <?php
include "../admin/config.php";
if (isset($_GET['search']) && !empty($_GET['search'])) {
     $search_term = "%" . $_GET['search'] . "%";
     $sql = $conn->prepare("SELECT name, description, price, image_path FROM products WHERE name LIKE ? OR description LIKE ?");
    $sql->bind_param("ss", $search_term, $search_term);
} else {
        
      $sql = $conn->prepare("SELECT name, description, price, image_path FROM products");
}
$sql->execute();
        $result = $sql->get_result();

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

$sql->close();
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
