
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm người dùng</title>
</head>
<body>

    <h2>THÊM NGƯỜI DÙNG</h2>

    
<form action="{{ route('nguoidung.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <p>
        <label>Họ tên:</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label>Email:</label>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Hình ảnh:</label>
        <input type="file" name="hinhanh" accept="image/*">
    </p>

    <button type="submit">Thêm</button>

    <a href="{{ route('nguoidung.index') }}">Quay lại</a>
</form>

</body>
</html>