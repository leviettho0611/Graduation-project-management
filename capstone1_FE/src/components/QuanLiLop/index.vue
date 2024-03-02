<template>
    <div class="row ">
        <div class="col-4">
            <h4 class="text-danger">Quản Lý Lớp</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Lớp
                </div>
                <div class="card-body">
                    <label for="">Tên Lớp</label>
                    <input type="text" class="form-control">
                    <label for="">Mã Lớp</label>
                    <input type="text" class="form-control">
                    <label for="">Khoa</label>
                    <select name="" id="" class="form-control">
                        <option value="1" class="form-control">
                            ĐTQT
                        </option>
                        <option value="2" class="form-control">
                            ATTT
                        </option>
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-outline-success">Tạo</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-danger">
                        Danh Sách Lớp
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="input-group mb-3">
                              
                                <input type="text" class="form-control" placeholder="nhập tên lớp cần tìm" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm</button>
                            </div>
                            <button class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash-can"></i>Xoá
                            </button>
                        </div>
                        
    
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>
                                <th>Thao Tác</th>
                                <th>#</th>
                                <th>Tên Lớp</th>
                                <th>Mã Lớp</th>
                                <th>Khoa</th>
                                
    
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                                <td>
                                    <button style="margin-right: 10px;" class="btn btn-outline-info">Sửa</button>
                                    <router-link to="/quan-li-sv">
                                        <button style="margin-right: 10px;" class="btn btn-outline-dark"> Chi tiết</button>
                                    </router-link>
                                </td>
                                <td>1</td>
                                <td>Công Nghệ Phần Mềm 1</td>
                                <td>TPM 1</td>
                                <td>CNPM</td>
                                
    
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                                <td>
                                    <button style="margin-right: 10px;" class="btn btn-outline-info">Sửa</button>
                                    <router-link to="/quan-li-sv">
                                        <button style="margin-right: 10px;" class="btn btn-outline-dark">Chi tiết</button>
                                    </router-link>
                                </td>
                                <td>2</td>
                                <td>Công Nghệ Phần Mềm 2</td>
                                <td>TPM2</td>
                                <td>CNPM</td>
                                
    
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Sửa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="">Tên Khóa</label>
                                    <input type="text" class="form-control">
                                    <label for="">Thời Gian Bắt Đầu</label>
                                    <input type="datetime-local" class="form-control">
                                    <label for="">Thời Gian Kết Thúc</label>
                                    <input type="datetime-local" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-end">
        <div class="col-6">
    
        </div>
        <div class="col-4">
    
        </div>
        <div class="col-2 ">
            <nav aria-label="Page navigation example ">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
    
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </template>
    
    <script>
    export default {
    
    }
    </script>
    
    <style >
    
    </style>
    