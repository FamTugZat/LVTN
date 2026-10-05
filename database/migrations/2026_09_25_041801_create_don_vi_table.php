<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_vi', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_vi', 10)->unique();
            $table->string('ten_don_vi',50);
            $table->string('dia_chi', 250)->nullable();
            $table->string('dien_thoai', 15)->nullable();
            $table->string('trang_thai')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_vi');
    }
};
