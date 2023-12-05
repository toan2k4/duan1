<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Đơn Hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Người Đặt</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Thời gian</th>
                            <th>Trạng Thái</th>
                            <th>Thanh Toán</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_detailbill as $key => $value){
                            extract($value);    
                        ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $full_name ?>
                            </td>
                            <td><?= $phone ?></td>
                            <td>
                                <?= $dia_chi ?>
                            </td>
                            <td>
                                <?= $email ?>
                            </td>
                            <td>
                                <?= $thoi_gian ?>
                            </td>
                            <td>
                                <?php 
                                    if($trang_thai == 0){
                                        echo '<div class="alert alert-warning">Đang xác nhận</div>';
                                    }elseif($trang_thai == 1){
                                        echo '<div class="alert alert-info">Đã xác nhận</div>';
                                    }elseif($trang_thai == 2){
                                        echo '<div class="alert alert-primary">Đang giao hàng</div>';
                                    }elseif($trang_thai == 3){
                                        echo '<div class="alert alert-success">Đã nhận hàng</div>';
                                    }else{
                                        echo '<div class="alert alert-danger">Đã hủy đơn hàng</div>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?= $thanh_toan ?>
                            </td>
                            
                            <td><a href="?act=donhang&nd=chitiet&id_ctbill=<?= $id ?>&trang_thai=<?= $trang_thai?>" class="btn btn-success"> Chi Tiết</a>
                                
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>