<template lang="">
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand-xl w-100">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-dark">
                    <router-link to="/trang-chu-gv">
                        <li class="nav-item"> <a class="nav-link" href="#"><i class="fa-solid fa-house" style="margin-right: 10px;"></i>Trang chủ</a></li>
                    </router-link>
                    <router-link to="/giang-vien-nhom-do-an">
                        <li class="nav-item"> <a class="nav-link" href="#"><i class="fa-solid fa-layer-group"  style="margin-right: 10px;" ></i>Giảng viên</a></li>
                    </router-link>
                    <router-link to="/hoi-dong-danh-gia">
                        <li class="nav-item"> <a class="nav-link" href="#"><i class="fa-solid fa-user"  style="margin-right: 10px;" ></i>Hội Đồng Đánh Giá</a></li>
                    </router-link>

                </ul>
                <template v-if="checklogin == false">
                    <router-link to="/dang-nhap">
                        <button class="btn btn-dark me-3 radius-30 px-4" type="submit"><i class="bx bx-lock"></i> Đăng Nhập</button>
                    </router-link>
                </template>
                <template v-else>
                    <a class="btn btn-dark me-3 radius-30 px-4" type="submit"  v-on:click="logout()"><i class="bx bx-lock"></i> Đăng Xuất</a>
                </template>
            </nav>
        </div>
    </header>
 </template>
 <script>
import baseRequest from '../../../core/baseRequest';
import functionBasic from '../../../core/functionBasic';
export default {
    data() {
        return {
            checklogin : false,
        }
    },
    mounted() {
        this.checkLogin();
    },  
    methods: {
        logout() {
            baseRequest
                .post('giang-vien/logout')
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    if(res.data.status == 1) {
                        this.checkLogin = false;
                        localStorage.removeItem('token-giang-vien');
                        sessionStorage.removeItem('user');
                        this.$router.push('/dang-nhap');
                    }
                })
                .catch((err) => {
                    functionBasic.displayErrors(err);
                });
        },
        checkLogin() {
            let token = window.localStorage.getItem('token-giang-vien');
            if (token != null) {
                this.checklogin = true
            } else {
                this.checklogin = false
            }
        }
    }
}
 </script>
 <style lang="">
     
 </style>