<?php 
    function insert_detail_bill($full_name, $phone, $dia_chi, $email, $thanh_tien, $thanh_toan){
        $date = date('H:m:s d-m-Y');
        $sql = "INSERT INTO detail_bill( full_name, phone, dia_chi, email, thoi_gian, thanh_tien, thanh_toan) VALUES ( '$full_name', '$phone', '$dia_chi', '$email', '$date', '$thanh_tien', '$thanh_toan')";
        return pdo_execute_return_lastInsertId($sql);
    }
    function insert_bill($id_ctbill, $id_sp, $so_luong, $gia, $mau, $size){
        $sql = "INSERT INTO bill(id_ctbill, id_sp, so_luong, gia, mau, size) VALUES ('$id_ctbill', '$id_sp', '$so_luong', '$gia', '$mau', '$size')";
        pdo_execute($sql);
    }

    function loadAll_detailbill(){
        $sql = "SELECT * FROM detail_bill order by id desc";
        return pdo_query($sql);
    }

    function loadone_bill($id){
        $sql = "SELECT ten_sp, hinh_sp, so_luong,bill.gia, mau, size FROM bill join sanpham on bill.id_sp = sanpham.id_sp WHERE id_ctbill = $id";
        return pdo_query($sql);
    }

    function update_trangthai($id, $value){
        $sql = "UPDATE detail_bill SET trang_thai='$value' WHERE id = $id";
        pdo_execute($sql);
    }
?>