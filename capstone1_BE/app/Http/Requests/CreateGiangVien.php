<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGiangVien extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "ma_giang_vien" => "required|unique:giang_viens,ma_giang_vien",
        ];
    }
    public function messages()
    {
        return [
            'ma_giang_vien.unique'        => "Mã giảng viên đã tồn tại!",

        ];
    }
}
