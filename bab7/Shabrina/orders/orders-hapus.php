<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM orders WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: orders.php");
}
?>
