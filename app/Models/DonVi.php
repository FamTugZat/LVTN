<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = 'don_vi';

    protected $fillable = [
        'ma_don_vi',
        'ten_don_vi',
        'dia_chi',
        'dien_thoai',
        'trang_thai',
    ];
}
