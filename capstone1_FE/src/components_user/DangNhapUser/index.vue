<template>
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<!-- <img src="../../assets/images/logo-img.png" width="180" alt="" /> -->
							<h3>
								Đăng Nhập Giảng Viên
							</h3>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="form-body">
										<form class="row g-3" v-on:submit.prevent="login()">
											<div class="col-12">
												<label for="inputFirstName" class="form-label">Email</label>
												<input type="text" class="form-control" v-model="user.email"
													placeholder="Nhập vào email của bạn">
											</div>
											<div class="col-12">
												<label for="inputLastName" class="form-label">Mật Khẩu</label>
												<input type="password" class="form-control" v-model="user.password"
													placeholder="Nhập mật khẩu">
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Đăng Nhập</button>
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
	</template>
	
	<script>
	import "../../assets_client/rocker/js/pace.min.js";
	import "../../assets_client/rocker/js/bootstrap.bundle.min.js";
	import "../../assets_client/rocker/js/jquery.min.js";
	import "../../assets_client/rocker/plugins/simplebar/js/simplebar.min.js";
	import "../../assets_client/rocker/plugins/metismenu/js/metisMenu.min.js";
	import "../../assets_client/rocker/js/index.js";
	import "../../assets_client/rocker/js/app.js";
	import baseRequest from '../../core/baseRequest';
	import functionBasic from "../../core/functionBasic";
	import { createToaster } from '@meforma/vue-toaster'
	const toastr =  createToaster({
		position: 'top-right'
	})
	export default {
		name        :   'app',
		data() {
			return {
				user: {},
			}
		},
		mounted() {
			
		},
		methods: {
			login() {
				baseRequest
					.post('giang-vien/login', this.user)
					.then((res) => {
						functionBasic.displaySuccess(res);
						if(res.data.status) {
							localStorage.setItem('token-giang-vien', res.data.token);
							this.$router.push('/trang-chu-gv');
						} else {
							toastr.error(res.data.message);
							this.$router.push('/dang-nhap')
						}
					})
					.catch((err) => {
						functionBasic.displayErrors(err);
					});
				
			},
		},
	}
	</script>
	<style>
	@import "../../assets_client/rocker/plugins/vectormap/jquery-jvectormap-2.0.2.css";
	@import "../../assets_client/rocker/plugins/simplebar/css/simplebar.css";
	@import "../../assets_client/rocker/plugins/perfect-scrollbar/css/perfect-scrollbar.css";
	@import "../../assets_client/rocker/plugins/metismenu/css/metisMenu.min.css";
	@import "../../assets_client/rocker/css/pace.min.css";
	@import "../../assets_client/rocker/css/bootstrap.min.css";
	@import "../../assets_client/rocker/css/bootstrap-extended.css";
	@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
	@import "../../assets_client/rocker/css/app.css";
	@import "../../assets_client/rocker/css/icons.css";
	@import "../../assets_client/rocker/css/dark-theme.css";
	@import "../../assets_client/rocker/css/semi-dark.css";
	@import "../../assets_client/rocker/css/header-colors.css";
	@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");    
	</style>