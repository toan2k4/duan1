<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Danh Mục</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="?act=danhmuc&&nd=adddm">Thêm Danh Mục <i class="bi bi-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Người bình luận</th>
                            <th>Ngày bình luận</th>
                            <th>Chức năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                            foreach ($dsbl as $ds) {
                                // var_dump($dsbl);
                                // die();
                                extract($ds);
                                ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $ten_sp ?>
                                    </td>
                                    <td>
                                        <?= $name_tk ?>
                                    </td>
                                    <td>
                                        <?= $noi_dung ?>
                                    </td>
                                    <td>
                                        <?= $ngaybinhluan ?>
                                    </td>
                                    <td>
                                        <a href="?act=binhluan&nd=delbl&idbl=<?= $id_bl?>"
                                            onclick="return confirm('Bạn có muốn xóa không ?') "
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>

                    </tbody>


                </table>
                <a href="" type="reset" class="btn btn-secondary">Bỏ Chọn Tất Cả </a>
                <a href="" type="button" class="btn btn-success">Chọn Tất Cả</a>
                <a type="button" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa không ?')">Xóa Các Mục
                    Đã Chọn</a>
                <a href="" onclick="return confirm('Bạn có muốn xóa không ?')" type="button" class="btn btn-danger">Xóa
                    Tất Cả</a>
                <a href="" type="button" class="btn btn-info">Số Lượng Sản Phẩm</a>
                </form>
            </div>
        </div>
    </div>

</div>