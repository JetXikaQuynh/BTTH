<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sự cố</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quản lý sự cố</a>
    </nav>

    <div class="container mt-4">
        <h2>Danh sách vấn đề</h2>

        <!-- Thêm vấn đề -->
        <div class="mb-4">
            <a href="{{ route('issues.create') }}" class="btn btn-primary">Thêm vấn đề mới</a>
        </div>

        <!-- Bảng danh sách vấn đề -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã vấn đề</th>
                    <th>Tên máy tính</th>
                    <th>Tên phiên bản</th>
                    <th>Người báo cáo</th>
                    <th>Thời gian báo cáo</th>
                    <th>Mức độ sự cố</th>
                    <th>Trạng thái hiện tại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->computer->computer_name }}</td>
                    <td>{{ $issue->computer->model }}</td>
                    <td>{{ $issue->reported_by ?? 'N/A' }}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <!-- Chỉnh sửa vấn đề -->
                        <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>

                        <!-- Xóa vấn đề (Form DELETE) -->
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa vấn đề này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form Thêm vấn đề -->
    <div class="container">
        <h3>Thêm vấn đề mới</h3>
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="computer_id">Máy tính:</label>
                <select name="computer_id" id="computer_id" class="form-control">
                    @foreach ($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reported_by">Người báo cáo:</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="reported_date">Ngày báo cáo:</label>
                <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="urgency">Mức độ sự cố:</label>
                <select name="urgency" id="urgency" class="form-control">
                    <option value="Low">Thấp</option>
                    <option value="Medium">Trung bình</option>
                    <option value="High">Cao</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Open">Mới</option>
                    <option value="In Progress">Đang xử lý</option>
                    <option value="Resolved">Đã giải quyết</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Thêm vấn đề</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
