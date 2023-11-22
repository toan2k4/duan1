<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa Sản Phẩm </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=sanpham&nd=listsp">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=sanpham&nd=updatesp" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" name="id_sp" type="hidden" value="<?= $sp['id_sp'] ?>">
                    <input class="form-control" name="hinh_sp" type="hidden" value="<?= $sp['hinh_sp'] ?>">
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="pwd" value="<?= $sp['ten_sp'] ?>"
                        placeholder=" Tên Sản Phẩm" name="ten_sp" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Hình sản phẩm:</label>
                    <input class="form-control" type="file" name="hinh_sp">
                    <img src="../public/uploads/<?= $sp['hinh_sp'] ?>" class="img-thumbnail" alt="" width="200">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giảm Giá:</label>
                    <input class="form-control" value="<?= $sp['giam_gia'] ?>" type="text" name="giam_gia" value="0">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giá Tiền :</label>
                    <input class="form-control" value="<?= $sp['gia'] ?>" type="text" name="gia" value="0">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả : </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        name="mo_ta"><?= $sp['mo_ta'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ngày nhập</label>

                    <input type="date" name="date" value="<?= $sp['ngay_nhap'] ?>" class="form-control"
                        id="exampleInputPassword1">


                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh Mô Tả:</label>
                    <input class="form-control" type="file" name="hinh_phu[]" multiple="multiple">
                    <?php foreach ($hinh_phu as $key => $value): ?>
                        <img src="../public/uploads/<?= $value['hinh_anh'] ?>" class="rounded" alt="Cinque Terre"
                            width="250">
                    <?php endforeach ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới Tính</label>
                    <select class="form-control" aria-label="Default select example" name="gt">
                        <option selected>-------- Chọn Giới Tính --------</option>
                        <option value="0" <?= ($sp['gioi_tinh']) == 0 ? 'selected' : '' ?>>Bé trai</option>
                        <option value="1" <?= ($sp['gioi_tinh']) == 1 ? 'selected' : '' ?>>Bé gái</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Danh mục : </label>
                    <select class="form-control" aria-label="Default select example" name="dm">
                        <option selected>-------- Chọn Danh Mục --------</option>
                        <?php foreach ($dsdm as $key => $value): ?>

                            <option value="<?= $value['id_dm'] ?>" <?= ($sp['id_dm']) == $value['id_dm'] ? 'selected' : '' ?>>
                                <?= $value['name_dm'] ?>
                            </option>

                        <?php endforeach ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Cập Nhật" name="gui">
            </form>

        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Thêm biến thể
    </button>

    <!-- Modal -->
    <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Biến thể</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?act=sanpham&nd=addbt" method="post">
                        <div class="col row">
                            <div class="form-group col-6">
                                <input name="id_sp" type="hidden" value="<?= $sp['id_sp'] ?>">
                                <label for="exampleFormControlSelect1">Màu sắc</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_color">
                                    <option value="0">Chọn màu sắc</option>
                                    <?php
                                    foreach ($dsmau as $value) {
                                        echo '<option value="' . $value['id'] . '">' . $value['ten_gia_tri_tt'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlSelect2">Size</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="id_size">
                                    <option value="0"> Chọn size </option>
                                    <?php
                                    foreach ($dssize as $value) {
                                        echo '<option value="' . $value['id'] . '">' . $value['ten_gia_tri_tt'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Số lượng</label>
                            <input type="number" name="so_luong" class="form-control" id="exampleFormControlTextarea1"
                                placeholder="Nhập số lượng">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <input type="submit" class="btn btn-primary" value="Thêm" name="them">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th>STT</th>
                        <th>Màu sắc</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Chức năng</th>

                    </tr>
                </thead>

                <tbody>
                    <form action="" method="get">
                        <?php $i = 1;
                        foreach ($spbt as $sp) {
                            extract($sp);
                            ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <?= $i ?>
                                </td>
                                <td>
                                    <?php 
                                        $mau = load_one_bt($id_color);
                                        echo $mau['name'];
                                    ?>
                                </td>
                                <td><?php 
                                        $mau = load_one_bt($id_size);
                                        echo $mau['name'];
                                    ?></td>
                                <td>
                                    <?= $so_luong ?>
                                </td>
                               
                
                                <td>
                                    <a href="?act=sanpham&nd=delbt&id=<?= $sp['id'] ?>&idsp=<?= $sp['id_sp'] ?>"
                                        onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <?php $i++;
                        } ?>

                </tbody>


            </table>
        </div>
    </div>
    <?php
    if ($isthongbao == 1) {
        echo "<div class='alert alert-success'>
        <strong>$thongbao</strong>
    </div>";
    } else if ($isthongbao == 0) {
        echo "<div class='alert alert-danger'>
        <strong>$thongbao</strong> Bạn Chưa Điền Tên Danh Mục .
      </div>";
    } else {
        echo '';
    }
    ?>
</div>