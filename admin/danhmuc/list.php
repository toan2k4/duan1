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
                            <th>Name</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                                foreach ($dsdm as $dm) {
                                extract($dm);
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $name_dm ?>
                                    </td>
                                    <td><a href="?act=danhmuc&nd=editdm&iddm=<?=$id_dm?>" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i> Sửa</a>
                                        <a href="?act=danhmuc&nd=deldm&iddm=<?= $id_dm ?>"
                                            onclick="return confirm('Bạn có muốn xóa không ?') "
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>

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