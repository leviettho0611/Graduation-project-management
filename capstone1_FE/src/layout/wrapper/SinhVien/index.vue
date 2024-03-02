<template>
    <div class="wrapper">
        <div class="header-wrapper">
            <HeaderHome></HeaderHome>
            <MenuVue></MenuVue>
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                <router-view></router-view>
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top">
            <i class='bx bxs-up-arrow-alt'></i>
        </a>
        <FooterHome></FooterHome>
    </div>
</template>
<script>
import FooterHome from "../../components/SinhVien/Footer.vue";
import HeaderHome from "../../components/SinhVien/Header.vue";
import MenuVue from '../../components/SinhVien/Menu.vue';
import "../../../assets_client/rocker/js/pace.min.js";
import "../../../assets_client/rocker/js/bootstrap.bundle.min.js";
import "../../../assets_client/rocker/js/jquery.min.js";
import "../../../assets_client/rocker/plugins/simplebar/js/simplebar.min.js";
import "../../../assets_client/rocker/plugins/metismenu/js/metisMenu.min.js";
import "../../../assets_client/rocker/js/index.js";
import "../../../assets_client/rocker/js/app.js";
import baseRequest from "../../../core/baseRequest";
export default {
    name        :   'app',
    data() {
        return{
            checklogin : null,
        }
    },
    components  :   {
        FooterHome,
        HeaderHome,
        MenuVue
    },
    mounted() {
        // baseRequest.post('check-login').then((res) => {
        //     if(res.status != 200) {
        //         this.$router.push('/')
        //         this.checklogin = true;
        //     }
        // }).catch((res) =>  {
        //     this.$router.push('/sinh-vien/login')
        // });
    },  
}
</script>
<style>
@import "../../../assets_client/rocker/plugins/vectormap/jquery-jvectormap-2.0.2.css";
@import "../../../assets_client/rocker/plugins/simplebar/css/simplebar.css";
@import "../../../assets_client/rocker/plugins/perfect-scrollbar/css/perfect-scrollbar.css";
@import "../../../assets_client/rocker/plugins/metismenu/css/metisMenu.min.css";
@import "../../../assets_client/rocker/css/pace.min.css";
@import "../../../assets_client/rocker/css/bootstrap.min.css";
@import "../../../assets_client/rocker/css/bootstrap-extended.css";
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
@import "../../../assets_client/rocker/css/app.css";
@import "../../../assets_client/rocker/css/icons.css";
@import "../../../assets_client/rocker/css/dark-theme.css";
@import "../../../assets_client/rocker/css/semi-dark.css";
@import "../../../assets_client/rocker/css/header-colors.css";
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");    
</style>