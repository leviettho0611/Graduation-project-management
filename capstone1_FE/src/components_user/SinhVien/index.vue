<template>
        <div class="card-body">
            <div class="card">
                <div style="background-color: aquamarine;" class="card-header ">
                    <div class="row">
                        <div class="col-12">
                            <h5 style="margin-top:15px;">Nhóm đồ án</h5>
                        </div>
                        <div class="col-3">
                            <div class="text-end">
                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center align-middle">
                                <th>#</th>
                                <th>Nhóm</th>
                                <th>Tên Thành Viên</th>
                                <th>Tên Mentor</th>
                                <th>Đề Tài</th>
                                <th>Hội Đồng</th>
                                <!-- <th>Nhật Kí</th>
                                <th>Tài Liệu</th> -->
                                <th>Điểm Đồ Án</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <template v-for="(value, key) in list_nhom_do_an" :key="key">
                                <tr>
                                    <th>
                                        {{ key + 1 }}
                                    </th>
                                    <td>{{ value.ten_nhom }}</td>
                                    <td>
                                        <ul>
                                            <template v-for="(v, k) in value.list" :key="k">
                                                <li class="text-start">
                                                    {{ v.ten_sinh_vien }}
                                                </li>
                                            </template>
                                        </ul>
                                    </td>
        
                                    <td>{{ value.ten_giang_vien }}</td>
                                    <td>
                                        <template v-if="value.tinh_trang_de_tai != null">
                                            <template v-if="value.tinh_trang_de_tai == 0">
                                                <span class="text-warning">
                                                    {{ value.ten_de_tai }}
                                                </span>
                                            </template>
                                            <template v-else-if="value.tinh_trang_de_tai == 1">
                                                <span class="text-primary">
                                                    {{ value.ten_de_tai }}
                                                </span>
                                            </template>
                                            <template v-else>
                                            <span class="text-danger">
                                                {{ value.ten_de_tai }}
                                            </span>
                                        </template>
                                        </template>
                                    </td>
                                    <td>{{ value.ten_hoi_dong }}</td>
                                    <td>
                                        <ul>
                                            <template v-for="(v, k) in value.list" :key="k">
                                                <li class="text-start">
                                                    {{ v.diem_tong }}
                                                </li>
                                            </template>
                                        </ul>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-comment-detail font-18 me-1"></i>
                                </div>
                                <div class="tab-title"> Nhật ký </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Tạo Nhật Ký</h5>
                                    </div>
                                    <div class="card-body">
                                        <label for="">Tên nhật ký</label>
                                        <input v-model="create.ten_nhat_ky" type="text" class="form-control" placeholder="Nhập tên nhật ký">
                                        <label for="">Thời gian meeting</label>
                                        <input v-model="create.thoi_gian" type="date" class="form-control" placeholder="Nhập thời gian">
                                        <label for="">Mô tả</label>
                                        <input v-model="create.mo_ta" type="text" class="form-control" placeholder="nhập mô tả">
                                        <label for="">Tình Trạng</label>
                                        <select v-model="create.tinh_trang" name="" id="" class="form-control">
                                            <option value="0">Chưa được tốt</option>
                                            <option value="1">Tạm</option>
                                            <option value="2">Tốt</option>
                                        </select>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" @:click="themMoi()">
                                            Tạo
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center align-middle text-center">
                                                    <th>#</th>
                                                    <th>Tên Nhóm</th>
                                                    <th>Tên Đề Tài</th>
                                                    <th>Tên Nhật Ký</th>
                                                    <th>Tên Casptone</th>
                                                    <th>Date</th>
                                                    <th>Mô tả</th>
                                                    <th>Tình Trạng</th>
                                                    <th>Tên File</th>
                                                    <th>File</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="(value, key) in list_nhat_ky" :key="key">
                                                    <tr>
                                                        <th class="text-center align-middle text-nowrap">{{ key + 1 }}</th>
                                                        <td class="align-middle text-nowrap">{{ value.ten_nhom }}</td>
                                                        <td class="align-middle text-nowrap">{{ value.ten_de_tai }}</td>
                                                        <td class="align-middle text-nowrap">{{ value.ten_nhat_ky }}</td>
                                                        <td class="align-middle text-nowrap">{{ value.ten_casptone }}</td>
                                                        <td class="align-middle text-center">{{ value.thoi_gian }}</td>
                                                        <td class="align-middle text-nowrap">{{ value.mo_ta }}</td>
                                                        <td class="align-middle text-center">
                                                            <template v-if="value.tinh_trang == 0">
                                                                Chưa Tốt
                                                            </template>
                                                            <template v-else-if="value.tinh_trang == 1">
                                                                Tạm
                                                            </template>
                                                            <template v-else>
                                                                Tốt
                                                            </template>
                                                        </td>
                                                        <td class="text-center align-middle text-nowrap">
                                                            {{ value.ten_file }}
                                                        </td>
                                                        <td class="text-center align-middle text-nowrap"><i class="fa-solid fa-file-arrow-down fa-2x text-primary" v-on:click="downloadFile(value.file)"></i></td>
                                                        <td class="text-center">
                                                            <!-- {{ value.id_sinh_vien }} - {{ user_login.id }} -->
                                                            <template v-if = "value.id_sinh_vien == user_login.id">
                                                                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#uploadModal" v-on:click="Object.assign(upload, value)">
                                                                    Upload
                                                                </button>
                                                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#xoaModal" v-on:click="Object.assign(delete_nk, value)">
                                                                    Xóa
                                                                </button>
                                                            </template>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Updload File</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="form-label">Tên file</label>
                                                            <input v-model="upload.ten_file" type="text" class='form-control'>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label">File</label>
                                                            <input class="form-control" type="file" @change="handleFileChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                                    <button type="button" class="btn btn-primary" v-on:click="uploadFile()" data-bs-dismiss="modal">Upload file</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Updload File</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa nhật ký này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" v-on:click="deleteNhatKy()">Xóa</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
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
import axios from 'axios';
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
export default {
    data() {
        return {
            create      : {'tinh_trang' : 1},
            user_login  : {},
            list_nhat_ky: [],
            list_nhom_do_an: [],
            file         : null,
            upload       : {},
            delete_nk    : {}
        };
    },
    mounted() {
        this.checkLogin();
    },
    methods : {
        handleFileChange(event) {
          this.file = event.target.files[0];
        },
        checkLogin() {
            baseRequest.post('check-login').then((res) => {
                if(res.status != 200) {
                    this.$router.push('/sinh-vien/login')
                }
                this.user_login = res.data.user;
                this.loadDataNhom();
            }).catch((res) =>  {
                this.$router.push('/sinh-vien/login')
                console.log(res);
            });
        },
        themMoi() {
            this.create.id_user = this.user_login.id;
            this.create.list = this.list_nhom_do_an;
            console.log(this.create);
            baseRequest
                .post('sinh-vien/nhat-ky/create', this.create)
                .then((res) => {
                    this.create = {'tinh_trang' : 1},
                    functionBasic.displaySuccess(res);
                    this.loadDataNhatKy();
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        async loadDataNhom() {
            var payload = {
                'id_user' : this.user_login.id
            };
            await baseRequest
                .post('sinh-vien/nhat-ky/get-data-nhom-do-an', payload)
                .then((res) => {
                    this.list_nhom_do_an = res.data.data;
                    this.loadDataNhatKy();
                    console.table(this.list_nhom_do_an);
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        async loadDataNhatKy() {
            var payload = {
                'id_user' : this.user_login.id,
                'list'    : this.list_nhom_do_an,
            };
            console.log(payload);
            await baseRequest
                .post('sinh-vien/nhat-ky/get-data', payload)
                .then((res) => {
                    this.list_nhat_ky = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        uploadFile() {
            const formData = new FormData();
            formData.append('id', this.upload.id);
            formData.append('file', this.file);
            formData.append('ten_file', this.upload.ten_file);
            console.log(formData);
            baseRequest.post('sinh-vien/nhat-ky/upload-file', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(res => {
                functionBasic.displaySuccess(res);
                this.file = null;
                this.loadDataNhatKy();
            })
            .catch(error => {
                console.error(error);
                alert('File upload failed.');
            });
        },
        downloadFile(filename) {
            const downloadUrl = `http://127.0.0.1:8000/api/sinh-vien/nhat-ky/download/${filename}`;

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
        deleteNhatKy() {
            baseRequest
                    .post('sinh-vien/nhat-ky/delete', this.delete_nk)
                    .then(res => {
                        functionBasic.displaySuccess(res);
                        this.loadDataNhatKy();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    }
}
</script>

<style lang="">

</style>
    
    