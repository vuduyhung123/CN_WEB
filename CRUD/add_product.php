<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['name'];
    $new_price = $_POST['price'];
    $new_id = count($_SESSION['products']) + 1; // Tạo ID mới tự động

    // Thêm sản phẩm vào mảng
    $_SESSION['products'][] = ['id' => $new_id, 'name' => $new_name, 'price' => $new_price];
}

header('Location: index.php');
exit;
