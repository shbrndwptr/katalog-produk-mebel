<?php
session_start();
include '../koneksi.php';

// Validasi login melalui sesi atau cookie
if (!isset($_SESSION['logged_in_user']) && !isset($_COOKIE['username'])) {
    header("Location: login.php"); // Redirect ke login jika tidak ada sesi atau cookie
    exit;
}

// Pastikan sesi atau cookie memiliki data yang valid
if (isset($_SESSION['logged_in_user']['email'])) {
    $username = $_SESSION['logged_in_user']['email'];
} elseif (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
} else {
    // Redirect ke login jika data tidak valid
    header("Location: login.php");
    exit;
}

// Ambil data pesanan
$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Orders</title>
    <link rel="stylesheet" href="/Shabrina/css/admin.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2 class="sidebar-title">Dashboard</h2>
    <ul>
        <li>
            <a href="admin.php">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/home.png" alt="Dashboard Icon"/>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="product.php">
                <img src="https://img.icons8.com/?size=100&id=82774&format=png&color=FFFFFF" width="20" height="20" alt="Products Icon" />
                <span class="menu-text">Products</span>
            </a>
        </li>
        <li>
            <a href="orders.php">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/settings.png" alt="Orders Icon"/>
                <span class="menu-text">Orders</span>
            </a>
        </li>
        <li>
            <a href="reports.php">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/message-group.png" alt="Reports Icon"/>
                <span class="menu-text">Reports</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/exit.png" alt="Logout Icon"/>
                <span class="menu-text">Logout</span>
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="content">
    <div class="header">
        <h1>Orders</h1>
    </div>

    <div class="orders-list">
        <h2>Order List</h2>
        <a href="orders-tambah.php" class="btn-add">Add New Order</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($order = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($order['id']); ?></td>
                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                <td><?php echo htmlspecialchars($order['status']); ?></td>
                <td>
                    <a href="orders-edit.php?id=<?php echo $order['id']; ?>">Edit</a>
                    <a href="orders-hapus.php?id=<?php echo $order['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
