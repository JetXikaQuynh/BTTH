<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<form action="?action=store" method="post">
    <div class="form-group">
        <label for="name">Sản Phẩm</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="text" name="price" class="form-control">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="add_product" value="add">Thêm</button>
    </div>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
