<template lang="">
<div class="row">
    <div class="col-10"></div>
    <div class="col-2 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Đăng Kí Đề Tài
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Đề Tài</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <label for="">Tên Đề Tài</label>
                    <input v-model="de_tai_add.ten_de_tai" type="text" class="form-control" placeholder="Nhập tên đề tài">
                    <label for="">Mô Tả</label>
                    <textarea v-model="de_tai_add.mo_ta" name="" id="" cols="30" rows="2" class="form-control" placeholder="nhập mô tả đề tài">
                    </textarea>
                    <label for="">Ngôn Ngữ Lập Trình</label>
                    <textarea v-model="de_tai_add.ngon_ngu_lap_trinh" name="" id="" cols="30" rows="2" class="form-control" placeholder="ghi rõ ngôn ngữ lập trình...">
                    </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button v-on:click="them_moi()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Đề Tài Đăng Kí</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Ngân Hàng Đề Tài</div>
                            </div>
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="primary-pills-home" role="tabpanel">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center align-middle text-center">
                                                <th>#</th>
                                                <th>Tên Đề Tài</th>
                                                <th>Tên Casptone</th>
                                                <th>Nhóm</th>
                                                <th>Mô tả</th>
                                                <th>Trang thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(v, k) in list_de_tai" :key="k">
                                                <tr class="align-middle">
                                                    <th class="text-center">{{ k+1 }}</th>
                                                    <td>{{ v.ten_de_tai }}</td>
                                                    <td class="text-center">{{ v.ten_casptone }}</td>
                                                    <td>{{ v.ten_nhom }}</td>
                                                    <td class="text-center">
                                                        <button v-on:click="mo_ta = v.mo_ta" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleMota">
                                                            <i class="fa-solid fa-i"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <template v-if="v.tinh_trang == 1">
                                                            <button class="btn btn-success" style="margin-right: 10px;">Đã Duyệt</button>
                                                            <button v-on:click="Object.assign(edit, v)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleDoDeTai">
                                                                Cập Nhật
                                                            </button>
                                                        </template>
                                                        <template v-else-if="v.tinh_trang == 0" >
                                                            <button class="btn btn-warning" style="margin-right: 10px;">Đang Chờ Duyệt</button>
                                                        </template>
                                                        <template v-else >
                                                            <button class="btn btn-danger">Đã Từ Chối</button>
                                                        </template>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h5 class="p-2 w-100 mt-1 text-primary">Ngân hàng đề tài</h5>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center align-middle text-center">
                                                    <th>Tên Đề Tài</th>
                                                    <th>Mô tả</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="(v,k) in list_de_tai">
                                                    <template v-if="v.tinh_trang==1">
                                                        <tr class="align-middle">
                                                            <td>{{ v.ten_de_tai }}</td>
                                                            <td>
                                                                <button v-on:click="mo_ta = v.mo_ta" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleMota">
                                                                    <i class="fa-solid fa-i"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleMota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mô tả</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{mo_ta}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleDoDeTai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mô tả</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="" class="form-label">Tên Đề Tài</label>
                            <input type="text" class="form-control" v-model="edit.ten_de_tai">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button v-on:click="Edit()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập Nhật</button>
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
import baseRequest from '../../core/baseRequest';
import functionBasic from '../../core/functionBasic';
export default {
    data() {
        return {

            list_de_tai: [],
            de_tai_add: {
                'tinh_trang': 0,
            },
            mo_ta: {},
            edit : {},
        }
    },
    mounted() {
        this.checkLogin();
    },
    methods: {
        checkLogin() {
            baseRequest.post('check-login').then((res) => {
                if(res.status != 200) {
                    this.$router.push('/sinh-vien/login')
                }
                this.user_login = res.data.user;
                console.log(this.user_login);

                this.load();
            }).catch((res) =>  {
                this.$router.push('/sinh-vien/login')
                console.log(res);
            });
        },
        them_moi() {
            this.de_tai_add.id_user = this.user_login.id;
            baseRequest
                .post("sinh-vien/de-tai-sinh-vien/create", this.de_tai_add)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        },

        load() {
            baseRequest
                .get("sinh-vien/de-tai-sinh-vien/data")
                .then((res) => {
                    this.list_de_tai = res.data.data;
                });
        },
        Edit() {
            this.edit.id_user = this.user_login.id;
            baseRequest
                .post("sinh-vien/de-tai-sinh-vien/edit-de-tai", this.edit)
                .then((res) => {
                    functionBasic.displaySuccess(res);
                    this.load();
                });
        }
    },
}
</script>

<style lang="">

</style>
