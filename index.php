<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple E-Commerce</title>
</head>
<body>

<h2>Products</h2>

<a href="cart.php">Go to Cart</a>

<hr>

<?php
// Sample products (temporary without database)
$products = [
    1 => ["name" => "Laptop", "price" => 50000],
    2 => ["name" => "Mobile", "price" => 20000],
    3 => ["name" => "Headphones", "price" => 2000]
];

// Add to cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][$id] = $products[$id];
    echo "<p>Product added to cart!</p>";
}

// Display products
foreach ($products as $id => $product) {
    echo "<h3>" . $product['name'] . "</h3>";
    echo "<p>Price: " . $product['price'] . "</p>";
    echo "<a href='index.php?add=$id'>Add to Cart</a>";
    echo "<hr>";
}
?>

</body>
</html>
