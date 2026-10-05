<?php

namespace App\Http\Controllers;
use App\Models\NguoiDung;

use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index()
    {
        // Logic to retrieve and return a list of users
        $ds =NguoiDung::all();
        return view('nguoidung.index', compact('ds'));
    }
    public function create()
    {
        // Logic to show the form for creating a new user
        return view('nguoidung.create');
    }
    
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

    return redirect()->route('nguoidung.index');
}
    public function edit($id)
    {
        $nguoidung = NguoiDung::findOrFail($id);
        return view('nguoidung.edit', compact('nguoidung'));
    }
    public function update(Request $request, $id)
    {
        $nguoidung = NguoiDung::findOrFail($id);
        $nguoidung->update([
            'name' => $request->name,
            'email' => $request->email,
            'hinhanh' => $request->hinhanh,
        ]);
        return redirect()->route('nguoidung.index');
        
     
    }
    public function destroy($id)
    {
        $nguoidung = NguoiDung::findOrFail($id);
        $nguoidung->delete();
        return redirect()->route('nguoidung.index');
    }
}
