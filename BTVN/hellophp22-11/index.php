<?php
session_start(); // Bắt đầu session

// Khởi tạo mảng sản phẩm nếu chưa tồn tại
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 1000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 2000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 3000],
    ];
}

// Xử lý các hành động CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    if ($action === 'add') { // Thêm sản phẩm
        $id = count($_SESSION['products']) + 1;
        $name = $_POST['name'];
        $price = $_POST['price'];
        $_SESSION['products'][] = ['id' => $id, 'name' => $name, 'price' => $price];
    } elseif ($action === 'edit') { // Sửa sản phẩm
        $id = $_POST['id'];
        foreach ($_SESSION['products'] as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $_POST['name'];
                $product['price'] = $_POST['price'];
                break;
            }
        }
    } elseif ($action === 'delete') { // Xóa sản phẩm
        $id = $_POST['id'];
        $_SESSION['products'] = array_filter($_SESSION['products'], function ($product) use ($id) {
            return $product['id'] != $id;
        });
    }
}

// Bao gồm header và footer
include('header.php');
?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <!-- Nút thêm sản phẩm -->
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>Add New Product</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Hiển thị bảng sản phẩm -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td>
                                <a href="#editProductModal" class="edit" data-toggle="modal"
                                   data-id="<?= $product['id'] ?>"
                                   data-name="<?= $product['name'] ?>"
                                   data-price="<?= $product['price'] ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
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

<!-- Modal thêm sản phẩm -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="add">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal sửa sản phẩm -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="edit-price" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="edit">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal xóa sản phẩm -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Đổ dữ liệu vào modal sửa sản phẩm
    $(document).on('click', '.edit', function () {
        $('#edit-id').val($(this).data('id'));
        $('#edit-name').val($(this).data('name'));
        $('#edit-price').val($(this).data('price'));
    });

    // Đổ dữ liệu vào modal xóa sản phẩm
    $(document).on('click', '.delete', function () {
        $('#delete-id').val($(this).data('id'));
    });
</script>

<?php include('footer.php'); ?>
