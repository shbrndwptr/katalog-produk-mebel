<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600, "/"); // Hapus cookie
header("Location: login.php");
exit;
?>
