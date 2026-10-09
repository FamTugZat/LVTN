<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sửa người dùng</title>

    <style>

        :root{
            --mau-chinh:#2563eb;
            --mau-chinh-dam:#1d4ed8;
            --nen:#f3f6fb;
            --the-card:#ffffff;
            --van-ban:#1f2937;
            --chu-phu:#6b7280;
            --vien:#e5e7eb;
            --loi:#dc2626;
            --bong:0 12px 28px rgba(37,99,235,.12);
        }

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            font-family:Arial,Helvetica,sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #eef4ff 0%,
                    #f8fafc 100%
                );

            color:var(--van-ban);
        }

        .trang{
            max-width:700px;

            margin:40px auto;

            padding:20px;
        }

        .the-card{
            background:#ffffff;

            border:1px solid var(--vien);

            border-radius:18px;

            box-shadow:var(--bong);

            overflow:hidden;
        }

        /* =========================
           TIÊU ĐỀ
        ========================= */

        .dau-trang{
            padding:22px 28px;

            background:
                linear-gradient(
                    135deg,
                    #eff6ff 0%,
                    #ffffff 100%
                );

            border-bottom:1px solid var(--vien);
        }

        .dau-trang h2{
            margin:0;

            font-size:1.8rem;

            color:#0f172a;
        }

        /* =========================
           FORM
        ========================= */

        .noi-dung{
            padding:28px;
        }

        .nhom-form{
            margin-bottom:20px;
        }

        .nhom-form label{
            display:block;

            margin-bottom:8px;

            font-weight:700;

            color:#334155;
        }

        .nhom-form input{
            width:100%;

            padding:12px 14px;

            border:1px solid #d1d5db;

            border-radius:10px;

            font-size:15px;

            outline:none;

            transition:0.2s;
        }

        .nhom-form input:focus{
            border-color:var(--mau-chinh);

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.10);
        }

        /* =========================
           ẢNH HIỆN TẠI
        ========================= */

        .anh-hien-tai{
            margin-top:10px;
        }

        .anh-hien-tai img{
            width:120px;

            height:140px;

            object-fit:cover;

            border-radius:12px;

            border:2px solid #dbeafe;
        }

        /* =========================
           LỖI VALIDATION
        ========================= */

        .thong-bao-loi{
            margin-bottom:20px;

            padding:14px 16px;

            border-radius:10px;

            background:#fee2e2;

            border:1px solid #fecaca;

            color:#b91c1c;
        }

        .thong-bao-loi ul{
            margin:0;

            padding-left:20px;
        }

        /* =========================
           NÚT
        ========================= */

        .nhom-nut{
            display:flex;

            gap:10px;

            margin-top:25px;
        }

        .nut-cap-nhat{
            border:none;

            background:
                linear-gradient(
                    135deg,
                    var(--mau-chinh),
                    var(--mau-chinh-dam)
                );

            color:white;

            padding:12px 20px;

            border-radius:10px;

            font-weight:700;

            cursor:pointer;

            text-decoration:none;

            font-size:15px;
        }

        .nut-cap-nhat:hover{
            background:#1d4ed8;
        }

        .nut-quay-lai{
            background:#f1f5f9;

            color:#334155;

            padding:12px 20px;

            border-radius:10px;

            font-weight:700;

            text-decoration:none;
        }

        .nut-quay-lai:hover{
            background:#e2e8f0;
        }

    </style>
</head>

<body>

<div class="trang">

    <div class="the-card">

        {{-- =========================
             TIÊU ĐỀ
        ========================= --}}

        <div class="dau-trang">

            <h2>
                SỬA NGƯỜI DÙNG
            </h2>

        </div>


        {{-- =========================
             NỘI DUNG
        ========================= --}}

        <div class="noi-dung">


            {{-- =========================
                 HIỂN THỊ LỖI
            ========================= --}}

            @if ($errors->any())

                <div class="thong-bao-loi">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =========================
                 FORM SỬA
            ========================= --}}

            <form
                action="{{ route('nguoidung.update', $nguoidung->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- HỌ TÊN --}}

                <div class="nhom-form">

                    <label for="name">
                        Họ tên
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $nguoidung->name) }}"
                        placeholder="Nhập họ tên"
                        required
                    >

                </div>


                {{-- EMAIL --}}

                <div class="nhom-form">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $nguoidung->email) }}"
                        placeholder="Nhập email"
                        required
                    >

                </div>


                {{-- HÌNH ẢNH --}}

                <div class="nhom-form">

                    <label for="hinhanh">
                        Hình ảnh
                    </label>

                    <input
                        type="file"
                        id="hinhanh"
                        name="hinhanh"
                        accept=".jpg,.jpeg,.png,.webp"
                    >


                    {{-- ẢNH CŨ --}}

                    @if ($nguoidung->hinhanh)

                        <div class="anh-hien-tai">

                            <p>
                                <strong>Hình ảnh hiện tại:</strong>
                            </p>

                            <img
                                src="{{ asset('storage/' . $nguoidung->hinhanh) }}"
                                alt="Hình ảnh hiện tại"
                            >

                        </div>

                    @endif

                </div>


                {{-- =========================
                     NÚT
                ========================= --}}

                <div class="nhom-nut">

                    <button
                        type="submit"
                        class="nut-cap-nhat"
                    >
                        Cập nhật
                    </button>


                    <a
                        href="{{ route('nguoidung.index') }}"
                        class="nut-quay-lai"
                    >
                        Quay lại
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>