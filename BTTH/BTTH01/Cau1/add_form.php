<!-- Modal Thêm Hoa -->
<div class="modal fade" id="addFlowerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm Hoa Mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea name="description" class="form-control" id="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình Ảnh</label>
                        <input type="file" name="image" class="form-control-file" id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Hoa</button>
                </form>
            </div>
        </div>
    </div>
</div>
