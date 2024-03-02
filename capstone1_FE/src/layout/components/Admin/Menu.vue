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
				<!-- <li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
						<div class="parent-icon">
							<i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
					</ul>
				</li> -->
				<li class="nav-item">
					<router-link to="/admin" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-house" style="color:  #0b4ec1;"></i>
						</div>
						<div class="menu-title">Trang Chủ</div>
					</router-link>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-list-check" style="color:  #0b4ec1;"></i>
						</div>
						<div class="menu-title">Quản lí</div>
					</a>
					<ul class="dropdown-menu">
						
						<li> 
							<router-link to="/admin/quan-li-nk">
								<a class="dropdown-item"><i class="bx bx-right-arrow-alt"></i>Niên Khóa</a>
							</router-link>
						</li>
						<li> 
							<router-link to="/admin/quan-li-sv">
								<a class="dropdown-item"><i class="bx bx-right-arrow-alt"></i>Sinh Viên</a>
							</router-link>
						</li>
						<li> 
							<router-link to="/admin/quan-li-gv">
								<a class="dropdown-item"><i class="bx bx-right-arrow-alt"></i>Giảng Viên</a>
							</router-link>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<router-link to="/admin/nhom-do-an" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-people-roof" style="color:  #0b4ec1;"></i>
						</div>
						<div class="menu-title">Nhóm Đồ Án</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/tien-do" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-bars-progress" style="color: #0b4ec1;"></i>
						</div>
						<div class="menu-title">Tiến Độ</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/quan-li-hoi-dong" class="nav-link">
							<div class="parent-icon">
								<i class="fa-solid fa-graduation-cap" style="color:  #0b4ec1;"></i>
							</div>
							<div class="menu-title">Hội Đồng</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/ngan-hang-de-tai-admin" class="nav-link">
							<div class="parent-icon">
								<i class="fa-solid fa-building-columns" style="color: #0b4ec1;"></i>
							</div>
							<div class="menu-title">Ngân Hàng Để Tài</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/ke-hoach-tot-nghiep" class="nav-link">
							<div class="parent-icon">
								<i class="fa-solid fa-map-location" style="color: #0b4ec1;"></i>
							</div>
							<div class="menu-title">Kế Hoạch</div>
					</router-link>
				</li>
				<!-- <li class="nav-item">
					<router-link to="/admin/phan-quyen" class="nav-link">
						<div class="parent-icon">
							<i class="fa-solid fa-user-lock" style="color: #0b4ec1;"></i>
						</div>
						<div class="menu-title">Phân Quyền</div>
					</router-link>
				</li> -->
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