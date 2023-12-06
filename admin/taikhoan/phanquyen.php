<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Phân quyền tài khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="?act=taikhoan&nd=phanquyen" enctype="multipart/form-data" method="post">
                
                <div class="mb-3">
                    <label for="pwd" class="form-label">Tên tài khoản:</label>
                    <input type="text" class="form-control" readonly value="<?= $tk['name_tk']?>">
                    <input type="hidden" class="form-control" name="id_tk" value="<?= $tk['id_tk']?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="pwd" readonly value="<?= $tk['full_name']?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="pwd" readonly value="<?= $tk['email']?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Só điện thoại:</label>
                    <input type="text" class="form-control" id="pwd" readonly value="<?= $tk['phone']?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="pwd" readonly value="<?= $tk['dia_chi']?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Phân quyền:</label>
                    <select name="roles" id="">
                        <option value="1" <?= ($tk['roles'] == 1 ) ? 'selected': ''?>>admin</option>
                        <option value="0" <?= ($tk['roles'] == 0 ) ? 'selected': ''?>>khách hàng</option>
                    </select>
                </div>


                <input type="submit" class="btn btn-primary" value="Cập Nhật" name="gui" onclick="return alert('Đã Cập Nhật Thành Công')">
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