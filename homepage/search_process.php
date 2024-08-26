<?php
include "../admin/config.php";

// Check if the search term is provided
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = "%" . $_GET['search'] . "%";
    
    // Prepare the SQL query to search in the products table
    $sql = $conn->prepare("SELECT name, description, price, image_path FROM products WHERE name LIKE ? OR description LIKE ?");
    $sql->bind_param("ss", $search_term, $search_term);
    
    $sql->execute();
    $result = $sql->get_result();
} else {
    // If no search term is provided, redirect to the main page or show an error
    header("Location: home.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="webProfile">
                <img src="../resources/webLogo.png" alt="" class="webImage">
                <h1 class="webName">Perfume Store</h1>
            </div>
            <div class="searchArea">
                <form method="GET" action="search_process.php">
                    <input type="search" name="search" class="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" required />
                    <button type="submit" class="searchButton">
                        <img src="../resources/search.png" alt="" class="searchImg">
                    </button>
                </form>
            </div>
            <div class="links">
                <a href="../login/login.html" class="link">Login</a>
            </div>
        </nav>
    </header>

    <div class='perfumes'>
        <?php
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
            echo "<p>No items found matching your search.</p>";
        }
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
</body>
</html>
