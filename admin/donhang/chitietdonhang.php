<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi Tiết Đơn Hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình sản phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Màu</th>
                            <th>size</th>
                            <th>Thành Tiền</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sumtotal = 0;
                        foreach ($ds as $key => $value) {
                            extract($value);
                            $sumtotal += $gia * $so_luong;
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $ten_sp ?>
                                </td>
                                <td><img src="../public/uploads/<?= $hinh_sp ?>" width="80px"></td>
                                <td>
                                    <?= $so_luong ?>
                                </td>
                                <td>
                                    $
                                    <?= $gia ?>
                                </td>
                                <td>
                                    <?php
                                    $color = load_one_bt($mau);
                                    echo $color['name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $color = load_one_bt($size);
                                    echo $color['name'];
                                    ?>
                                </td>
                                <td>$
                                    <?= $gia * $so_luong ?>
                                </td>

                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7">Tổng tiền</td>
                            <td>$
                                <?= $sumtotal ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form action="?act=donhang&nd=update" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id_ctbill'] ?>">
                    <input type="submit" class="btn btn-info" value=" Xác Nhận Đơn" name="xac" <?= ($trang_thai == '1' || $trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
                    <input type="submit" class="btn btn-primary" value=" Đang Giao Hàng" name="giao"
                        <?= ($trang_thai == '0' || $trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
                    <input type="submit" class="btn btn-danger" value="Hủy Đơn" name="huy" <?= ($trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
                    <input type="submit" class="btn btn-success" value="Đã Nhận Hàng" name="thanhcong"
                        <?= ( $trang_thai == '1' || $trang_thai == '4' || $trang_thai == '0'|| $trang_thai == '3') ? 'hidden' : '' ?>>
                    <input type="submit" class="btn btn-secondary" value="Quay Lại" name="quay">
                </form>
            </div>
        </div>
    </div>

</div>