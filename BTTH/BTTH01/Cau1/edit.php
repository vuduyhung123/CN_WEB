<?php
session_start();

// Kiểm tra xem session đã khởi tạo danh sách hoa hay chưa
if (!isset($_SESSION['flowers'])) {
    die('Danh sách hoa không tồn tại!');
}

// Kiểm tra xem có dữ liệu POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Cập nhật thông tin hoa trong session
    $_SESSION['flowers'][$index] = [
        'name' => $name,
        'description' => $description,
        'image' => $image,
    ];

    // Chuyển hướng về trang quản lý hoa (admin.php)
    header('Location: admin.php');
    exit();
}
?>
