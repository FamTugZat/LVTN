<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm đơn vị</title>
</head>
<body>

    <h2>Thêm đơn vị</h2>

    <form action="{{ route('don_vi.store') }}" method="POST">
        @csrf

        <p>
            <label>Mã đơn vị:</label>
            <input type="text" name="ma_don_vi">
        </p>

        <p>
            <label>Tên đơn vị:</label>
            <input type="text" name="ten_don_vi">
        </p>

        <p>
            <label>Địa chỉ:</label>
            <input type="text" name="dia_chi">
        </p>

        <p>
            <label>Điện thoại:</label>
            <input type="text" name="dien_thoai">
        </p>

        <p>
            <label>Trạng thái:</label>
            <select name="trang_thai">
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
        </p>

        <button type="submit">Thêm</button>

        <a href="{{ route('don_vi.index') }}">Quay lại</a>
    </form>

</body>
</html>