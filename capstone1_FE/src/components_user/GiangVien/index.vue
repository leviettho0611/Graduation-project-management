<template>
<div class="container-fluid " style="margin-top:-30px;">

    <div class="card-body">
        <div class="card">
            <div style="background-color: aquamarine;" class="card-header ">
                <div class="row">
                    <div class="col-9">
                        <h5 style="margin-top:10px;">Nhóm đồ án</h5>
                    </div>
                    <!-- <div class="col-3">
                        <div class="text-end">

                            <router-link to="/ngan-hang-de-tai">

                                <button class="btn btn-outline-dark mt-1"> Đăng ký đề tài</button>

                            </router-link>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="card-body ">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Nhóm</th>
                            <th>Tên Thành Viên</th>
                            <th>Tên Mentor</th>
                            <th>Đề Tài</th>
                            <th>Hội Đồng</th>
                            <!-- <th>Nhật Kí</th>
                                <th>Tài Liệu</th> -->
                            <th>Điểm mentor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <template v-for="(value, key) in list" :key="key">
                            <tr>
                                <th>
                                    {{ key + 1 }}
                                </th>
                                <td>{{ value.ten_nhom }}</td>
                                <td>
                                    <ul>
                                        <template v-for="(v_1, k_1) in value.list" :key="k_1">
                                            <li>
                                                {{ v_1.ten_sinh_vien }}
                                            </li>
                                        </template>
                                    </ul>
                                </td>
    
                                <td>{{ value.ten_giang_vien }}</td>
                                <td>
                                    <template v-if="value.tinh_trang != null">
                                        <template v-if="value.tinh_trang == 0">
                                            <span class="text-warning">
                                                {{ value.ten_de_tai }}
                                            </span>
                                        </template>
                                        <template v-else-if="value.tinh_trang == 1">
                                            <span class="text-primary">
                                                {{ value.ten_de_tai }}
                                            </span>
                                        </template>
                                        <template v-else>
                                            <span class="text-danger">
                                                {{ value.ten_de_tai }}
                                            </span>
                                        </template>
                                    </template>
                                </td>
                                <td>{{ value.ten_hoi_dong }}</td>
                                <!-- <td>
                                        <i class="fa-solid fa-book fa-2xl" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #5020d5;"></i>
                                    </td>
                                    <td>
                                        <a href="">link</a>
                                    </td> -->
                                <td>
                                    <ul>
                                        <template v-for="(v_1, k_1) in value.list" :key="k_1">
                                            <li>
                                                {{ v_1.diem_mentor }}
                                            </li>
                                        </template>
                                    </ul>
                                </td>
                                <td>
                                    <template v-if="value.tinh_trang != null">
                                        <template v-if="value.tinh_trang != 2">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalChoDiem" style="margin-right:10px;" v-on:click="Object.assign(cho_diem, value)">Cho Điểm</button>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleChiTiet" v-on:click="Object.assign(cho_diem, value); loadChiTietNhom()">Chi Tiết</button>
                                        </template>
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </tbody>

                </table>
                <!-- Modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleChiTiet" tabindex="-1" aria-labelledby="exampleChiTiet" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Chi Tiết</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class="bx bx-comment-detail font-18 me-1"></i>
                                                        </div>
                                                        <div class="tab-title"> Nhật ký </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="card">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="text-center align-middle text-center">
                                                                        <th>#</th>
                                                                        <th>Tên nhật ký</th>
                                                                        <th>Date</th>
                                                                        <th>Mô tả</th>
                                                                        <th>Tên file</th>
                                                                        <th>File tài liệu</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <template v-for="(value, key) in list_chi_tiet" :key="key">
                                                                        <tr>
                                                                            <th class="text-center align-middle text-nowrap">{{ key + 1 }}</th>
                                                                            <td class="align-middle text-nowrap">{{ value.ten_nhat_ky }}</td>
                                                                            <td class="align-middle text-center">{{ value.thoi_gian }}</td>
                                                                            <td class="align-middle text-nowrap">{{ value.mo_ta }}</td>
                                                                            <td class="text-center align-middle text-nowrap">
                                                                                {{ value.ten_file }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-nowrap"><i class="fa-solid fa-file-arrow-down fa-2x text-primary" v-on:click="downloadFile1(value.file)"></i></td>
                                                                        </tr>
                                                                    </template>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalChoDiem" tabindex="-1" aria-labelledby="exampleModalChoDiem" aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalChoDiem">Cho điểm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <template v-for="(value, key) in cho_diem.list" :key="key">

                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="">{{ value.ten_sinh_vien }}</label>
                                        </div>
                                        <div class="col-4">
                                            <input v-model="value.diem_mentor" type="number" step="0.1" style="width:100%;">
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="choDiem()">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal fade" id="exampleModalSua" tabindex="-1" aria-labelledby="exampleModalSua" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalSua">Sửa điểm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="">Lương Trọng Linh</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="float" style="width:100%;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="">Lương Trọng Linh</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="float" style="width:100%;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="">Lương Trọng Linh</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="float" style="width:100%;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="">Lương Trọng Linh</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="float" style="width:100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios'
import baseRequest from '../../core/baseRequest'
import functionBasic from '../../core/functionBasic'
export default {
    data() {
        return {
            user_login  : {},
            list        : [],
            cho_diem    : {},
            list_chi_tiet : [],
        };
    },
    mounted() {
        this.checkLogin();
    },
    methods : {
        checkLogin() {
            axios
                .post('check-login',{}, {
                    headers: {
                        'Authorization': `Bearer ${window.localStorage.getItem('token-giang-vien')}`
                    }
                })
                .then((res) => {
                    if(res.status != 200) {
                        this.$router.push('/dang-nhap')
                    }
                    this.user_login = res.data.user;
                    this.getNhomDoAn();
                })
                .catch((error) => {
                    console.log(error);
                });

        },
        getNhomDoAn() {
            baseRequest
                .post('giang-vien/do-an/get-data-nhom-do-an', this.user_login)
                .then((res) => {
                    this.list = res.data.data;
                });
        },
        choDiem() {
            baseRequest
                .post('giang-vien/do-an/update-diem-mentor', this.cho_diem)
                .then((res) => {
                    if(res.data.status == 1) {
                        functionBasic.displaySuccess(res);
                        this.getNhomDoAn();
                    } else {
                        let vm = this;
                        $.each(res.data.errors, function(k, v) {
                            vm.$toast.error(v);
                        });
                    }
                });
        },
        loadChiTietNhom() {
            baseRequest
                .post('admin/tien-do/chi-tiet-data', this.cho_diem)
                .then((res) => {
                    this.list_chi_tiet = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        downloadFile1(filename) {
            const downloadUrl = `http://127.0.0.1:8000/api/sinh-vien/nhat-ky/download/${filename}`;

            axios
                .get(downloadUrl, { responseType: 'blob' })
                .then(res => {
                    const url = window.URL.createObjectURL(new Blob([res.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', filename);
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error(error);
                    this.$toast.error('File chưa được upload!');
                });
        },
        downloadFile(filename) {
            const downloadUrl = `http://127.0.0.1:8000/api/giang-vien/do-an/download/${filename}`;

            axios
                .get(downloadUrl, { responseType: 'blob' })
                .then(res => {
                    const url = window.URL.createObjectURL(new Blob([res.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', filename);
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error(error);
                    alert('Download failed.');
                });
        },
    }
}
</script>

<style lang="">

</style>
