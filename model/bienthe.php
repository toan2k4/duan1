<?php 
    function loadAll_mau(){
        $sql ="SELECT giatri_thuotinh.id, thuoc_tinh.name 'ten_thuoc_tinh', giatri_thuotinh.name 'ten_gia_tri_tt', giatri_thuotinh.id_thuoctinh FROM thuoc_tinh JOIN giatri_thuotinh ON thuoc_tinh.id = giatri_thuotinh.id_thuoctinh WHERE giatri_thuotinh.id_thuoctinh = 1";
        return pdo_query($sql);
    }
    function loadAll_size(){
        $sql ="SELECT giatri_thuotinh.id, thuoc_tinh.name 'ten_thuoc_tinh', giatri_thuotinh.name 'ten_gia_tri_tt', giatri_thuotinh.id_thuoctinh FROM thuoc_tinh JOIN giatri_thuotinh ON thuoc_tinh.id = giatri_thuotinh.id_thuoctinh WHERE giatri_thuotinh.id_thuoctinh = 2";
        return pdo_query($sql);
    }

    function add_bt($name,$id_thuoc_tinh){
        $sql = "INSERT INTO giatri_thuotinh(name, id_thuoctinh) VALUES ('$name','$id_thuoc_tinh')";
        pdo_execute($sql);
    }

    function load_one_bt($id){
        $sql ="SELECT * FROM giatri_thuotinh WHERE id=".$id;
        return pdo_query_one($sql);
    }
    function update_bt($id,$name){
        $sql ="UPDATE `giatri_thuotinh` SET `name`='$name' WHERE id=".$id;
        return pdo_query_one($sql);
    }
?>