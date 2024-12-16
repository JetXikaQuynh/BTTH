<!-- resources/views/computers/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Computer</title>
</head>
<body>
    <h1>Edit Computer</h1>

    <!-- Form chỉnh sửa dữ liệu -->
    <form action="{{ route('computers.update', $computer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="computer_name">Computer Name:</label>
        <input type="text" name="computer_name" value="{{ $computer->computer_name }}" required>
        <br>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" value="{{ $computer->model }}" required>
        <br>

        <label for="operating_system">Operating System:</label>
        <input type="text" name="operating_system" id="operating_system" value="{{ $computer->operating_system }}" required>
        <br>

        <label for="memory">Memory:</label>
        <input type="number" name="memory" id="memory" value="{{ $computer->memory }}" required>
        <br>

        <label for="processor">Processor:</label>
        <input type="text" name="processor" id="processor" value="{{ $computer->processor }}" required>
        <br>

        <label for="available">Available:</label>
        <input type="checkbox" name="available" id="available" {{ $computer->available ? 'checked' : '' }}>
        <br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
