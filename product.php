<?php
session_start();

// Sample products (same as index.php)
$products = [
    1 => ["name" => "Laptop", "price" => 50000],
    2 => ["name" => "Mobile", "price" => 20000],
    3 => ["name" => "Headphones", "price" => 2000]
];

// Check if product id is passed
if (!isset($_GET['id']) || !isset($products[$_GET['id']])) {
    echo "Product not found.";
    exit;
}

$id = $_GET['id'];
$product = $products[$id];

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $_SESSION['cart'][$id] = $product;
    echo "<p>Product added to cart!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>

<h2><?php echo $product['name']; ?></h2>
<p>Price: <?php echo $product['price']; ?></p>

<form method="post">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>

<br>
<a href="index.php">Back to Shop</a>
<br>
<a href="cart.php">Go to Cart</a>

</body>
</html>
