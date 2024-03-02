<template>
<div class="container-fluid" style="margin-top:-50x;">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Đăng Kí Nhóm</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Nhóm Đăng Kí</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-contact" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-microphone font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Danh Sách Sinh Viên</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="primary-pills-home" role="tabpanel">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-primary">Đăng ký nhóm</h5>
                                </div>
                                <div class="card-body">
                                    <label style="margin-left:-1480px " for="">Tên nhóm</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên nhóm">
                                    <label style="margin-left:-1450px " for="">Thành viên 1</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên thành viên">
                                    <label style="margin-left:-1450px " for="">Thành viên 2</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên thành viên">
                                    <label style="margin-left:-1450px " for="">Thành viên 3</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên thành viên">
                                    <label style="margin-left:-1450px " for="">Thành viên 4</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên thành viên">
                                    <label style="margin-left:-1450px " for="">Tên Đề Tài</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên đề tài">
                                    <label style="margin-left:-1500px " for="">Mô tả</label>
                                    <textarea name="" id="" cols="30" rows="5" placeholder="bao gồm nội dung đề tài cụ thể..." class="form-control">
                </textarea>
                                    <label style="margin-left:-1400px " for="">Ngôn Ngữ Lập Trình</label>
                                    <textarea name="" id="" cols="30" rows="5" placeholder="ghi rõ ngôn ngữ lập trình" class="form-control">
                </textarea>

                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary">Thêm Mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h5 class="p-2 w-100 mt-1 text-primary">Nhóm đăng ký</h5>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center align-middle">
                                                <th>#</th>
                                                <th>Tên nhóm</th>
                                                <th>Thành viên nhóm</th>
                                                <th>Trang thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle text-center">
                                                <th>1</th>
                                                <td>Quản lí đồ án tốt nghiệp</td>
                                                <td>Làm chớ chưa biết được không nghe</td>
                                                <td>Đã duyệt</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="primary-pills-contact" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h5 class="p-2 w-100 mt-1 text-primary">Danh sách sinh viên</h5>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center align-middle">
                                                    <th>#</th>
                                                    <th>Lớp</th>
                                                    <th>Tên sinh viên</th>
                                                    <th>GPA</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="align-middle text-center">
                                                    <th>1</th>
                                                    <td>CMU TPM6</td>
                                                    <td>Van A</td>
                                                    <td>3.2</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="xoamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Đề Tài
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                </div>
                                <div class="ms-3 text-wrap">
                                    <h6 class="mb-0 text-dark">Warning</h6>
                                    Bạn chắc chắn muốn xóa <b class="text-danger"></b> khỏi
                                    danh sách?
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xác Nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {

}
</script>

<style lang="">

</style>
