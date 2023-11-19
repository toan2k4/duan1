<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=sanpham&nd=listsp">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=sanpham&nd=addsp" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Tên Sản Phẩm" name="ten_sp" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">hình ảnh sản phẩm :</label>
                    <input class="form-control" type="file" name="hinh_sp">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giảm Giá:</label>
                    <input class="form-control" type="text" name="giam_gia" value="0">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giá Tiền :</label>
                    <input class="form-control" type="text" name="gia" value="0">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả : </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mo_ta"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ngày nhập</label>
                    <input type="date" name="ngay_nhap" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh phụ:</label>
                    <input class="form-control" type="file" name="hinh_phu[]" multiple="multiple">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới Tính</label>
                    <select class="form-control" aria-label="Default select example" name="gioi_tinh">
                        <option selected>-------- Chọn Giới Tính --------</option>
                        <option value="0">Bé trai</option>
                        <option value="1">Bé gái</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Danh mục : </label>
                    <select class="form-control" aria-label="Default select example" name="danh_muc">
                        <option selected>-------- Chọn Danh Mục --------</option>
                        <?php foreach ($dsdm as $key => $value) : ?>

                            <option value="<?= $value['id_dm'] ?>"><?= $value['name_dm'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm Mới" name="gui">
            </form>

        </div>
    </div>
    <?php
    if ($isthongbao == 1) {
        echo "<div class='alert alert-success'>
        <strong>$thongbao</strong>
    </div>";
    } else  if ($isthongbao == 0) {
        echo "<div class='alert alert-danger'>
        <strong>$thongbao</strong> Bạn Chưa Điền Tên Danh Mục .
      </div>";
    } else {
        echo '';
    }
    ?>
</div>