<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $insertQuery = "INSERT INTO orders (customer_name, order_date, status) VALUES ('$customer_name', '$order_date', '$status')";
    mysqli_query($conn, $insertQuery);

    header("Location: orders.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
</head>
<body>
    <h2>Add New Order</h2>
    <form method="post">
        <label>Customer Name:</label>
        <input type="text" name="customer_name"><br>
        <label>Order Date:</label>
        <input type="date" name="order_date"><br>
        <label>Status:</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select><br>
        <button type="submit">Add Order</button>
    </form>
</body>
</html>
