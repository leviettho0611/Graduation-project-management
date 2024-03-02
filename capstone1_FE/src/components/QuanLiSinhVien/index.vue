<template lang="">
<div class="row ">
    <div class="col-4">
        <h4 class="text-danger">Quản Lý Sinh Viên</h4>
    </div>
</div>
<div class="row">
    <div class="col-4">

    </div>
    <div class="col-8 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleThemMoi">Thêm Mới</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleThemMoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleThemMoi">Thêm Mới Sinh Viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <label for="">Tên Sinh Viên</label>
                            <input v-model="sinh_vien_add.ten_sinh_vien" type="text" class="form-control">
                            <label for="">Mã Sinh Viên</label>
                            <input v-model="sinh_vien_add.ma_sinh_vien" type="text" class="form-control">
                            <label for="">Khóa</label>
                            <select v-model="sinh_vien_add.id_nien_khoa" class="form-select">
                                <template v-for="(v, k) in list_nien_khoa" :key="k">
                                    <option v-bind:value="v.id">{{v.ten_nien_khoa}}</option>
                                </template>
                            </select>
                            <label for="">Số Điện Thoại</label>
                            <input v-model="sinh_vien_add.so_dien_thoai" type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="form-control" required>
                            <label for="">Điểm GPA</label>
                            <input v-model="sinh_vien_add.diem_gpa" type="float" class="form-control">
                            <label for="">Password</label>
                            <input v-model="sinh_vien_add.password" type="float" class="form-control">
                            <label for="">Email</label>
                            <input v-model="sinh_vien_add.gmail" type="float" class="form-control">
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
                    Danh Sách Sinh Viên
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <div class="input-group mb-3">

                            <input v-on:keyup.enter="timKiem()" v-model="search.ten_sinh_vien" type="text" class="form-control" placeholder="nhập tên sinh viên cần tìm" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button v-on:click="timKiem()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm</button>
                        </div>
                        <button class="btn btn-outline-danger" id="deleteAllSelectedRecord" data-bs-toggle="modal" data-bs-target="#exampleXoa">
                            <i class="fa-solid fa-trash-can"></i>Xoá
                        </button>

                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left:5px;">Import excel</button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Thao Tác</th>
                            <th>#</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Khoá</th>

                            <th v-on:click="sort()">
                                Điểm GPA
                                <i v-if="order_by == 2" class="text-primary fa-solid fa-arrow-up"></i>
                                <i v-else-if="order_by == 1" class="text-danger fa-solid fa-arrow-down"></i>
                                <i v-else class="text-success fa-solid fa-spinner fa-pulse"></i>
                            </th>
                            <th>
                                <input v-on:click="handleSelectAll()" type="checkbox" name="" id="select_all_ids">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <template v-for="(v,k) in list_sinh_vien" :key="k">
                            <tr>
                                <td>
                                    <button style="margin-right:10px;" @click="sinh_vien_update = Object.assign({},v)" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleCapNhat">Cập Nhật</button>
                                    <button @click="sinh_vien_update = Object.assign({},v)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleChiTiet">Chi Tiết</button>
                                </td>
                                <td>{{k+1}}</td>
                                <td>{{v.ma_sinh_vien}}</td>
                                <td class=" text-uppercase">{{v.ten_sinh_vien}}</td>
                                <td>
                                    {{ getTenNienKhoa(v.id_nien_khoa) }}
                                </td>
                                <td :style="{ backgroundColor: getMauTheoDiem(v.diem_gpa) }">
                                    {{ v.diem_gpa }}
                                </td>
                                <td> <input v-model="v.check" type="checkbox" name="ids" class="checkbox_ids"></td>
                            </tr>
                        </template>

                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="exampleXoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Sinh Viên</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">Bạn có chắc muốn xóa </p>{{ sinh_vien_delete.ten_sinh_vien }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="xoa()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleCapNhat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">

                                    <div class="card-body">

                                        <label for="">Tên Sinh Viên</label>
                                        <input v-model="sinh_vien_update.ten_sinh_vien" type="text" class="form-control">
                                        <label for="">Mã Sinh Viên</label>
                                        <input v-model="sinh_vien_update.ma_sinh_vien" type="text" class="form-control">
                                        <label for="">Khóa</label>
                                        <select v-model="sinh_vien_update.id_nien_khoa" class="form-select">
                                            <template v-for="(v, k) in list_nien_khoa">
                                                <option v-bind:value="v.id">{{v.ten_nien_khoa}}</option>
                                            </template>
                                        </select>
                                        <label for="Số Điện Thoại"></label>
                                        <input v-model="sinh_vien_update.so_dien_thoai" type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="form-control" required>

                                        <label for="">Điểm GPA</label>
                                        <input v-model="sinh_vien_update.diem_gpa" type="float" class="form-control">

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
                <div class="modal fade" id="exampleChiTiet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleCHiTiet">Chi Tiết</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th v-bind:value="sinh_vien_update.ma_sinh_vien">Mã sinh viên</th>
                                            <th v-bind:value="sinh_vien_update.ten_sinh_vien">Tên sinh viên</th>
                                            <th v-bind:value="sinh_vien_update.so_dien_thoai">Số Điện Thoại</th>
                                            <th v-bind:value="sinh_vien_update.diem_gpa">Điểm GPA</th>
                                            <th v-bind:value="sinh_vien_update.nhom_do_an">Nhóm Đồ Án</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ sinh_vien_update.ma_sinh_vien }} </td>
                                            <td>{{ sinh_vien_update.ten_sinh_vien }}</td>
                                            <td>{{ sinh_vien_update.so_dien_thoai }}</td>
                                            <td>{{ sinh_vien_update.diem_gpa }}</td>
                                            <td>null</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Excel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form @submit.prevent="submitForm">
                    <input type="file" @change="onFileChange" accept=".xls, .xlsx" />
                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Tải lên</button>
                </form>
            </div>

        </div>
    </div>
