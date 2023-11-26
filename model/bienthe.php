<?php 
    function loadAll_mau(){
        $sql ="SELECT giatri_thuotinh.id, thuoc_tinh.name 'ten_thuoc_tinh', giatri_thuotinh.name 'ten_gia_tri_tt', giatri_thuotinh.id_thuoctinh FROM thuoc_tinh JOIN giatri_thuotinh ON thuoc_tinh.id = giatri_thuotinh.id_thuoctinh WHERE giatri_thuotinh.id_thuoctinh = 1";
        return pdo_query($sql);
    }
    function loadAll_size(){
        $sql ="SELECT giatri_thuotinh.id, thuoc_tinh.name 'ten_thuoc_tinh', giatri_thuotinh.name 'ten_gia_tri_tt', giatri_thuotinh.id_thuoctinh FROM thuoc_tinh JOIN giatri_thuotinh ON thuoc_tinh.id = giatri_thuotinh.id_thuoctinh WHERE giatri_thuotinh.id_thuoctinh = 2";
        return pdo_query($sql);
    }

    function add_bt($name, $ma_mau, $id_thuoc_tinh){
        $sql = "INSERT INTO giatri_thuotinh(name, ma_mau, id_thuoctinh) VALUES ('$name', '$ma_mau,'$id_thuoc_tinh')";
        pdo_execute($sql);
    }

    function load_one_bt($id){
        $sql ="SELECT * FROM giatri_thuotinh WHERE id=".$id;
        return pdo_query_one($sql);
    }
    function update_bt($id,$ma_mau,$name){
        $sql ="UPDATE giatri_thuotinh SET name='$name',ma_mau='$ma_mau' WHERE id=".$id;
         pdo_execute($sql);
    }

    function add_thong_tin_sp($id_sp, $id_color, $id_size, $so_luong){
        $sql = "INSERT INTO thong_tin_sp( id_sp, id_color, id_size, so_luong) 
        VALUES ('$id_sp', '$id_color', '$id_size', '$so_luong')";
        pdo_execute($sql);
    }

    function load_one_spbt($idsp){
        $sql ="SELECT * FROM `thong_tin_sp` WHERE id_sp ='$idsp' order by id desc";
        return pdo_query($sql);
    }

    function del_bt($id){
        $sql ="DELETE FROM `thong_tin_sp` WHERE id=".$id;
        pdo_execute($sql);
    }
?>