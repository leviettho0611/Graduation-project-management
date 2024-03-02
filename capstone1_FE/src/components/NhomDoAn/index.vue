<template lang="">
<div class="row">
    <div class="col">
        <h6 class="mb-0 text-uppercase">Nhóm Đồ Án</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Tạo Nhóm Đồ Án</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                </div>
                                <div class="tab-title" v-on:click="getNhom()">Danh Sách Nhóm Đồ Án</div>
                            </div>
                        </a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="primary-pills-home" role="tabpanel">
                        <div class="row">
                            <div class="col-8">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="fomr-lable">Niên Khóa</label>
                                        <select class="form-select" v-on:change="getCasptone(); id_casptone = 0" v-model="ma_nien_khoa">
                                            <option value="0" >Mời bạn chọn</option>
                                            <template v-for="(value, key) in list_nien_khoa" :key="key">
                                                <option :value="value.ma_nien_khoa">{{value.ten_nien_khoa}}</option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="fomr-lable">Capston</label>
                                        <select class="form-select" v-on:change="show = true; load()" v-model="id_casptone">
                                            <option value="0" selected>Mời bạn chọn</option>
                                            <template v-for="(value, key) in list_caspton" :key="key">
                                                <option :value="value.id">{{value.ten_casptone}}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <table class="table table-bordered" v-if="show == true">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tên Sinh Viên</th>
                                            <th v-on:click="sort()">
                                                Điểm GPA
                                                <i v-if="order_by == 2" class="text-primary fa-solid fa-arrow-up"></i>
                                                <i v-else-if="order_by == 1" class="text-danger fa-solid fa-arrow-down"></i>
                                                <i v-else class="text-success fa-solid fa-spinner fa-pulse"></i>
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <template v-for="(v, k) in list_sinh_vien">
                                                <tr>
                                                    <td>{{ v.ten_sinh_vien }}</td>
                                                    <td :style="{ backgroundColor: getMauTheoDiem(v.diem_gpa) }">
                                                        {{ v.diem_gpa }}
                                                    </td>
                                                    <td>
                                                        <button v-on:click="add(v)" class="btn btn-primary">
                                                            Add
                                                        </button>
                                                    </td>
                                                </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4 mt-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Tên Sinh Viên
                                                    </th>
                                                    <th>Điểm GPA</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="(v, k) in list_tmp_nhom">
                                                    <tr>
                                                        <td>{{ v.ten_sinh_vien }}</td>
                                                        <td>
                                                            {{ v.diem_gpa }}
                                                        </td>
                                                        <td>
                                                            <button v-on:click="xoa(v)" class="btn btn-danger">
                                                                Xóa
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="card-footer text-end">
                                        <template v-if="list_tmp_nhom.length > 0">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleTaoNhom">Tạo</button>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="primary-pills-profile" role="tabpanel">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>
                                        Tên Nhóm
                                    </th>
                                    <th>
                                        Mã Nhóm
                                    </th>
                                    <th>Thành Viên Nhóm</th>
                                    <th>Tên Giảng Viên HD</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <template v-for="(value, key) in list_tv_nhom" :key="key">
                                    <tr>
                                        <td class="align-middle text-nowrap">{{value.ten_nhom}}</td>
                                        <td class="align-middle text-nowrap">{{value.ma_nhom}}</td>
                                        <td class="align-middle text-nowrap">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <template v-for="(v_1, k_1) in value.list">
                                                        <ul>
                                                            <li class="text-start"> {{v_1.ten_sinh_vien}}</li>
                                                        </ul>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="align-middle text-nowrap">
                                            {{value.ten_giang_vien}}
                                        </td>
                                        <td class="align-middle text-nowrap">
                                            <template v-if="value.check == false">
                                                <!-- <button style="margin-right: 10px;" class="btn btn-secondary">Sửa</button> -->
                                                <button style="margin-right: 10px;" @click="edit_tv = Object.assign({},value); getDataSinhNhom(value);taoKey(key); ma_nhom  = value.ma_nhom" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#doiTVModal">Đổi Thành Viên</button>
                                                <button @:click="nhomdelete= Object.assign({},value)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleXoanhom">Xóa</button>
                                            </template>
                                            <template v-else>
                                                <span><h5  class="text-primary">Đã vào hội đồng</h5></span>
                                            </template>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="doiTVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi Thành Viên</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle text-nowrap">#</th>
                                                    <th class="text-center align-middle text-nowrap">Tên Sinh Vien</th>
                                                    <th class="text-center align-middle text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(value, key) in edit_tv?.list" :key="key">
                                                    <th class="text-center align-middle text-nowrap">{{ key + 1 }}</th>
                                                    <th class="align-middle text-nowrap">{{ value.ten_sinh_vien }}</th>
                                                    <th class="text-center align-middle text-nowrap">
                                                        <select :id="'id_sv_moi' + key" @change="changeSinhVienNhom(value, key)" class="form-control">
                                                            <option value="0">Mời bạn chọn</option>
                                                            <option v-for="(v_1, k_1) in list_sv_nhom" :key="v_1.id" :value="v_1.id">
                                                                {{ v_1.ten_sinh_vien }}
                                                            </option>
                                                        </select>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
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
<!-- Modal -->
<div class="modal fade" id="exampleXoanhom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Nhóm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn Có Chắc Muốn Xóa Nhóm <p class="text-danger">{{nhomdelete.ten_nhom}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button v-on:click="nhom_delete()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleTaoNhom" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tạo Nhóm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Tên nhóm</label>
                <input v-model="add_nhom.ten_nhom" type="text" class="form-control">
                <label for="">Mã nhóm</label>
                <input v-model="add_nhom.ma_nhom" type="text" class="form-control">
                <label for="">Tên giảng viên hướng dẫn</label>
                <select v-model="add_nhom.id_giang_vien" class="form-select">
                    <template v-for="(v, k) in list_giang_vien" :key="k">
                        <option v-bind:value="v.id">{{v.ten_giang_vien}}</option>
                    </template>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="taoNhom()">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
