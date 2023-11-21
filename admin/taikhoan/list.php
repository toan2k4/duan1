<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Tài Khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu tài khoản</th>
                            <th>Ảnh tài khoản</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Chức vụ</th>
                            <th>Chức năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php $i = 1;
                            foreach ($dstk as $tk) {
                                extract($tk);
                                ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $full_name ?>
                                    </td>
                                    <td>
                                        <?= $name_tk ?>
                                    </td>
                                    <td>
                                        <?= $pass ?>
                                    </td>
                                    <td>
                                        <?= $image_tk ?>
                                    </td>

                                    <td>
                                        <?= $email ?>
                                    </td>
                                    <td>
                                        <?= $phone ?>
                                    </td>
                                    <td>
                                        <?= $dia_chi ?>
                                    </td>
                                    <td>
                                        <?php if ($roles == 0)
                                            echo "Admin";
                                        elseif ($roles == 1)
                                            echo "Khách hàng";
                                        else
                                            echo "Nhân Viên";
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($lock == 1){?>
                                        <a href="?act=taikhoan&nd=bokhoa&idtk=<?= $id_tk ?>" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i>Bỏ khóa tài khoản</a>
                                        <?php }else{?>
                                        <a href="?act=taikhoan&nd=khoa&idtk=<?= $id_tk ?>"
                                            onclick="return confirm('Bạn có muốn khóa tài khoản này không ?') "
                                            class="btn btn-danger">Khóa tài khoản</a>
                                        <?php }?>
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
                </form>
            </div>
        </div>
    </div>

</div>