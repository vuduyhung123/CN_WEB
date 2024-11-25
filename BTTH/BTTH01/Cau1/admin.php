<?php
session_start();
include 'functions.php';
// Kiểm tra nếu mảng hoa có trong session, nếu không thì khởi tạo
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = $flowers;
}

$flowers = $_SESSION['flowers'];
// unset($_SESSION['flowers']);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Quản lý danh sách hoa</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Flower Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guest.php">Guest</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Nút Thêm Hoa -->
        <div class="text-right mb-3">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addFlowerModal">
                <i class="fas fa-plus"></i> Thêm Hoa
            </button>
        </div>

        <!-- Bảng danh sách hoa -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tên Hoa</th>
                    <th>Mô Tả</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower) : ?>
                    <tr>
                        <td><?= $flower['name'] ?></td>
                        <td><?= nl2br(wordwrap($flower['description'], 100, "\n", true)) ?></td>
                        <td>
                            <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" class="img-fluid" style="width: 200px; height: 150px; object-fit: cover;">
                        </td>
                        <td>
                            <!-- Nút sửa (Mở modal sửa) -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editFlowerModal<?= $index ?>">
                                <i class="fas fa-edit"></i> Sửa
                            </button>

                            <!-- Nút xóa -->
                            <form method="POST" action="delete.php" style="display:inline;">
                                <input type="hidden" name="index" value="<?= $index ?>">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php include 'edit_form.php'; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Thêm Hoa -->
    <?php include 'add_form.php'; ?>

    <!-- Bootstrap JS (optional, for components like modals, tooltips, etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>