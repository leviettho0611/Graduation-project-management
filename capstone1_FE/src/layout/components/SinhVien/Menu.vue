<template lang="">
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				<li class="nav-item">
					<router-link to="/" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-house" style="color: #1d60d3;"></i>
						</div>
						<div class="menu-title">Trang Chủ</div>
					</router-link>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-user-ninja"></i>
						</div>
						<div class="menu-title">Quản lí</div>
					</a>
					<ul class="dropdown-menu">
						<li> 
							<router-link to="/ngan-hang-de-tai">
								<a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Đăng Kí Đề Tài</a>
							</router-link>
						</li>
						<li> 
							<router-link to="/sinh-vien-nhom-do-an">
								<a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Nhóm Đồ Án</a>
							</router-link>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</template>
<script>
export default {

}
</script>
<style lang="">
    
</style>