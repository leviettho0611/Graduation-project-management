<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ke_hoachs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_ke_hoach');
            $table->date('ngay');
            $table->text('mo_ta');
            $table->string('file');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ke_hoachs');
    }
};
