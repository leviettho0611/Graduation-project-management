<template>
    <body class="bg-login  pace-done">
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99"
                style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <h3>Đăng Nhập Admin</h3>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">

                                        <div class="form-body">
                                            <form class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputtext" class="form-label">Email</label>
                                                    <input type="text" class="form-control" v-model="email" id="inputtext"
                                                        placeholder="Nhập vào email...">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Mật Khẩu</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0"
                                                            v-model="password" id="inputChoosePassword"
                                                            placeholder="Nhập vào mật khẩu...">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                               
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="button" v-on:click="login" class="btn btn-primary"><i
                                                                class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>


    </body>
</template>
     
<script>
import Toaster from '@meforma/vue-toaster';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
import axios from 'axios';
import { createToaster } from '@meforma/vue-toaster'
const toastr =  createToaster({
    position: 'top-right'
})
export default {

    data() {
        return {
            email: '',
            password: '',

        }
    },

    methods: {
        login() {
            const payload = {
                'email': this.email,
                'password': this.password
            };
            baseRequest
                .post("login", payload)
                .then((res) => {
                    if (res.data.status == 1) {
                        toastr.success(res.data.message);
						localStorage.setItem('token-admin', res.data.token);
						this.$router.push('/admin')
					} else {
						toastr.error(res.data.message);
					}

                });
        },
        checkLogin() {
            baseRequest.post('check-login').then((res) => {
                if (res.status == 200) {
                    this.$router.push('/admin/login')
                } else {
                }
            });
        }
    },
}
</script>
     
<style ></style>