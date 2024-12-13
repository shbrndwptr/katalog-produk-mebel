<?php
session_start();

// Validasi login melalui sesi atau cookie
if (!isset($_SESSION['logged_in_user']) && !isset($_COOKIE['username'])) {
    header("Location: login.php"); // Redirect ke login jika tidak ada sesi atau cookie
    exit;
}

// Pastikan sesi atau cookie yang ada memiliki data yang sesuai
if (isset($_SESSION['logged_in_user']) && is_array($_SESSION['logged_in_user']) && isset($_SESSION['logged_in_user']['email'])) {
    $username = $_SESSION['logged_in_user']['email'];
} elseif (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
} else {
    // Jika tidak ada data valid, redirect ke halaman login
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

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
	


<div class="content">
    <div class="header">
        <h1>reports</h1>
    </div>
</div>

<!-- Sidebar Toggle Button
<div class="toggle-btn">
    <button class="sidebarBtn">
        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/menu.png" alt="Toggle Sidebar">
    </button>
</div> -->

<!-- <script>

// Sidebar Toggle Logic
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {
    sidebar.classList.toggle("active");
    if (sidebar.classList.contains("active")) {
        sidebarBtn.querySelector("img").src = "https://img.icons8.com/ios-glyphs/30/ffffff/cancel.png"; // Ganti ikon ke "close" saat sidebar aktif
    } else {
        sidebarBtn.querySelector("img").src = "https://img.icons8.com/ios-glyphs/30/ffffff/menu.png"; // Ganti ikon ke "menu" saat sidebar tidak aktif
    }
};

</script> -->

</body>
</html>
