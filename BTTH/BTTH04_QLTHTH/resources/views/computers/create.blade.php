<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Máy Tính</title>
    <!-- Thêm Bootstrap từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Thêm Máy Tính</h2>
        <form action="{{ route('computers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="computer_name" class="form-label">Tên Máy</label>
                <input type="text" class="form-control" id="computer_name" name="computer_name" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="mb-3">
                <label for="operating_system" class="form-label">Hệ Điều Hành</label>
                <input type="text" class="form-control" id="operating_system" name="operating_system" required>
            </div>
            <div class="mb-3">
                <label for="processor" class="form-label">Processor</label>
                <input type="text" class="form-control" id="processor" name="processor" required>
            </div>
            <div class="mb-3">
                <label for="memory" class="form-label">Memory (GB)</label>
                <input type="number" class="form-control" id="memory" name="memory" required>
            </div>
            <div class="mb-3">
                <label for="available" class="form-label">Trạng Thái</label>
                <select class="form-control" id="available" name="available">
                    <option value="1">Có Sẵn</option>
                    <option value="0">Không Có Sẵn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm Máy Tính</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
