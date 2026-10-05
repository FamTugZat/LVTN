<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonVi;
class DonViController extends Controller
{
    public function index()
    {
        $ds = DonVi::all();
        return view('don_vi.index', compact('ds'));
    }
    public function create()
    {
        return view('don_vi.create');
    }
    public function store(Request $request)
    {
        DonVi::create([
            'ma_don_vi' => $request->ma_don_vi,
            'ten_don_vi' => $request->ten_don_vi,
            'dia_chi' => $request->dia_chi,
            'dien_thoai' => $request->dien_thoai,
            'trang_thai' => $request->trang_thai,
        ]);


        return redirect()->route('don_vi.index')
                         ->with('success', 'Đơn vị đã được tạo thành công.');
    }
    public function edit($id)
    {
        $donVi = DonVi::findOrFail($id);
        return view('don_vi.edit', compact('donVi'));
    }
    public function update(Request $request, $id)
    {
        $donVi = DonVi::findOrFail($id);
        $donVi->update([
            'ma_don_vi' => $request->ma_don_vi,
            'ten_don_vi' => $request->ten_don_vi,
            'dia_chi' => $request->dia_chi,
            'dien_thoai' => $request->dien_thoai,
        ]);

        return redirect()->route('don_vi.index')
                         ->with('success', 'Đơn vị đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        $donVi = DonVi::findOrFail($id);
        $donVi->delete();

        return redirect()->route('don_vi.index')
                         ->with('success', 'Đơn vị đã được xóa thành công.');
    }

}
