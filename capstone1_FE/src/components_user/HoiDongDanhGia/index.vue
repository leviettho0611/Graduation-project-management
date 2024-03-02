<template >
   <div class="row">
    <div class="card">
        <div class="card-header">
            <h5>Nhóm Đồ Án</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                    <thead>
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Nhóm</th>
                            <th>Tên Thành Viên</th>
                            <th>Tên Mentor</th>
                            <th>Đề Tài</th>
                            <th>Hội Đồng</th>
                            <th>Điểm Thành Viên</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <template v-for="(value, key) in list" :key="key" >
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
                                    <template v-if="value.tinh_trang == 1">
                                        <h6 class="text-primary">
                                            {{ value.ten_de_tai }}
                                        </h6>
                                    </template>
                                </td>
                                <td>{{ value.ten_hoi_dong }}</td>
                                <td>
                                    <ul>
                                        <template v-for="(v_1, k_1) in value.list" :key="k_1">
                                            <li>
                                                {{ v_1.diem_tong }}
                                            </li>
                                        </template>
                                    </ul>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleChoDiem" style="margin-right:10px;" v-on:click="Object.assign(cho_diem, value)">Cho Điểm</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <!-- Modal -->
            <div class="modal fade" id="exampleChoDiem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh Giá Cho Điểm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <template v-for="(value, key) in cho_diem.list" :key="key">
                                <label for="">{{ value.ten_sinh_vien }}</label>
                                <template v-if="cho_diem.vi_tri == 0">
                                    <input type="number" step="0.1" v-model="value.diem_chu_tich" class="form-control">
                                </template>
                                <template v-else-if="cho_diem.vi_tri == 1">
                                    <input type="number" step="0.1" v-model="value.diem_thu_ky" class="form-control">
                                </template>
                                <template v-else>
                                    <input type="number" step="0.1" v-model="value.diem_uy_vien" class="form-control">
                                </template>
                            </template>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" v-on:click="choDiem()" data-bs-dismiss="modal">Lưu</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</template>
<script>
import axios from 'axios';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
export default {
    data() {
        return {
            user_login : {},
            list : [],
            cho_diem : {},
        }
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
                .post('giang-vien/nhom-do-an/get-data',this.user_login)
                .then((res) => {
                    this.list = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        choDiem() {
            this.cho_diem.id_user = this.user_login.id;
            console.log(this.cho_diem);
            baseRequest
                .post('giang-vien/nhom-do-an/cho-diem',this.cho_diem)
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
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
<style lang="">
    
</style>