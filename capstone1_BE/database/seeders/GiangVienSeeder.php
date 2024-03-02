<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiangVienSeeder extends Seeder
{
    public function run()
    {
        DB::table('giang_viens')->delete();

        DB::table('giang_viens')->truncate();

        DB::table('giang_viens')->insert([
            [
                'ma_giang_vien'         => 001,
                'ten_giang_vien'        => "Nguyễn Đức Mận",
                'ngay_thang_nam_sinh'   => "1988-12-16",
                'dia_chi'               => "ĐN",
                'dia_chi_cong_tac'      => "Duy Tân",
                'email'                 => "123@gmail.com",
                'password'              => bcrypt(123123),
            ],
            [
                'ma_giang_vien'         => 002,
                'ten_giang_vien'        => "Hoong Soon Goon",
                'ngay_thang_nam_sinh'   => "1987-12-16",
                'dia_chi'               => "ĐN",
                'dia_chi_cong_tac'      => "Duy Tân",
                'email'                 => "124@gmail.com",
                'password'              => bcrypt(123123),
            ],
            [
                'ma_giang_vien'         => 003,
                'ten_giang_vien'        => "Nguyễn Thái Hoàng",
                'ngay_thang_nam_sinh'   => "1985-12-16",
                'dia_chi'               => "ĐN",
                'dia_chi_cong_tac'      => "Duy Tân",
                'email'                 => "125@gmail.com",
                'password'              => bcrypt(123123),
            ],
            [
                'ma_giang_vien'         => 004,
                'ten_giang_vien'        => "Lê Minh Thái",
                'ngay_thang_nam_sinh'   => "2023-12-16",
                'dia_chi'               => "ĐN",
                'dia_chi_cong_tac'      => "Duy Tân",
                'email'                 => "126@gmail.com",
                'password'              => bcrypt(123123),
            ],
        ]);
    }
}
