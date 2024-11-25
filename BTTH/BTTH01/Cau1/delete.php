<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    // Kiểm tra nếu mảng hoa tồn tại trong session
    if (isset($_SESSION['flowers'])) {
        // Xóa hoa tại vị trí chỉ định trong mảng
        unset($_SESSION['flowers'][$index]);

        // Đổi lại chỉ số mảng để tránh lỗi khi hiển thị lại
        $_SESSION['flowers'] = array_values($_SESSION['flowers']);
    }

    // Chuyển hướng lại trang admin sau khi xóa
    header('Location: admin.php');
    exit;
}
?>
