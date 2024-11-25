<?php
session_start();

// Kiểm tra và khởi tạo danh sách sản phẩm nếu chưa có
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 1000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 2000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 3000]
    ];
}

// Trả về mảng sản phẩm hiện tại
$products = $_SESSION['products'];
?>
