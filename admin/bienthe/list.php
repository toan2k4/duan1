<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Biến thể</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="?act=danhmuc&&nd=adddm">Thêm màu <i class="bi bi-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <h2>Color</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Tên Màu</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                                foreach ($dsmau as $mau) {
                                extract($mau);
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $ten_gia_tri_tt ?>
                                    </td>
                                    <td><a href="?act=bienthe&nd=edit&idbt=<?=$id?>" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i> Sửa</a>
                                        <a href="?act=bienthe&nd=del&idbt=<?= $id ?>"
                                            onclick="return confirm('Bạn có muốn xóa không ?') "
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>

                    </tbody>


                </table>

                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="?act=danhmuc&&nd=adddm">Thêm Size <i class="bi bi-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <h2>Size</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Tên Size</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                                foreach ($dssize as $size) {
                                extract($size);
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $ten_gia_tri_tt ?>
                                    </td>
                                    <td><a href="?act=bienthe&nd=edit&idbt=<?=$id?>" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i> Sửa</a>
                                        <a href="?act=bienthe&nd=del&idbt=<?= $id ?>"
                                            onclick="return confirm('Bạn có muốn xóa không ?') "
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>

                    </tbody>


                </table>

                </form>
            </div>
        </div>
    </div>

</div>