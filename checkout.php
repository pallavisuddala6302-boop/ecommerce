<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<?php if (empty($cart)) { ?>
    <p>Your cart is empty.</p>
    <a href="index.php">Go Back to Shop</a>
<?php } else { ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
    </tr>

    <?php
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'];
    ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['price']; ?></td>
    </tr>
    <?php } ?>

    <tr>
        <td><strong>Total</strong></td>
        <td><strong><?php echo $total; ?></strong></td>
    </tr>
</table>

<br><br>

<form method="post">
    <h3>Enter Your Details</h3>
    Name: <input type="text" name="name" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    <button type="submit" name="place_order">Place Order</button>
</form>

<?php
if (isset($_POST['place_order'])) {
    echo "<h3>Order placed successfully!</h3>";
    unset($_SESSION['cart']); // clear cart
}
?>

<?php } ?>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>
