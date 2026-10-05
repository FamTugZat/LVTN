<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Đơn Vị</title>
</head>
<body>
    <h2>Danh sách đơn vị</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('don_vi.create') }}">Thêm đơn vị</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>

        @foreach($ds as $donVi)
            <tr>
                <td>{{ $donVi->id }}</td>
                <td>{{ $donVi->ma_don_vi }}</td>
                <td>{{ $donVi->ten_don_vi }}</td>
                <td>{{ $donVi->dia_chi }}</td>
                <td>{{ $donVi->dien_thoai }}</td>
                <td>@if($donVi->trang_thai == 1)
                              Hoạt động
                       @else
                             Không hoạt động
                        @endif
                </td>
                <td>
                    <a href="{{ route('don_vi.edit', $donVi->id) }}">
                        Sửa
                    </a>

                    <form action="{{ route('don_vi.destroy', $donVi->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>