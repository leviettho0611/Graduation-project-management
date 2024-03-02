<template lang="">
<div class="row">
    <div class="">
        <h1>Quản Lí Giảng Viên</h1>
    </div>
    <div class="row mt-2">
        <div class="col-10 ">

        </div>
        <div class="col-2 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleThemMoi">Thêm Mới</button>

        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleThemMoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleThemMoi">Thêm Mới Giảng Viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">
                            <div class="card-body">
                                <label for="">Mã Giảng Viên</label>
                                <input v-model="giang_vien_add.ma_giang_vien" type="text" class="form-control" placeholder="Nhập tên giảng viên">
                                <label for="">Tên Giảng Viên</label>
                                <input v-model="giang_vien_add.ten_giang_vien" type="text" class="form-control" placeholder="Nhập tên giảng viên">
                                <label for="">Ngày Tháng Năm Sinh</label>
                                <input v-model="giang_vien_add.ngay_thang_nam_sinh" type="date" class="form-control" placeholder="Nhập ngày tháng năm sinh">
                                <label for="">Địa Chỉ</label>
                                <input v-model="giang_vien_add.dia_chi" type="text" class="form-control" placeholder="Nhập địa chỉ">
                                <label for="">Đơn Vị Đang Công Tác</label>
                                <input v-model="giang_vien_add.dia_chi_cong_tac" type="text" class="form-control" placeholder="Nhập đơn vị đang công tác">
                                <label for="">Email</label>
                                <input v-model="giang_vien_add.email" type="email" class="form-control" placeholder="Nhập email">
                                <label for="">Password</label>
                                <input v-model="giang_vien_add.password" type="text" class="form-control" placeholder="Nhập password">
                                
                            </div>

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
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h5>Danh Sách Giảng Viên</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-outline-danger" id="deleteAllSelectedRecord" data-bs-toggle="modal" data-bs-target="#exampleXoa">
                            <i class="fa-solid fa-trash-can"></i>Xoá
                        </button>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <input v-on:keyup.enter="timKiem()" v-model="search.ten_giang_vien" type="text" class="form-control" placeholder="Nhập Tên Giảng Viên Cần Tìm" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button  v-on:click="timKiem()"  class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm Kiếm</button>
                        </div>
                    </div>

                </div>
                <table class="table table-bordered mt-2">
                    <thead class="text-center">
                        <tr class="text-center">
                            <th>
                                <input v-on:click="handleSelectAll()"  type="checkbox" name="" id="select_all_ids">
                            </th>
                            <th>Action</th>
                            <th>#</th>
                            <th>Mã Giảng viên</th>
                            <th>Tên Giảng viên</th>
                            <th>Năm Sinh</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Đơn Vị Công Tác</th>

                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <template v-for="(v,k) in list_giang_vien">
                            <tr>
                                <td> <input v-model="v.check" type="checkbox" name="ids" class="checkbox_ids"></td>
                                <td>
                                    <button style="margin-right:10px;" @click="giang_vien_update = Object.assign({},v)" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleCapNhat">Cập Nhật</button>
                                    
                                </td>
                                <td>{{k+1}}</td>
                                <td>{{v.ma_giang_vien}}</td>

                                <td>{{v.ten_giang_vien}}</td>
                                <td class="uppercase">{{v.ngay_thang_nam_sinh}}</td>

                                <td>
                                     {{v.dia_chi}}   
                                </td>
                                <td>
                                    {{v.email}}
                                </td>
                                <td>
                                    {{v.dia_chi_cong_tac}}
                                </td>

                            </tr>
                        </template>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleCapNhat" tabindex="-1" aria-labelledby="exampleCapNhat" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
                            <div class="card-body">
                                <label for="">Mã Giảng Viên</label>
                                <input v-model="giang_vien_update.ma_giang_vien" type="text" class="form-control" placeholder="Nhập mã giảng viên">
                                <label for="">Tên Giảng Viên</label>
                                <input v-model="giang_vien_update.ten_giang_vien" type="text" class="form-control" placeholder="Nhập tên giảng viên">
                                <label for="">Ngày Tháng Năm Sinh</label>
                                <input v-model="giang_vien_update.ngay_thang_nam_sinh" type="date" class="form-control" placeholder="Nhập ngày tháng năm sinh">
                                <label for="">Địa Chỉ</label>
                                <input v-model="giang_vien_update.dia_chi" type="text" class="form-control" placeholder="Nhập địa chỉ">
                                <label for="">Địa Chỉ</label>
                                <input v-model="giang_vien_update.email" type="text" class="form-control" placeholder="Nhập email">
                                <label for="">Đơn Vị Đang Công Tác</label>
                                <input v-model="giang_vien_update.dia_chi_cong_tac" type="text" class="form-control" placeholder="Nhập đơn vị đang công tác">
                                
                            </div>

                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button v-on:click="capNhat()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleXoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Giảng Viên</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">Bạn có chắc muốn xóa </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="xoa()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
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
    data(){
        return{
            list_giang_vien: [],
            giang_vien_add: {},
            giang_vien_update: {},
            giang_vien_delete:{},
            dem: 0,
            search: {},
        }
    },
    mounted() {
        this.load()
    },
    methods: {
        them_moi(){
            baseRequest
                .post("admin/giang-vien/create", this.giang_vien_add)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                })
                .catch(err => {
                    functionBasic.displayErrors(err)
                });
        },
        load(){
            baseRequest
                .get("admin/giang-vien/data")
                .then((res)=>{
                    this.list_giang_vien =res.data.data;
                });
        },
        capNhat(){
            baseRequest
                .post("admin/giang-vien/update", this.giang_vien_update)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        },
        xoa() {
            baseRequest
                .post("admin/giang-vien/delete", this.list_giang_vien)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.load();
                        $('.checkbox_ids').prop('checked', false);
                    }
                });
        },
        handleSelectAll(e) {
            $("#select_all_ids").click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));

            });
            if (this.dem % 2 == 0) {
                this.list_giang_vien.forEach((value, key) => {
                    value.check = false;
                });
            } else {
                this.list_giang_vien.forEach((value, key) => {
                    value.check = true;
                });
            }
            this.dem++;
        },
        timKiem() {
            baseRequest
                .post('admin/giang-vien/search', this.search)
                .then((res) => {
                    this.list_giang_vien = res.data.data;
                })
        },
    },
}
</script>

<style lang="">

</style>
