<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<form action="?action=update&id=<?php echo $product['id']; ?>" method="post">
    <div class="form-group">
        <label for="name">Sản Phẩm</label>
        <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="text" name="price" class="form-control" value="<?php echo $product['price']; ?>">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="update_product" value="update">Sửa</button>
    </div>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