</div>
</template>

<script>
import Toaster from '@meforma/vue-toaster';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
import axios from 'axios';

export default {
    data() {
        return {
            list_sinh_vien: [],
            list_nien_khoa: [],
            sinh_vien_add: {
                'tinh_trang': 0,
            },
            sinh_vien_update: {},
            list_sinh_vien_detail: [],
            sinh_vien_delete: {},
            search: {},
            dem: 0,
            order_by: 0,
            excelFile: null,
        }
    },
    mounted() {
        this.load()
        this.handleSelectAll()
    },
    methods: {
        them_moi() {
            baseRequest
                .post("admin/sinh-vien/create", this.sinh_vien_add)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                    this.sinh_vien_add = {
                        'tinh_trang': 0
                    };
                })
                .catch((error) => {
                    functionBasic.displayErrors(error)
                });
        },
        getTenNienKhoa(idNienKhoa) {
            const nienKhoa = this.list_nien_khoa.find((nk) => nk.id === idNienKhoa);
            return nienKhoa ? nienKhoa.ten_nien_khoa : "";
        },

        load() {
            baseRequest
                .get("admin/sinh-vien/data")
                .then((res) => {
                    this.list_sinh_vien = res.data.data;
                });
            // baseRequest
            //     .get("sinh-vien/data/{id}")
            //     .then((res) => {
            //         this.list_sinh_vien_detail = res.data.data;
            //     });
            baseRequest
                .get("admin/nien-khoa/data")
                .then((res) => {
                    this.list_nien_khoa = res.data.data;
                });

        },
        capNhat() {

            baseRequest
                .post("admin/sinh-vien/update", this.sinh_vien_update)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                })
                .catch((error) => {
                    functionBasic.displayErrors(error)
                });
        },
        xoa() {
            baseRequest
                .post("admin/sinh-vien/delete", this.list_sinh_vien)
                .then((res) => {
                    if (res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.load();
                        $('.checkbox_ids').prop('checked', false);
                    }
                })
                .catch((error) => {
                    functionBasic.displayErrors(error)
                });
        },

        handleSelectAll(e) {
            $("#select_all_ids").click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));

            });
            if (this.dem % 2 == 0) {
                this.list_sinh_vien.forEach((value, key) => {
                    value.check = false;
                });
            } else {
                this.list_sinh_vien.forEach((value, key) => {
                    value.check = true;
                });
            }
            this.dem++;
        },
        timKiem() {
            baseRequest
                .post('admin/sinh-vien/search', this.search)
                .then((res) => {
                    this.list_sinh_vien = res.data.data;
                })
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

        async submitForm() {
            try {
                if (!this.excelFile) {
                    console.error('Không tìm thấy file');
                    // Handle the case when no file is selected
                    return;
                }

                const formData = new FormData();
                formData.append('excel_file', this.excelFile);

                const response = await axios.post('http://127.0.0.1:8000/api/admin/sinh-vien/import', formData)
                .then(res => {
                    this.$toast.success(res.data.message)
                    this.load()
                });

                this.load()
                console.log(response.data);
                // Handle success, e.g., show a success message
            } catch (error) {
                console.error(error.response.data);
                // Handle error, e.g., show an error message
            }
        },
        onFileChange(event) {
            this.excelFile = event.target.files[0];
        },
    },

}
</script>

<style></style>
