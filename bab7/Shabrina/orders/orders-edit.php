<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM orders WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $order = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE orders SET customer_name='$customer_name', order_date='$order_date', status='$status' WHERE id=$id";
    mysqli_query($conn, $updateQuery);

    header("Location: orders.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <h2>Edit Order</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
        <label>Customer Name:</label>
        <input type="text" name="customer_name" value="<?php echo $order['customer_name']; ?>"><br>
        <label>Order Date:</label>
        <input type="date" name="order_date" value="<?php echo $order['order_date']; ?>"><br>
        <label>Status:</label>
        <select name="status">
            <option value="Pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Completed" <?php if ($order['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
