<?php
include 'data.php';

$isAdmin = isset($_GET['admin']); // Nếu có ?admin trong URL thì là quản trị viên

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // X,ly lưu thông tin (thêm, sửa)
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    if ($image['error'] === 0) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $targetFile);
    } else {
        $targetFile = $id !== "" ? $flowers[$id]['image'] : '';
    }

    $newFlower = ["name" => $name, "description" => $description, "image" => $targetFile];

    if ($id !== "") {
        $flowers[$id] = $newFlower; // Sửa
    } else {
        $flowers[] = $newFlower; // Thêm mới
    }

    // Ghi lại mảng vào file
    file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');
    header("Location: index.php?admin=1");
    exit;
}

if (isset($_GET['delete'])) {
    // Xóa hoa
    $id = $_GET['delete'];
    unset($flowers[$id]);
    file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');
    header("Location: index.php?admin=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php if ($isAdmin): ?>
        <h1>Quản trị danh sách hoa</h1>
        <a href="index.php">Xem dạng bài viết</a>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tên hoa</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower): ?>
                    <tr>
                        <td><?= htmlspecialchars($flower['name']); ?></td>
                        <td><?= htmlspecialchars($flower['description']); ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($flower['image']); ?>" 
                                 alt="<?= htmlspecialchars($flower['name']); ?>" 
                                 class="img-thumbnail" 
                                 width="100">
                        </td>
                        <td>
                            <a href="?admin=1&edit=<?= $index; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="?admin=1&delete=<?= $index; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?= isset($_GET['edit']) ? "Sửa Loài Hoa" : "Thêm Loài Hoa Mới"; ?></h2>
        <?php
        $id = $_GET['edit'] ?? "";
        $flower = $id !== "" ? $flowers[$id] : ["name" => "", "description" => "", "image" => ""];
        ?>
        
        <form action="index.php?admin=1" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên hoa:</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="<?= htmlspecialchars($flower['name']); ?>" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control" 
                        rows="4" 
                        required><?= htmlspecialchars($flower['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh:</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        class="form-control" 
                        <?= $id === "" ? "required" : ""; ?>>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
    <?php else: ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Danh sách các loài hoa</h1>
        <a href="index.php?admin=1" class="btn btn-primary mb-3">Chuyển sang quản trị</a>
        <div class="row">
            <?php foreach ($flowers as $flower): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= $flower['image']; ?>" class="card-img-top" alt="<?= $flower['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $flower['name']; ?></h5>
                            <p class="card-text"><?= $flower['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

</body>
</html>
