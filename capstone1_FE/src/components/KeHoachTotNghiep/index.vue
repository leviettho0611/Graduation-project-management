<template lang="">
  <div class="contaner-fuld">
    <div class="row">
      <div class="col-6"></div>
      <div class="col-6 text-end">
        <button
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#themmodal"
        >
          Thêm Mới
        </button>
      </div>
    </div>
    <div
      class="modal fade"
      id="themmodal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Thêm mới kế hoạch
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <label class="form-label">Tên Kế Hoạch</label>
                <input v-model="create_KHTN.ten_ke_hoach" type="text" class="form-control" />
              </div>
              <div class="col-12">
                <label class="form-label">Date</label>
                <input v-model="create_KHTN.ngay" type="date" class="form-control" />
              </div>
              <div class="col-12">
                <label class="form-label">Mô tả</label>
                <textarea v-model="create_KHTN.mo_ta" class="form-control" name="" id="" cols="60" rows="5">Mô Tả</textarea>
              </div>
              <div class="col-12">
                <label class="form-label mt-3">Tình Trạng</label>
                <select v-model="create_KHTN.tinh_trang" class="form-control">
                  <option value="1">Hiển thị</option>
                  <option value="0">Tạm tắt</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">File</label>
                <input class="form-control" type="file" @change="handleFileChange">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button
              data-bs-dismiss="modal"
              type="button"
              class="btn btn-primary"
              @click="themMoi"
            >
              Thêm mới
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="card">
        <div class="card-header">
          <h5>Kế Hoạch Đồ Án Tốt Nghiệp</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr>
                <th>#</th>
                <th>Tên Kế Hoạch</th>
                <th>Ngày</th>
                <th>Mô tả</th>
                <th>File</th>
                <th>Tình Trạng</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <template v-for="(value, key) in list">
                    <tr>
                      <th class="text-center align-middle text-nowrap">{{key + 1}}</th>
                      <td class="align-middle text-nowrap">{{value.ten_ke_hoach}}</td>
                      <td class="text-center align-middle text-nowrap">{{value.ngay}}</td>
                      <td class="text-center align-middle text-nowrap">{{value.mo_ta}}</td>
                      <td class="text-center align-middle text-nowrap"><i class="fa-solid fa-file-arrow-down fa-2x text-primary" v-on:click="downloadFile(value.file)"></i></td>
                      <td class="text-center alglin-center">
                        <template v-if="value.tinh_trang == 1">
                            <button @:click="changeStatus(value)" style="margin-right: 10px" class="btn btn-primary">
                              Hiển Thị
                            </button>
                        </template>
                        <template v-else>
                            <button @:click="changeStatus(value)" style="margin-right: 10px" class="btn btn-danger">
                              Tạm Tắt
                            </button>
                        </template>
                      </td>
                      <td class="text-center align-middle text-nowrap">
                        <button class="btn btn-warning me-2 " data-bs-toggle="modal" data-bs-target="#capNhatModal" v-on:click="edit = value">Cập Nhật</button>
                        <button  data-bs-toggle="modal" data-bs-target="#exampleXoakehoach" class="btn btn-danger"  @:click="xoa_ke_hoach= Object.assign({},value)">Xóa</button>
                      </td>
                    </tr>
                </template>
            </tbody>
          </table>
          <div class="modal fade" id="exampleXoakehoach" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Nhóm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn Có Chắc Muốn Xóa Nhóm <p class="text-danger">{{xoa_ke_hoach.ten_ke_hoach}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="Xoa()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
                    </div>
                </div>
            </div>
        </div>
          <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <label class="form-label">Tên Kế Hoạch</label>
                      <input v-model="edit.ten_ke_hoach" type="text" class="form-control" />
                    </div>
                    <div class="col-12">
                      <label class="form-label">Date</label>
                      <input v-model="edit.ngay" type="date" class="form-control" />
                    </div>
                    <div class="col-12">
                      <label class="form-label">Mô tả</label>
                      <textarea v-model="edit.mo_ta" class="form-control" name="" id="" cols="60" rows="5">Mô Tả</textarea>
                    </div>
                    <div class="col-12">
                      <label class="form-label mt-3">Tình Trạng</label>
                      <select v-model="edit.tinh_trang" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Tạm tắt</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label">File</label>
                      <input class="form-control" type="file" @change="handleFileChange">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu </button>
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
            create_KHTN  : {},
            file         : null,
            list         : [],
            edit         : [],
            xoa_ke_hoach:{},
        }
    },
    mounted() {
        this.loadData();
    },
    methods : {
        handleFileChange(event) {
          this.file = event.target.files[0];
        },
        themMoi() {
            const formData = new FormData();
            formData.append('file', this.file);
            formData.append('ten_ke_hoach', this.create_KHTN.ten_ke_hoach);
            formData.append('ngay', this.create_KHTN.ngay);
            formData.append('mo_ta', this.create_KHTN.mo_ta);
            formData.append('tinh_trang', this.create_KHTN.tinh_trang);
            axios.post('http://127.0.0.1:8000/api/admin/ke-hoach-tot-nghiep/create', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(res => {
                functionBasic.displaySuccess(res);
                this.file = null;
                this.loadData();
            })
            .catch(error => {
                console.error(error);
                alert('File upload failed.');
            });
        },
        handleEdit() {
          const formData = new FormData();
          formData.append('file', this.file);
          formData.append('ten_ke_hoach', this.dit.ten_ke_hoach);
          formData.append('ngay', this.dit.ngay);
          formData.append('mo_ta', this.dit.mo_ta);
          formData.append('tinh_trang', this.dit.tinh_trang);
          axios.post('http://127.0.0.1:8000/api/ke-hoach-tot-nghiep/update', formData, {
              headers: {
                  'Content-Type': 'multipart/form-data',
              },
          })
          .then(res => {
              functionBasic.displaySuccess(res);
              this.file = null;
              this.loadData();
          })
          .catch(error => {
              console.error(error);
              alert('File upload failed.');
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
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/ke-hoach-tot-nghiep/data')
                .then((res) => {
                    this.list = res.data.data;
                });
        },
        changeStatus(value) {
            axios
                .post('http://127.0.0.1:8000/api/ke-hoach-tot-nghiep/status', value)
                .then((res) => {
                    this.loadData();
                    functionBasic.displaySuccess(res);
                })
                .catch((res) => {
                    
                });
        },
        Xoa() {
          baseRequest
          .post('ke-hoach-tot-nghiep/delete', this.xoa_ke_hoach)
                    .then(res => {
                        functionBasic.displaySuccess(res);
                        this.loadData();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    }
};
</script>
<style lang="scss"></style>
