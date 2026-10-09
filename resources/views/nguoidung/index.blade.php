<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        :root{
            --mau-chinh:#2563eb;
            --mau-chinh-dam:#1d4ed8;
            --nen:#f3f6fb;
            --the-card:#ffffff;
            --van-ban:#1f2937;
            --chu-phu:#6b7280;
            --vien:#e5e7eb;
            --bong:0 12px 28px rgba(37,99,235,.12);
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            font-family:Arial,Helvetica,sans-serif;
            background:linear-gradient(135deg,#eef4ff 0%, #f8fafc 100%);
            color:var(--van-ban);
        }

        .trang{
            max-width:1200px;
            margin:40px auto;
            padding:20px;
        }

        .the-card{
            background:var(--the-card);
            border:1px solid var(--vien);
            border-radius:18px;
            box-shadow:var(--bong);
            overflow:hidden;
        }

        .dau-trang{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:16px;
            padding:22px 28px;
            background:linear-gradient(135deg,#eff6ff 0%, #ffffff 100%);
            border-bottom:1px solid var(--vien);
        }

        .dau-trang h2{
            margin:0;
            font-size:2rem;
            font-weight:700;
            color:#0f172a;
        }

        .nut-them{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            text-decoration:none;
            background:linear-gradient(135deg,var(--mau-chinh) 0%, var(--mau-chinh-dam) 100%);
            color:#fff;
            padding:12px 20px;
            border-radius:12px;
            font-weight:700;
            box-shadow:0 10px 20px rgba(37,99,235,.22);
        }

        .khung-bang{
            padding:20px 18px 28px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        thead th{
            background:#f8fafc;
            color:#0f172a;
            text-align:left;
            padding:16px 14px;
            font-weight:700;
            border-bottom:1px solid var(--vien);
        }

        tbody td{
            padding:16px 14px;
            border-bottom:1px solid var(--vien);
            color:#334155;
            vertical-align:middle;
        }

        tbody tr:hover{
            background:#f8fbff;
        }

        .anh-nguoi-dung{
            width:80px;
            height:90px;
            object-fit:cover;
            border-radius:12px;
            border:2px solid #dbeafe;
            display:block;
        }

        .khong-co-anh{
            display:inline-block;
            padding:8px 12px;
            border-radius:10px;
            background:#f3f4f6;
            color:var(--chu-phu);
            border:1px dashed #d1d5db;
        }

        .nhom-nut{
            display:flex;
            align-items:center;
            gap:8px;
        }

        .nut-sua,
        .nut-xoa{
            border:none;
            text-decoration:none;
            padding:8px 14px;
            border-radius:10px;
            font-weight:600;
            cursor:pointer;
            font-size:14px;
        }

        /* Nút sửa */
        .nut-sua{
            background:#e0f2fe;
            color:#0369a1;
        }

        .nut-sua:hover{
            background:#bae6fd;
        }

        /* Nút xóa */
        .nut-xoa{
            background:#fee2e2;
            color:#dc2626;
        }

        .nut-xoa:hover{
            background:#fecaca;
        }

        @media (max-width: 768px) {
            .dau-trang{
                flex-direction:column;
                align-items:flex-start;
            }

            .dau-trang h2{
                font-size:1.5rem;
            }

            .khung-bang{
                overflow-x:auto;
            }

            table{
                min-width:700px;
            }
        }
    </style>
</head>
<body>

    <div class="trang">
        <div class="the-card">
            <div class="dau-trang">
                <h2>QUẢN LÝ NGƯỜI DÙNG</h2>
                <a href="{{ route('nguoidung.create') }}" class="nut-them">
                    + Thêm người dùng
                </a>
            </div>

            <div class="khung-bang">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ds as $nd)
                            <tr>
                                <td>{{ $nd->id }}</td>
                                <td>{{ $nd->name }}</td>
                                <td>{{ $nd->email }}</td>
                                <td>
                                    @if ($nd->hinhanh)
                                        <img src="{{ asset('storage/' . $nd->hinhanh) }}"
                                             alt="Hình ảnh người dùng"
                                             class="anh-nguoi-dung">
                                    @else
                                        <span class="khong-co-anh">Chưa có ảnh</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="nhom-nut">

                                        {{-- Nút sửa --}}
                                        <a href="{{ route('nguoidung.edit', $nd->id) }}" class="nut-sua">
                                            Sửa
                                        </a>

                                        {{-- Nút xóa --}}
                                        <form action="{{ route('nguoidung.destroy', $nd->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="nut-xoa">
                                                Xóa
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>