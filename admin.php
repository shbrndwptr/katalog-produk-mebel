<?php
session_start();
// Validasi login melalui sesi atau cookie
if (!isset($_SESSION['logged_in_user']) && !isset($_COOKIE['username'])) {
    header("Location: login.php"); // Redirect ke login jika tidak ada sesi atau cookie
    exit;
}
// Ambil data pengguna dari sesi atau cookie
$username = isset($_SESSION['logged_in_user']['email']) 
    ? $_SESSION['logged_in_user']['email'] 
    : $_COOKIE['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Sun Furniture</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div id="sidebar">
    <h2>Sun Furniture</h2>
    <ul>
      <li><a href="#" onclick="showPage('dashboard')">Dashboard</a></li>
      <li><a href="#" onclick="showPage('products')">Products</a></li>
      <li><a href="#" onclick="showPage('orders')">Orders</a></li>
      <li><a href="#" onclick="showPage('reports')">Reports</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div id="main-content">
    <!-- Dashboard -->
    <div id="dashboard-page">
      <h1>Dashboard</h1>
      <p>Welcome to the Sun Furniture admin dashboard.</p>
      <p>Hello, <?php echo htmlspecialchars($username); ?>!</p>
    </div>
    <!-- Products -->
    <div id="products-page" style="display: none;">
      <h1>Products</h1>
      <button id="incrementButton" class="create-button">Create New Product</button>
      <button id="clearButton" class="create-button">Reset Count</button>
      <button id="count">0</button>
      <table id="product-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- Orders -->
    <div id="orders-page" style="display: none;">
      <h1>Orders</h1>
      <button class="create-button" onclick="showOrderModal()">Create New Order</button>
      <table id="order-table">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- Reports -->
    <div id="reports-page" style="display: none;">
      <h1>Reports</h1>
      <h2>Order Summary</h2>
      <table id="report-table">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <h3>Total Revenue: $<span id="total-revenue">0</span></h3>
    </div>
  </div>
  <!-- Scripts -->
  <script>
    const localStorageKey = "JUMLAH_KLIK";
    if (typeof Storage !== "undefined") {
      if (localStorage.getItem(localStorageKey) === null) {
        localStorage.setItem(localStorageKey, 0);
      }
      const incrementButton = document.querySelector("#incrementButton");
      const clearButton = document.querySelector("#clearButton");
      const countDisplay = document.querySelector("#count");
      // Menampilkan jumlah klik yang disimpan di localStorage
      countDisplay.innerText = localStorage.getItem(localStorageKey);
      // Tambah jumlah klik
      incrementButton.addEventListener("click", function () {
        let count = parseInt(localStorage.getItem(localStorageKey), 10);
        count++;
        localStorage.setItem(localStorageKey, count);
        countDisplay.innerText = count;
      });
      // Reset jumlah klik
      clearButton.addEventListener("click", function () {
        localStorage.setItem(localStorageKey, 0);
        countDisplay.innerText = 0;
      });
    } else {
      alert("Browser yang Anda gunakan tidak mendukung Web Storage");
    }
    // Script untuk navigasi halaman
    function showPage(page) {
      const pages = ["dashboard", "products", "orders", "reports"];
      pages.forEach(p => {
        document.getElementById(${p}-page).style.display = p === page ? "block" : "none";
      });
    }
  </script>
</body>
</html>
