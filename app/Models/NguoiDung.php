<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoidung';

    protected $fillable = [
        'name',
        'email',
        'hinhanh',
    ];
    public $timestamps = false;
}
