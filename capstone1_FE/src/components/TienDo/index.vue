<template>
  <div class="row">
    <h4>Tiến Độ</h4>
  </div>
  <div class="row mt-3">
    <div class="col">
      <div class="card border-primary border-top border-3 border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên Nhóm</th>
                      <th>Mã Nhóm</th>
                      <th>Thành Viên Nhóm</th>
                      <th>Tên Giảng Viên HD</th>
                      <th>Chi Tiết</th>
                    </tr>
                  </thead>
                  <tbody class="text-center align-middle text-nowrap">
                      <template v-for="(value, key) in list" :key="key">
                          <tr>
                              <th class="align-middle text-nowrap">{{key + 1}}</th>
                              <td class="align-middle text-nowrap">{{value.ten_nhom}}</td>
                              <td class="align-middle text-nowrap">{{value.ma_nhom}}</td>
                              <td class="align-middle text-nowrap">
                                  <table class="table table-bordered">
                                      <tbody>
                                          <template v-for="(v_1, k_1) in value.list" :key="k_1">
                                              <ul>
                                                  <li class="text-start"> {{v_1.ten_sinh_vien}}</li>
                                              </ul>
                                          </template>
                                      </tbody>
                                  </table>
                              </td>
                              <td class="align-middle text-nowrap">
                                  {{value.ten_giang_vien}}
                              </td>
                              <td>
                                  <button
                                  class="btn btn-outline-primary px-5 radius-30"
                                  data-bs-toggle="modal"
                                  data-bs-target="#chitietmodal"
                                  v-on:click="Object.assign(chi_tiet_nhom, value); loadChiTietNhom()"
                                  >
                                  Chi Tiết
                                  </button>
                              </td>
                          </tr>
                      </template>
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div
    class="modal fade"
    id="chitietmodal"
    tabindex="-1"
    aria-labelledby="chitietmodalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="chitietmodalLabel">
            Chi Tiết Tiến Độ
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center text-nowrap align-middle">#</th>
                <th class="text-center text-nowrap align-middle">Tên Nhật Kí</th>
                <th class="text-center text-nowrap align-middle">Thời Gian</th>
                <th class="text-center text-nowrap align-middle">Mô Tả</th>
                <th class="text-center text-nowrap align-middle">Tên File</th>
                <th class="text-center text-nowrap align-middle">Dowload File</th>
                <th class="text-center text-nowrap align-middle">Tình Trạng</th>
              </tr>
            </thead>
            <tbody>
                <template v-for="(value, key) in list_chi_tiet" :key="key">
                    <tr>
                        <th class="text-center align-middle text-nowrap">{{ key + 1 }}</th>
                        <td class="align-middle text-nowrap">{{ value.ten_nhat_ky }}</td>
                        <td class="text-center align-middle text-nowrap">{{ value.thoi_gian }}</td>
                        <td class="tex-wrap align-middle">{{ value.mo_ta }}</td>
                        <td class="text-nowrap align-middle">{{ value.ten_file }}</td>
                        <td class="text-center text-nowrap align-middle">
                            <i class="fa-solid fa-file-arrow-down fa-2x text-primary" v-on:click="downloadFile(value.file)"></i>
                        </td>
                        <td class="text-center text-nowrap align-middle">
                            <template v-if="value.tinh_trang == 0">
                                <button style="width: 120px;" class="btn btn-danger">Chưa Được Tốt</button>
                            </template>
                            <template v-else-if="value.tinh_trang == 1">
                                <button style="width: 120px;" class="btn btn-warning">
                                Tạm
                                </button>
                            </template>
                            <template v-else>
                                <button style="width: 120px;" class="btn btn-success">
                                Tốt
                                </button>
                            </template>
                        </td>
                    </tr>
                </template>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
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
            list : [],
            chi_tiet_nhom : {},
            list_chi_tiet   : [],
        };
    },
    mounted () {
        this.loadTienDo();
    },  
    methods: {
        loadTienDo() {
            baseRequest
                .get('admin/tien-do/data')
                .then((res) => {
                    this.list = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        loadChiTietNhom() {
            baseRequest
                .post('admin/tien-do/chi-tiet-data', this.chi_tiet_nhom)
                .then((res) => {
                    this.list_chi_tiet = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
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
                    this.$toast.error('File chưa được upload!');
                });
        },
    },
};
</script>

<style lang="">
</style>
