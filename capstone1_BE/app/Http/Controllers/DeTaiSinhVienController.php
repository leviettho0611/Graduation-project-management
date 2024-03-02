<?php

namespace App\Http\Controllers;

use App\Models\DeTaiSinhVien;
use App\Models\Nhom;
use App\Models\SinhVien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeTaiSinhVienController extends Controller
{
    public function idNhom($arr) {
        foreach ($arr as $key => $value) {
            if($value->is_done == null) {
                return $value->id_nhom;
            }
        }
        return null;
    }

    public function createData(Request $request)
    {
        $sinh_vien = SinhVien::join('diems', 'diems.id_sinh_vien', 'sinh_viens.id')
                            ->join('nhoms', 'nhoms.id', 'diems.id_nhom')
                            ->leftJoin('de_tai_sinh_viens', 'de_tai_sinh_viens.id_nhom', 'nhoms.id')
                            ->where("sinh_viens.id", $request->id_user)
                            ->select('diems.id_nhom', 'diems.id_casptone', 'diems.is_hoan_thanh', 'de_tai_sinh_viens.is_done')
                            ->get();
        $id_nhom = $this->idNhom($sinh_vien);
        foreach ($sinh_vien as $value) {
            if ($value['is_hoan_thanh'] == 0) {
                $check_de_tai_nhom = Nhom::join('de_tai_sinh_viens', 'de_tai_sinh_viens.id_nhom', 'nhoms.id')
                                        ->where('nhoms.id', $value['id_nhom'])
                                        ->get();

                if ($check_de_tai_nhom->isEmpty()) {
                    return $this->createDeTaiForNhom($request, $value['id_nhom'], $value['id_casptone']);
                }

                if($value['is_done'] == 1) {
                    return $this->createDeTaiForNhom($request, $id_nhom, $value['id_casptone']);
                }

                foreach ($check_de_tai_nhom as $v) {
                    if ($v['tinh_trang'] == 1 && $v['is_done'] == 0) {
                        $nhom = Nhom::where('id', $value['id_nhom'])->first();
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Đề tài của nhóm ' . $nhom->ten_nhom . " đã được duyệt!"
                        ]);
                    }
                }

                return $this->createDeTaiForNhom($request, $value['id_nhom'], $value['id_casptone']);
            }
        }

        return response()->json([
            'status'    => 0,
            'message'   => 'Không có đề tài mới được tạo.'
        ]);
    }

    private function createDeTaiForNhom($request, $id_nhom, $id_casptone)
    {
        $newTopicName = $request->ten_de_tai;

        // Check if the new topic overlaps with existing topics by more than 80%
        $existingTopics = DeTaiSinhVien::pluck('ten_de_tai')->toArray();
        foreach ($existingTopics as $existingTopic) {
            similar_text($newTopicName, $existingTopic, $percentage);

            if ($percentage > 80) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Đề tài đã trùng với một đề tài đã có trong hệ thống.',
                ]);
            }
        }

        DeTaiSinhVien::create([
            'id_nhom'               => $id_nhom,
            'ten_de_tai'            => $newTopicName,
            'mo_ta'                 => $request->mo_ta,
            'ngon_ngu_lap_trinh'    => $request->ngon_ngu_lap_trinh,
            'id_casptone'           => $id_casptone,
        ]);

        $nhom = Nhom::where('id', $id_nhom)->first();
        return response()->json([
            'status'  => 1,
            'message' => 'Đã thêm mới đề tài nhóm ' . $nhom->ten_nhom,
        ]);
    }


    public function getData()
    {
        $data = DeTaiSinhVien::join('casptones', 'casptones.id', 'de_tai_sinh_viens.id_casptone')
            ->select("de_tai_sinh_viens.*", "casptones.ten_casptone")
            ->get();
        foreach ($data as $key => $value) {
            $nhom = Nhom::where('id', $value['id_nhom'])
                ->first();
            $value['ten_nhom'] = $nhom->ten_nhom;
        }

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function xoaDeTai(Request $request)
    {

        $de_tai = DeTaiSinhVien::where('id', $request->id)->first();
        if ($de_tai) {
            $de_tai->tinh_trang = 2;
            $de_tai->save();
        }
    }

    public function trangthai(Request $request)
    {

        $de_tai = DeTaiSinhVien::where('id', $request->id)->first();

        $now = Carbon::today();

        if ($de_tai) {
            if ($request->thoi_gian_ket_thuc != null) {
                if ($now->greaterThan(Carbon::parse($request->thoi_gian_ket_thuc))) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Không được duyệt đề tài!',
                    ]);
                } else {
                    $de_tai->tinh_trang         = !$de_tai->tinh_trang;
                    $de_tai->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
                    $de_tai->save();
                    DeTaiSinhVien::where('id_nhom', $request->id_nhom)
                        ->where('id', '<>', $de_tai->id)
                        ->update(['tinh_trang' => 2]);

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã duyệt đề tài thành công!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Chưa nhập thời gian kết thúc!',
                ]);
            }
        }
    }

    public function huyDeTai(Request $request)
    {

        $de_tai = DeTaiSinhVien::where('id', $request->id)->first();
        if ($de_tai) {
            $de_tai->tinh_trang = !$de_tai->tinh_trang;
            $de_tai->thoi_gian_ket_thuc = null;
            $de_tai->save();
        }
    }
    public function editDeTai(Request $request)
    {
        $data = $request->all();
        $nhom = Nhom::join('de_tai_sinh_viens', 'de_tai_sinh_viens.id_nhom', 'nhoms.id')
                    ->join('diems', 'diems.id_nhom', 'nhoms.id')
                    ->where('diems.id_sinh_vien', $request->id_user)
                    ->where('de_tai_sinh_viens.tinh_trang', 1)
                    ->where('is_done', 0)
                    ->select('nhoms.id')
                    ->first(); //mã nhóm

        if($request->id_nhom == $nhom->id) {
            $now = Carbon::today();
            $de_tai = DeTaiSinhVien::where('id', $request->id)->first();
            if ($de_tai && $now->lessThan($de_tai->thoi_gian_ket_thuc)) {
                $de_tai->ten_de_tai = $request->ten_de_tai;
                $de_tai->save();
                return response()->json([
                    'status' => 1,
                    'message' => 'Đã đổi đề tài thành công!',
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Không thể cập nhật đề tài này do hết hạn hoặc không tìm thấy đề tài.',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Đề tài này không thuộc về nhóm bạn!',
            ]);
        }
    }
    public function capNhatTime(Request $request)
    {
        $de_tai = DeTaiSinhVien::where('id', $request->id)->first();

        $now = Carbon::today();

        if($de_tai){
            if($request->thoi_gian_ket_thuc != null) {
                if ($now->greaterThan(Carbon::parse($request->thoi_gian_ket_thuc))) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Không được duyệt đề tài!',
                    ]);
                } else {
                    $de_tai->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
                    $de_tai->save();
                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã duyệt đề tài thành công!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Chưa nhập thời gian kết thúc!',
                ]);
            }
        }
    }
}
