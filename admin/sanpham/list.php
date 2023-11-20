<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Sản Phẩm</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="?act=sanpham&&nd=addsp">Thêm Sản Phẩm <i class="bi bi-plus-circle"></i></a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình sản phẩm</th>
                            <th>Giảm giá</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Số lượt xem</th>
                            <th>Ngày nhập</th>
                            <th>Giới tính</th>
                            <th>Chức năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                                foreach ($dssp as $sp) {
                                extract($sp);
                                $anhsp = '../'.$img_path.$hinh_sp;
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?= $i ?></td>
                                    <td><?= $ten_sp ?></td>
                                    <td><img src="<?=$anhsp?>" width="100" alt=""></td>
                                    <td><?= $giam_gia ?></td>
                                    <td><?= $gia ?></td>
                                    <td><?= $mo_ta ?></td>
                                    <td><?= $so_luot_xem ?></td>
                                    <td><?= date("d-m-Y", strtotime($ngay_nhap)) ?></td>
                                    <td><?= $gioi_tinh ?></td>
                                    <td><a href="?act=sanpham&nd=editsp&idsp=<?=$id_sp?>" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i> Sửa</a>
                                        <a href="?act=sanpham&nd=delsp&idsp=<?= $id_sp?>"
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