<?php require_once __DIR__ . '/../layouts/header.php'; ?>


<div style="display: flex; justify-content: space-between; align-items: center; margin: 0 100px">
    <h1>Danh sách sản phẩm</h1>
    <a href="?action=create" class="btn btn-primary">Thêm</a>
</div>

<div class="container">
    <table style="margin: 50px 0" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                        <a href="?action=edit&id=<?php echo $product['id']; ?>" class="btn btn-warning">Sửa</a>
                    </td>
                    <td>
                        <a href="?action=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
