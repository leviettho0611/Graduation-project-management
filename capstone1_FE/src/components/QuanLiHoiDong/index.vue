<template>
<div class="row">
    <div class="col-10"></div>
    <div class="col-2 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleThemMoi">Thêm Mới</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleThemMoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Hội Đồng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <label for="">Tên Hội Đồng</label>
                    <input v-model="hoi_dong_add.ten_hoi_dong" type="text" class="form-control" placeholder="nhập tên hội đồng">
                    <label for="">Tên Chủ Tịch</label>
                    <select v-model="hoi_dong_add.ten_chu_tich" name="" id="" class="form-control">
                        <template v-for="(v ,k) in list_giang_vien" :key="k">
                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                       
                    </template>
                    </select>
                    <label for="">Tên Thư Ký</label>
                    <select v-model="hoi_dong_add.ten_thu_ky" name="" id="" class="form-control">
                        <template v-for="(v ,k) in list_giang_vien" :key="k">
                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                       
                    </template>
                    </select>
                    <label for="">Tên Người Phản Biện</label>
                    <select v-model="hoi_dong_add.ten_uy_vien" name="" id="" class="form-control">
                        <template v-for="(v,k) in list_giang_vien" :key="k">
                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                       
                    </template>
                    </select>
                    <label for="">Thời Gian</label>
                    <input v-model="hoi_dong_add.thoi_gian" type="date" name="ngaygio" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button v-on:click="them()" type="button" class="btn btn-primary"  data-bs-dismiss="modal">Thêm</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-comment-detail font-18 me-1"></i>
                            </div>
                            <div class="tab-title"> Danh Sách Hội Đồng </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-bookmark-alt font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Danh Sách Hội Đồng Khi Phân Công</div>
                        </div>
                    </a>
                </li>

            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-danger">Danh Sách Hội Đồng</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên hội đồng</th>
                                                <th>Chủ tịch</th>
                                                <th>Thư ký</th>
                                                <th>Phản Biện</th>
                                                <th>Ngày Giờ</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(v,k) in list_hoi_dong" :key="k">
                                                <tr>
                                                    <td>{{k+1}}</td>
                                                    <td>{{v.ten_hoi_dong}}</td>
                                                    <td>{{v.ten_chu_tich}}</td>
                                                    <td>{{v.ten_thu_ky}}</td>
                                                    <td>{{v.ten_uy_vien}}</td>
                                                    <td>{{v.thoi_gian}}</td>
                                                    <td class="text-between">
                                                        <button style="margin-right: 10px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" v-on:click="id_hoi_dong = v.id">Phân Công</button>
                                                        <button style="margin-right: 10px;" class="btn btn-info " @:click="edit_hoi_dong = v" data-bs-toggle="modal" data-bs-target="#editModal" >Sửa</button>
                                                        <button class="btn btn-danger" @:click="xoa_hoi_dong = v" data-bs-toggle="modal" data-bs-target="#xoaModal" >Xóa</button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chia Hội Đồng Vào Nhóm</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <template v-for="(value, key) in list_nhom" :key="key">
                                                                <div class="form-check" v-if="value.check1 == false">
                                                                    <input v-model="value.check" class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">{{ value.ten_nhom }}</label>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary" @:click="chiaNhom()" data-bs-dismiss="modal">Chia Vào Nhóm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Hội Đồng</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chăc chắn muốn xóa hội đồng <span class="text-danger">{{xoa_hoi_dong.ten_hoi_dong}}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary" @:click="xoaHoiDong()" data-bs-dismiss="modal">Xóa Hội Đồng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Hội Đồng</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="">Tên Hội Đồng</label>
                                                    <input v-model="edit_hoi_dong.ten_hoi_dong" type="text" class="form-control" placeholder="nhập tên hội đồng">
                                                    <label for="">Tên Chủ Tịch</label>
                                                    <select v-model="edit_hoi_dong.id_chu_tich" name="" id="" class="form-control">
                                                        <template v-for="(v ,k) in list_giang_vien" :key="k">
                                                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                                                    
                                                    </template>
                                                    </select>
                                                    <label for="">Tên Thư Ký</label>
                                                    <select v-model="edit_hoi_dong.id_thu_ky" name="" id="" class="form-control">
                                                        <template v-for="(v ,k) in list_giang_vien" :key="k">
                                                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                                                    
                                                    </template>
                                                    </select>
                                                    <label for="">Tên Người Phản Biện</label>
                                                    <select v-model="edit_hoi_dong.id_uy_vien" name="" id="" class="form-control">
                                                        <template v-for="(v,k) in list_giang_vien" :key="k">
                                                        <option v-bind:value="v.id">{{ v.ten_giang_vien }}</option>
                                                    
                                                    </template>
                                                    </select>
                                                    <label for="">Thời Gian</label>
                                                    <input v-model="edit_hoi_dong.thoi_gian" type="date" name="ngaygio" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary" @:click="capNhat()" data-bs-dismiss="modal">Cập Nhật Hội Đồng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-danger">Danh Sách Hội Đồng</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên hội đồng</th>
                                                    <th>Chủ tịch</th>
                                                    <th>Thư ký</th>
                                                    <th>Phản Biện</th>
                                                    <th>Ngày Giờ</th>
                                                    <th>Nhóm phản biện</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="(value, key) in list" :key="key">
                                                    <tr>
                                                        <th class="align-middle">{{key + 1}}</th>
                                                        <td class="align-middle">{{value.ten_hoi_dong}}</td>
                                                        <td class="align-middle">{{value.ten_chu_tich}}</td>
                                                        <td class="align-middle">{{value.ten_thu_ky}}</td>
                                                        <td class="align-middle">{{value.ten_uy_vien}}</td>
                                                        <td class="align-middle">{{value.thoi_gian}}</td>
                                                        <td class="align-middle">
                                                            <b>Tên Nhóm: <span class="text-danger text-center">{{value.ten_nhom}}</span></b>
                                                            <ul>
                                                                <template v-for="(v_1, k1) in value.list_ma_nhom" :key="k1">
                                                                    <li class="text-start">
                                                                        {{v_1.ten_sinh_vien}}
                                                                    </li>
                                                                </template>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <button style="margin-right: 10px;" class="btn btn-info" v-on:click="getCasptone(value.ma_nhom);id_hoi_dong = value.id; xoa_hoi_dong = value" data-bs-toggle="modal" data-bs-target="#staticSua">Sửa</button>
                                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticXoa" @:click="xoa_nhom = value">Xóa</button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticSua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticSua">Cập Nhật</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <template v-for="(value, key) in list_nhom_doi" :key="key">
                                                                    <div class="form-check" v-if="value.ma_nhom !== xoa_hoi_dong.ten_nhom">
                                                                        <input v-model="value.check" class="form-check-input" type="checkbox">
                                                                        <label class="form-check-label">{{ value.ten_nhom }}</label>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-primary" @:click="doiNhom()">Lưu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- -------------- -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticXoa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticXoa">Xóa</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn Chắc Chắn Xóa Nhóm <b><span class="text-danger">{{xoa_nhom.ten_nhom}}</span></b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-primary" @:click="xoaNhom()">Xác Nhận</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Toaster from '@meforma/vue-toaster';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
