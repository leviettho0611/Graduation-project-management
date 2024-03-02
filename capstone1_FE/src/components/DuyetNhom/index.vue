<template>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Danh Sách Nhóm Đăng Kí</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Tên Nhóm</th>
                        <th>
                            Thành Viên Nhóm
                        </th>
                        <th>Tên Đề Tài</th>
                        <th>Mô Tả</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>CIS_18</td>
                        <td>
                            <ul>
                                <li>Linh</li>
                                <li>Linh</li>
                                <li>Linh</li>
                                <li>Linh</li>
                            </ul>
                        </td>
                        <td>
                            Quản lí đồ án tốt nghiệp
                        </td>
                        <td>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleMoTa"><i class="fa-solid fa-info"></i></button>

                        </td>
                        <td>
                            <button style="margin-right: 10px;" class="btn btn-success">Duyệt</button>
                            <button class="btn btn-danger">Hủy </button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleMoTa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" data-bs-toggle="modal" data-bs-target="#exampleMoTa">Mô Tả</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            là một trong những đồ án có tính.....
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
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
