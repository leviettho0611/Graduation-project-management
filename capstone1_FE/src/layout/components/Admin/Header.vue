<template>
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="topbar-logo-header">
                <div class="">
                    <img src="https://cdn.duytan.edu.vn/upload/images/logoDT-70.png" class="logo-icon" alt="logo icon" />
                </div>
                <div class="">
                    <h4 class="logo-text text-danger">Đại Học Duy Tân</h4>
                </div>
            </div>
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>
            
            <div class="top-menu ms-auto">
               
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" v-bind:class="{ 'show': isDropdownOpen }" href="#" role="button" data-bs-toggle="dropdown" @click.prevent="toggleDropdown" :aria-expanded="isDropdownOpen ? 'true' : 'false'"><img src="../../../assets//images/avatars/avatar-2.png" class="user-img" alt="user avatar" />
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">Admin</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" v-bind:class="{ 'show': isDropdownOpen }" data-bs-popper="static">
                    <li>
                        <a class="dropdown-item" href="javascript:;" v-on:click="logout()"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
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
            isDropdownOpen: false
        };
    },
    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        logout() {
            baseRequest
                .post('admin/logout')
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    if (res.data.status == 1) {
                        this.checkLogin = false;
                        localStorage.removeItem('token-admin');
                        sessionStorage.removeItem('user');
                        this.$router.push('/admin/login');
                    }
                })
                .catch((err) => {
                    functionBasic.displayErrors(err);
                });
        },
    }
};
</script>

<style lang=""></style>
