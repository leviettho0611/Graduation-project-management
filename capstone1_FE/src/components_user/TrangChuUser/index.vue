<template lang="">
<div class="container">
    <div class="row">
        <div class="alert alert-secondary border-0 bg-secondary alert-dismissible fade show py-2 col-md-12">
            <marquee behavior="" direction="">
                <h5>
                    "Chào Mừng Bạn Đến Với Phần Mềm Quản Lí Đồ Án Tốt Nghiệp"</h5>
            </marquee>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card blink">
                <div class="card-body">
                    <h5 class="card-title">Thông Báo</h5>
                    <p class="card-text shake-effect text-break">
                        <i class="fa-2x fa-solid fa-bell" style="color: #d2391e;"></i> Mới Nhất.
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <template v-for="(value, key) in list">
                        <li class="list-group-item text-danger" style="font-size: 20px;" v-if="value.tinh_trang == 1">
                            <b><span>{{ value.ten_ke_hoach }}</span> <span>đến hết ngày {{ value.ngay }}</span> <span>tài liệu mẫu, <i class="fa-solid fa-file-arrow-down fa-2x text-primary" v-on:click="downloadFile(value.file)"></i></span></b>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card  h-100 ">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.duytan.edu.vn/upload/images/1-11-2017-14-33-38-8.jpg" alt="..." class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul>
                                    <h5>Đại Học Duy Tân</h5>
                                    <li><i class="fa fa-map-marker"></i><span>Địa chỉ:</span> 254 Nguyễn Văn Linh, Quận Thanh Khê - Tp. Đà Nẵng</li>
                                    <li><i class="fa fa-phone"></i><span>Điện thoại:</span> (+84) 236.3650403 - (+84) 236.3827111</li>

                                    <li><i class="fa fa-fax"></i><span>Fax:</span> (+84).236.3.650443</li>
                                    <li><i class="fa fa-globe"></i><span>Website:</span> <a href="http://duytan.edu.vn" target="_blank">http://duytan.edu.vn</a></li>
                                    <li><i class="fa fa-graduation-cap"></i><span>Tuyển sinh:</span> <a href="http://tuyensinh.duytan.edu.vn" target="_blank">http://tuyensinh.duytan.edu.vn</a></li>
                                    <li><i class="fa fa-exclamation-circle"></i><span>Thông tin Tuyển sinh:</span> <a href="http://nhungdieucanbiet.edu.vn" target="_blank">http://nhungdieucanbiet.edu.vn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  h-100 ">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.duytan.edu.vn/upload/images/13-11-2017-16-42-6-53.jpg" alt="..." class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul>

                                    <h5>Văn Phòng Đại Học Duy Tân</h5>
                                    <li><i class="fa fa-globe"></i><span>Website:</span> <a href="http://duytan.edu.vn" target="_blank">http://duytan.edu.vn</a></li>
                                    <li><i class="fa fa-graduation-cap"></i><span>Tuyển sinh:</span> <a href="http://tuyensinh.duytan.edu.vn" target="_blank">http://tuyensinh.duytan.edu.vn</a></li>
                                    <li><i class="fa fa-exclamation-circle"></i><span>Thông tin Tuyển sinh:</span> <a href="http://nhungdieucanbiet.edu.vn" target="_blank">http://nhungdieucanbiet.edu.vn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  h-100 ">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.duytan.edu.vn/upload/images/1-11-2017-14-33-38-8.jpg" alt="..." class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul>
                                    <h5>Phòng Đào Tạo</h5>
                                    <li><i class="fa fa-map-marker"></i><span>Địa chỉ:</span> 209 Phan Thanh, Quận Thanh Khê - Tp. Đà Nẵng</li>
                                    <li><i class="fa fa-phone"></i><span>Điện thoại:</span> 0236.2.243.775</li>

                                    <li><i class="fa fa-globe"></i><span>Website:</span> <a href="http://pdaotao.duytan.edu.vn" target="_blank">http://pdaotao.duytan.edu.vn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cdn.duytan.edu.vn/upload/images/1-11-2017-14-32-14-36.jpg" alt="..." class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul>
                                    <h5>Phòng Công Tác Sinh Viên</h5>
                                    <li><i class="fa fa-map-marker"></i><span>Địa chỉ:</span> 209 Phan Thanh, Quận Thanh Khê - Tp. Đà Nẵng</li>
                                    <li><i class="fa fa-phone"></i><span>Điện thoại:</span> 0236.3.656.109</li>

                                    <li><i class="fa fa-globe"></i><span>Website:</span> <a href="http://hssv.duytan.edu.vn" target="_blank">http://hssv.duytan.edu.vn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Toaster from '@meforma/vue-toaster';
import axios from 'axios';
import functionBasic from '../../core/functionBasic';
import baseRequest from '../../core/baseRequest';
export default {
    data() {
        return {
            list: [],
            isBlinking: false,
        };
    },
    mounted() {
        
        this.loadData()
    },
    methods: {
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/ke-hoach-tot-nghiep/data')
                .then((res) => {
                    this.list = res.data.data;
                });
        },
        downloadFile(filename) {
            const downloadUrl = `http://127.0.0.1:8000/api/admin/ke-hoach-tot-nghiep/download/${filename}`;

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
    },
};
</script>

<style>


@keyframes shake {
    0% {
        transform: translateX(0);
    }

    25% {
        transform: translateX(-5px);
    }

    50% {
        transform: translateX(5px);
    }

    75% {
        transform: translateX(-5px);
    }

    100% {
        transform: translateX(0);
    }
}

.shake-effect {
    animation: shake 0.5s infinite;
    /* 0.5s là thời gian của mỗi chu kỳ rung, infinite để chạy vô hạn */
}
</style>
