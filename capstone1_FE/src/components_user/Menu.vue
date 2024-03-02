<template lang="">
<div class="card mt-5">
    <div class="card-body">
        <nav class="navbar navbar-expand-lg navbar-primary bg-danger rounded">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent3">
                    
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-dark">
                        <router-link to="/sinh-vien-nhom-do-an">
                        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#"><i class="bx bx-home-alt me-1"></i>Trang Chủ</a>
                        </li>
                    </router-link>
                        
                        
                        <router-link to="sinh-vien-nhom-do-an">
                            <li class="nav-item"> <a class="nav-link" href="#"><i class=" fa-2x fa-regular fa-user"></i></i>Sinh viên</a></li>
                        </router-link>
                        
                        <router-link to="/giang-vien-nhom-do-an">
                            <li class="nav-item"> <a class="nav-link" href="#"><i class="bx bx-microphone me-1"></i>Giảng viên</a></li>
                        </router-link>
                        
                    </ul>
                    <form class="d-flex">
                        <router-link to="/dang-nhap">
                            <button class="btn btn-dark me-3 radius-30 px-4" type="submit"><i class="bx bx-lock"></i> Đăng Nhập</button>

                        </router-link>
                      
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style lang="">

</style>