export default {
    data() {
        return {
            list_giang_vien: [],
            list_nien_khoa: [],
            list_hoi_dong: [],
            hoi_dong_add: {},
            list_nhom   : [],
            list        : [],
            xoa_nhom    : {},
            id_hoi_dong : 0,
            edit_hoi_dong : {},
            xoa_hoi_dong : {},
            edit_nhom   : {},
            list_nhom_doi : [],
            id_casptone_nhom : 0
        }
    },
    mounted() {
        this.loadgv();
        this.load();
        this.loadNhom();
        this.loadDanhSach();
    },
    methods: {
        loadDanhSach()
        {
            baseRequest
                .get("admin/hoi-dong/data-danh-sach-nhom")
                .then((res) => {
                    this.list = res.data.data;
                });

        },
        load()
        {
            baseRequest
                .get("admin/hoi-dong/data")
                .then((res) => {
                    this.list_hoi_dong = res.data.data;
                });

        },
        loadgv() {
            baseRequest
                .get("admin/giang-vien/data")
                .then((res) => {
                    this.list_giang_vien = res.data.data;
                });
        },
        them(){
            console.log(this.hoi_dong_add);
            baseRequest
                .post("admin/hoi-dong/create", this.hoi_dong_add)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.hoi_dong_add = {},
                    this.load();
                });
        },
        loadNhom() {
            baseRequest
                .get("admin/hoi-dong/data-nhom")
                .then((res) => {
                    this.list_nhom = res.data.data;
                });
        },
        chiaNhom() {
            var payload = {
                'id'        : this.id_hoi_dong,
                'list_nhom' : this.list_nhom,
            };

            baseRequest
                .post("admin/hoi-dong/chia-nhom", payload)
                .then((res) => {
                    console.log(res);
                    functionBasic.displaySuccess(res);
                    this.load();
                    this.loadDanhSach();
                    $('#exampleModal').modal('hidde');
                });

        },
        xoaNhom() {
            baseRequest
                .post("admin/hoi-dong/delete-nhom", this.xoa_nhom)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                });
        },
        capNhat() {
            baseRequest
                .post("admin/hoi-dong/update-hoi-dong", this.edit_hoi_dong)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        },
        xoaHoiDong() {
            baseRequest
                .post("admin/hoi-dong/xoa-hoi-dong", this.xoa_hoi_dong)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        },
        doiNhom() {
            var payload = {
                'id'            : this.xoa_hoi_dong.id,
                'list_nhom'     : this.list_nhom_doi,
                'id_hoi_dong'   : this.xoa_hoi_dong.id_hoi_dong,
            };
            baseRequest
                .post("admin/hoi-dong/update-nhom", payload)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.loadDanhSach();
                });
        },
        getCasptone(value) {
            var payload = {
                'ma_nhom' : value
            }

            baseRequest
                .post("admin/hoi-dong/get-casptone-nhom", payload)
                .then((res) => {
                    this.id_casptone_nhom = res.data.data
                    this.getNhom();
                });
        },
        getNhom() {
            var payload = {
                "id_casptone" : this.id_casptone_nhom
            }
            baseRequest
                .post("admin/hoi-dong/get-nhom-chua-vao", payload)
                .then((res) => {
                    this.list_nhom_doi = res.data.data
                });
        }
    },

}
</script>

<style lang="">

</style>
