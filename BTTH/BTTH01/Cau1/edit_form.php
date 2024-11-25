<!-- edit_form.php -->
<div class="modal fade" id="editFlowerModal<?= $index ?>" tabindex="-1" aria-labelledby="editFlowerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFlowerModalLabel">Sửa Thông Tin Hoa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="edit.php">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $flower['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required><?= $flower['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình Ảnh URL</label>
                        <input type="text" class="form-control" id="image" name="image" value="<?= $flower['image'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>
