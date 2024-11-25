<?php
include 'product.php';
?>

<?php include 'header.php'; ?>


<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-auto">
                            <h2><b>Administration</b></h2>
                        </div>
                        <div class="col-sm-auto">
                            <h2>Trang chủ</h2>
                        </div>
                        <div class="col-sm-auto">
                            <h2>Trang ngoài</h2>
                        </div>
                        <div class="col-sm-auto">
                            <h2><b>Thể loại</b></h2>
                        </div>
                        <div class="col-sm-auto">
                            <h2>Tác giả</h2>
                        </div>
                        <div class="col-sm-auto">
                            <h2>Bài viết</h2>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><span>Thêm</span></a>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Thành (VND)</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price']) ?> VND</td>
                            <td>
                                <a href="#editProductModal" class="edit" data-toggle="modal" data-id="<?= $product['id'] ?>" data-name="<?= htmlspecialchars($product['name']) ?>" data-price="<?= $product['price'] ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                            </td>
                            <td>
                                <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?= $product['id'] ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Modal Thêm Sản Phẩm -->
    <div id="addProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_product.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Sản Phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá Thành (VND)</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-success" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Sửa Sản Phẩm -->
    <div id="editProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="update_product.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh Sửa Sản Phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit-id">
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="edit_name" id="edit-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá Thành (VND)</label>
                            <input type="number" name="edit_price" id="edit-price" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" name="update_product" class="btn btn-info" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Xóa Sản Phẩm -->
    <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="delete_product.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Sản Phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete-id">
                        <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                        <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-danger" value="Xóa">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Gán dữ liệu vào modal sửa
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = $(this).data('price');
            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-price').val(price);
        });

        // Gán dữ liệu vào modal xóa
        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');
            $('#delete-id').val(id);
        });
    </script>

</body>
<?php include 'footer.php'; ?>

</html>