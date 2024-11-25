<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_price = $_POST['edit_price'];

    // Tìm và cập nhật sản phẩm theo ID
    foreach ($_SESSION['products'] as &$product) {
        if ($product['id'] == $edit_id) {
            $product['name'] = $edit_name;
            $product['price'] = $edit_price;
            break;
        }
    }
}

header('Location: index.php');
exit;
