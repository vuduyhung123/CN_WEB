<?php
session_start();

// Kiểm tra nếu mảng hoa có trong session, nếu không thì khởi tạo
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [];
}

$flowers = $_SESSION['flowers'];

// Xử lý upload ảnh
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Kiểm tra ảnh có hợp lệ không
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
    $fileName = $_FILES['image']['name'];
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];

    if (in_array($fileType, $allowedTypes)) {
        $uploadPath = 'images/' . basename($fileName);

        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Cập nhật thông tin hoa vào mảng
            $newFlower = [
                'name' => $name,
                'description' => $description,
                'image' => $uploadPath  // Lưu đường dẫn ảnh vào mảng hoa
            ];

            $_SESSION['flowers'][] = $newFlower;

            // Chuyển hướng trở lại trang quản lý sau khi thêm hoa
            header('Location: admin.php');
            exit;
        } else {
            echo "Lỗi khi upload ảnh.";
        }
    } else {
        echo "Chỉ hỗ trợ ảnh JPEG, PNG, JPG, hoặc WEBP.";
    }
}
?>
