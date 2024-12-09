<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bán Hàng</title>
</head>
<body>
    <h1>Danh sách Bán Hàng</h1>
    @foreach($sales as $sale)
        <p>Mã thuốc: {{ $sale->medicine_id }} - Số lượng: {{ $sale->quantity }} - Ngày bán: {{ $sale->sale_date }}</p>
    @endforeach
</body>
</html>
