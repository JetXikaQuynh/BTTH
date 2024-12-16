<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Máy Tính</title>
    <!-- Thêm Bootstrap từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Danh Sách Máy Tính</h2>
        <a href="{{ route('computers.create') }}" class="btn btn-primary mb-3">Thêm Máy Tính</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Máy</th>
                    <th>Model</th>
                    <th>Hệ Điều Hành</th>
                    <th>Processor</th>
                    <th>Memory</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $computer)
                    <tr>
                        <td>{{ $computer->id }}</td>
                        <td>{{ $computer->computer_name }}</td>
                        <td>{{ $computer->model }}</td>
                        <td>{{ $computer->operating_system }}</td>
                        <td>{{ $computer->processor }}</td>
                        <td>{{ $computer->memory }} GB</td>
                        <td>{{ $computer->available == 1 ? 'Có sẵn' : 'Không có sẵn' }}</td>
                        <td>
                            <a href="{{ route('computers.edit', $computer->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
