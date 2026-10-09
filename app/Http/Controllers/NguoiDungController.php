<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    // Danh sách người dùng
    public function index()
    {
        $ds = NguoiDung::all();

        return view('nguoidung.index', compact('ds'));
    }

    // Form thêm người dùng
    public function create()
    {
        return view('nguoidung.create');
    }

    // Lưu người dùng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:nguoidung,email',
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $duongDan = null;

        if ($request->hasFile('hinhanh')) {
            $duongDan = $request->file('hinhanh')
                ->store('nguoidung', 'public');
        }

        NguoiDung::create([
            'name' => $request->name,
            'email' => $request->email,
            'hinhanh' => $duongDan,
        ]);

        return redirect()
            ->route('nguoidung.index')
            ->with('success', 'Thêm người dùng thành công!');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $nguoidung = NguoiDung::findOrFail($id);

        return view('nguoidung.edit', compact('nguoidung'));
    }

    // Cập nhật người dùng
    public function update(Request $request, $id)
    {
        $nguoidung = NguoiDung::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:nguoidung,email,' . $id,
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $duongDan = $nguoidung->hinhanh;

        if ($request->hasFile('hinhanh')) {
            $duongDan = $request->file('hinhanh')
                ->store('nguoidung', 'public');
        }

        $nguoidung->update([
            'name' => $request->name,
            'email' => $request->email,
            'hinhanh' => $duongDan,
        ]);

        return redirect()
            ->route('nguoidung.index')
            ->with('success', 'Cập nhật người dùng thành công!');
    }

    // Xóa người dùng
    public function destroy($id)
    {
        $nguoidung = NguoiDung::findOrFail($id);

        $nguoidung->delete();

        return redirect()
            ->route('nguoidung.index')
            ->with('success', 'Xóa người dùng thành công!');
    }
}