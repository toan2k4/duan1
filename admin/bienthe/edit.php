<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm biến thể</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=bienthe&nd=update">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=bienthe&nd=update"  method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Id:</label>
                    <input type="hidden" value="<?= $bienthe['id']?>" name="id">
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Tên biến thể:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Nhập tên thuộc tính biến thể" name="name" value="<?= $bienthe['name']?>" required>
                </div>

                <input type="submit" class="btn btn-primary" value="Cập nhật" name="gui">
            </form>

        </div>
    </div>
    <?php 
    if ($isthongbao == 1 ) { 
        echo "<div class='alert alert-success'>
        <strong>$thongbao</strong>
    </div>" ;
    } else  if ($isthongbao == 0 )  { 
        echo "<div class='alert alert-danger'>
        <strong>$thongbao</strong> Bạn Chưa Điền Tên Danh Mục .
      </div>" ;
    }  else {
        echo '' ;
    }
    ?>
</div>