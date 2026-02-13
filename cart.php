<?php
session_start();

// Remove item from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Check if cart exists
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>

<h2>Your Shopping Cart</h2>

<?php if (empty($cart)) { ?>
    <p>Your cart is empty.</p>
<?php } else { ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php
    $total = 0;
    foreach ($cart as $id => $item) {
        $total += $item['price'];
    ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['price']; ?></td>
        <td>
            <a href="cart.php?remove=<?php echo $id; ?>">Remove</a>
        </td>
    </tr>
    <?php } ?>

    <tr>
        <td><strong>Total</strong></td>
        <td colspan="2"><strong><?php echo $total; ?></strong></td>
    </tr>
</table>

<?php } ?>

<br>
<a href="index.php">Continue Shopping</a>

</body>
</html>
