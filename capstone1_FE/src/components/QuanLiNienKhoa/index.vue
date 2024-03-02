<template lang="">
<div class="row ">
    <div class="col-4">
        <h4 class="text-danger">Quản Lý Niên Khóa</h4>
    </div>
</div>
<div class="row ">
    <div class="col-4">

    </div>
    <div class="col-8 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleThemMoi">Thêm Mới</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleThemMoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            Thêm Mới Niên Khóa
                        </div>
                        <div class="card-body">
                            <label for="">Mã Khóa</label>
                            <input v-model="nien_khoa_add.ma_nien_khoa" type="text" class="form-control">
                            <label for="">Tên Khóa</label>
                            <input v-model="nien_khoa_add.ten_nien_khoa" type="text" class="form-control">
                            <label for="">Thời Gian Bắt Đầu</label>
                            <input v-model="nien_khoa_add.thoi_gian_bat_dau" type="text" class="form-control">
                            <label for="">Thời Gian Kết Thúc</label>
                            <input v-model="nien_khoa_add.thoi_gian_ket_thuc" type="text" class="form-control">
                            <label for="">Tình Trạng</label>
                            <select v-model="nien_khoa_add.tinh_trang" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button @click="them_moi()" type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="text-danger">
                    Danh Sách Niên Khóa
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-2">
                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleWarningModal">
                            <i class="fa-solid fa-trash-can"></i>Xoá
                        </button>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input v-on:keyup.enter="timKiem()" v-model="search.ten_nien_khoa" type="text" class="form-control" placeholder="nhập tên cần niên khóa" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button v-on:click="timKiem()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm</button>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="exampleWarningModal" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content bg-warning">
                            <div class="modal-header border-dark">
                                <h5 class="modal-title text-dark">Xóa Khóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <p>Bạn Có Chắc Muốn Xóa {{nien_khoa_delete.ten_nien_khoa}}</p>
                            </div>
                            <div class="modal-footer border-dark">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="xoa()" type="button" class="btn btn-dark"  data-bs-dismiss="modal">Xác Nhận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th>
                                <input v-on:click="handleSelectAll()" type="checkbox" name="" id="select_all_ids">

                            </th>
                            <th>Action</th>
                            <th>Mã Khóa</th>
                            <th>Tên Khóa</th>
                            <th>Niên Khóa</th>
                            <th>Tình Trạng</th>

                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <template v-for="(v,k) in list_nien_khoa">
                            <tr>
                                <td>
                                    <input  @:click="nien_khoa_delete = Object.assign({},v), chon_delete()" type="checkbox"  class="checkbox_ids" id="" v-bind:value="v.id">

                                </td>
                                <td>
                                    <button @:click="nien_khoa_update = Object.assign({},v)" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleSua">Sửa</button>
                                </td>
                                <td> {{v.ma_nien_khoa}}</td>
                                <td> {{v.ten_nien_khoa}}</td>
                                <td>{{v.thoi_gian_bat_dau}}-{{v.thoi_gian_ket_thuc}}</td>
                                <td>
                                    <button v-if="v.tinh_trang==1" class="btn btn-success" style="margin-right: 10px;">Hoạt Động</button>
                                    <button v-else class="btn btn-secondary">Tạm tắt </button>
                                </td>
                            </tr>

                        </template>
                    </tbody>
                </table>

                <div class="modal fade" id="exampleSua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleSua">Cập Nhật</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="">Mã Khóa</label>
                                <input v-model="nien_khoa_update.ma_nien_khoa" type="text" class="form-control">
                                <label for="">Tên Khóa</label>
                                <input v-model="nien_khoa_update.ten_nien_khoa" type="text" class="form-control">
                                <label for="">Thời Gian Bắt Đầu</label>
                                <input v-model="nien_khoa_update.thoi_gian_bat_dau" type="text" class="form-control">
                                <label for="">Thời Gian Kết Thúc</label>
                                <input v-model="nien_khoa_update.thoi_gian_ket_thuc" type="text" class="form-control">
                                <label for="">Tình Trạng</label>
                                <select v-model="nien_khoa_update.tinh_trang" name="" id="" class="form-control">
                                    <option value="1" class="form-control">Hiển thị</option>
                                    <option value="0">Tạm tắt</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="capNhat()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập Nhật</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row text-end">
    <div class="col-6">

    </div>
    <div class="col-4">

    </div>
    <div class="col-2 ">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
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
            list_nien_khoa: [],
            nien_khoa_add: {

            },
            nien_khoa_update: {
            },
            nien_khoa_delete: {
            },
            search          :   {},
            list_delete     :  [],
        }
    },
    mounted() {
        this.load();
        this.handleSelectAll()
    },
    methods: {
        them_moi() {
            baseRequest
                .post("admin/nien-khoa/create", this.nien_khoa_add)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();

                });
        },

        load() {
            baseRequest
                .get("admin/nien-khoa/data")
                .then((res) => {
                    this.list_nien_khoa = res.data.data;
                });
                this.handleSelectAll();
        },
        capNhat() {

            baseRequest
                .post("admin/nien-khoa/update", this.nien_khoa_update)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        },

       
        
        handleSelectAll(e) {
            $("#select_all_ids").click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });
            
        },
        xoa() {
            baseRequest
                .post("admin/nien-khoa/delete", this.nien_khoa_delete)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.load();
                        $('.checkbox_ids').prop('checked', false);
                    }
                });
        },
        timKiem() {
            baseRequest
                .post('admin/nien-khoa/search', this.search)
                .then((res) => {
                    this.list_nien_khoa = res.data.data;
                })
        },
    },

}
</script>

<style lang="">

</style>