</template>

    
<script>
import Toaster from '@meforma/vue-toaster';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
import "https://code.jquery.com/jquery-3.3.1.slim.min.js";
import "https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js";
import "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js";

export default {
    data() {
        return {
            list_giang_vien: [],
            list_sinh_vien: [],
            list_tmp_nhom: [],
            id_sinh_moi: "",
            order_by: 0,
            add_nhom: {},
            list_tv_nhom: [],
            edit_tv: {},
            list_sv_nhom: [],
            key_arr: 0,
            nhomdelete: {},
            id_moi : 0,
            ma_nhom: 0,
            show : false,
            list_nien_khoa : [],
            list_caspton : [],
            ma_nien_khoa : 0,
            id_casptone  : 0
        }
    },
    mounted() {
        this.getNhom();
        this.getNienKhoa();
    },
    methods: {
        getCasptone() {
            baseRequest
                .get("admin/casptone/data")
                .then((res) => {
                    this.list_caspton = res.data.data;
                });
        },
        getNienKhoa() {
            baseRequest
                .get("admin/nien-khoa/data")
                .then((res) => {
                    this.list_nien_khoa = res.data.data;
                });
        },
        getTmpNhom() {
            var payload = {
                'id_casptone' : this.id_casptone,
                'ma_nien_khoa' : this.ma_nien_khoa
            }

            baseRequest
                .post("admin/tmp-nhom/data", payload)
                .then((res) => {
                    this.list_tmp_nhom = res.data.data;
                });
        },
        getNhom() {
            baseRequest
                .get("admin/nhom/data")
                .then((res) => {
                    this.list_tv_nhom = res.data.data;
                    this.edit_tv = this.list_tv_nhom[this.key_arr];
                });
        },
        load() {
            var payload = {
                'ma_nien_khoa' : this.ma_nien_khoa,
                'id_casptone'  : this.id_casptone,
            }

            baseRequest
                .post("admin/casptone/data-sinh-vien", payload)
                .then((res) => {
                    this.list_sinh_vien = res.data.data;
                    this.getTmpNhom();
                });
            baseRequest
                .get("admin/giang-vien/data")
                .then((res) => {
                    this.list_giang_vien = res.data.data;
                });
        },
        sort() {
            this.order_by = this.order_by + 1;
            if (this.order_by > 2) {
                this.order_by = 0;
            }
            // Quy ước : 1 tăng dần theo giá, 2 giảm dần theo giá, 0: tăng dần theo id
            if (this.order_by == 1) {
                this.list_sinh_vien = this.list_sinh_vien.sort(function (a, b) {
                    return a.diem_gpa - b.diem_gpa;
                })
            } else if (this.order_by == 2) {
                this.list_sinh_vien = this.list_sinh_vien.sort(function (a, b) {
                    return b.diem_gpa - a.diem_gpa;
                })
            } else {
                this.list_sinh_vien = this.list_sinh_vien.sort(function (a, b) {
                    return a.id - b.id;
                })
            }
        },
        getSortSinhVien() {
            var payload = {
                'ma_nien_khoa' : this.ma_nien_khoa,
                'id_casptone'  : this.id_casptone,
                'type'         : this.order_by,
            }

            baseRequest
                .post("admin/casptone/data-sort-sinh-vien", payload)
                .then((res) => {
                    this.list_sinh_vien = res.data.data;
                    this.getTmpNhom();
                });
        },
        add(v) {
            baseRequest
                .post("admin/tmp-nhom/create", v)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.getSortSinhVien();
                    this.getTmpNhom();
                    this.getNhom();
                });
        },
        xoa(v) {
            baseRequest
                .post("admin/tmp-nhom/delete", v)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.getSortSinhVien();
                        this.getTmpNhom();
                    }
                });
        },

        taoNhom() {
            this.add_nhom.list = this.list_tmp_nhom;
            this.add_nhom.id_casptone = this.id_casptone;
            baseRequest
                .post("admin/nhom/create", this.add_nhom)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.getTmpNhom();
                        this.load();
                        this.getNhom();
                        this.add_nhom = {};
                    }
                });
        },
        taoKey(k) {
            this.key_arr = k;
        },
        getDataSinhNhom(value) {
            console.log(value);
            baseRequest
                .post("admin/nhom/data-sinh-vien-nhom", value)
                .then((res) => {
                    this.list_sv_nhom = res.data.data;
                    // console.log(this.edit_tv);
                });
        },
        changeSinhVienNhom(value, key) {
            console.log(this.value);
            var id = "#id_sv_moi" + key; 
            var payload = {
                'id_sinh_vien_doi'  : value.id_diem,
                'id_nhom'           : value.id_nhom,
                'id_sinh_moi'       : $(id).val(),
                'ma_nhom'           : this.ma_nhom,
                'id_casptone'       : this.edit_tv.id_casptone,
            };
            console.log(payload);
            baseRequest
                .post("admin/nhom/thay-doi-sinh-vien", payload)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        $(id).val(0);
                        this.getNhom();
                        this.list_sv_nhom = res.data.data;
                        this.load();
                    } else {
                        this.$toast.error(res.data.message);
                        $(id).val(0);
                    }
                });
        },
        nhom_delete() {
            this.nhom_delete.id_casptone = this.id_casptone;
            console.log(this.nhomdelete);
            baseRequest
                .post("admin/nhom/delete", this.nhomdelete)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.load();
                        this.getNhom();
                    }
                });
        },
        getMauTheoDiem(diem) {
    if (2.5 <= diem && diem < 3.1) {
        return "hsl(60, 100%, 75%)"; // Màu yellow nhạt
    } else if (3.1 <= diem && diem < 3.6) {
        return "hsl(270, 100%, 75%)"; // Màu purple nhạt
    } else if (3.6 <= diem && diem <= 4) {
        return "hsl(120, 100%, 75%)"; // Màu green nhạt
    } else {
        return "hsl(0, 0%, 10%)"; // Màu đen hoặc một màu khác tùy bạn chọn
    }
},

    }
}
</script>

    
<style lang="">

</style>
