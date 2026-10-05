<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\NguoiDungController;

Route::resource('don_vi', DonViController::class);
Route::get('/', function () {
    return view('welcome');
});
//hien thi danh sach nguoi dung
Route::get('/nguoidung', [NguoiDungController::class, 'index'])
->name('nguoidung.index');



//hien thi form tao nguoi dung moi
Route::get('/nguoidung/create', [NguoiDungController::class, 'create'])
->name('nguoidung.create');



//luu nguoi dung moi
Route::post('/nguoidung', [NguoiDungController::class, 'store'])
->name('nguoidung.store');



//hien thi form chinh sua nguoi dung
Route::get('/nguoidung/{id}/edit', [NguoiDungController::class, 'edit'])
->name('nguoidung.edit');


//cap nhat nguoi dung
Route::put('/nguoidung/{id}', [NguoiDungController::class, 'update'])
->name('nguoidung.update');

//xoa nguoi dung
Route::delete('/nguoidung/{id}', [NguoiDungController::class, 'destroy'])->name('nguoidung.destroy');
