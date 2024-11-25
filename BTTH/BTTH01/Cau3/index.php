<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<?php
    // Đường dẫn tới file CSV
    $filename = "KTPM2.csv";

    // Mảng chứa dữ liệu sinh viên
    $sinhvien = [];

    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề)
        $headers = fgetcsv($handle, 1000, ",");

        // Loại bỏ BOM nếu có trong tiêu đề
        $headers = array_map(function($header) {
            return ltrim($header, "﻿"); // Loại bỏ ký tự BOM
        }, $headers);

        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sinhvien[] = array_combine($headers, $data);
        }

        fclose($handle);
    }
?>

<body class="bg-light">
    <main class="container py-5">
        <div class="text-center mb-4">
            <h1 class="text-primary fw-bold">Danh sách sinh viên</h1>
        </div>

        <div class="table-responsive shadow-lg">
            <table class="table table-striped table-hover align-middle bg-white">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">City</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinhvien as $sv): ?>
                        <tr>
                            <td><?= htmlspecialchars($sv['username']); ?></td>
                            <td><?= htmlspecialchars($sv['password']); ?></td>
                            <td><?= htmlspecialchars($sv['lastname']); ?></td>
                            <td><?= htmlspecialchars($sv['firstname']); ?></td>
                            <td><?= htmlspecialchars($sv['city']); ?></td>
                            <td><?= htmlspecialchars($sv['email']); ?></td>
                            <td><?= htmlspecialchars($sv['course1']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
