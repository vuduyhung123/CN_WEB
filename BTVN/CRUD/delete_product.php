<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_to_delete = $_POST['id'];

    // Xóa sản phẩm theo ID
    $_SESSION['products'] = array_filter($_SESSION['products'], function($product) use ($id_to_delete) {
        return $product['id'] != $id_to_delete;
    });

    // Reindex lại mảng
    $_SESSION['products'] = array_values($_SESSION['products']);
}

header('Location: index.php');
exit;
