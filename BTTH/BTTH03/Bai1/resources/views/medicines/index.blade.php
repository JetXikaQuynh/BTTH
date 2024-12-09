<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Thuốc</title>
</head>
<body>
    <h1>Danh sách Thuốc</h1>
    @foreach($medicines as $medicine)
        <p>Tên: {{ $medicine->name }} - Giá: {{ $medicine->price }}</p>
    @endforeach
</body>
</html>
