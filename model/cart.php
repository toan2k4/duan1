<?php 
    function insert_cart( $iduser, $idsp, $image, $namesp, $price, $soluong, $size, $color){
        $sql = "INSERT INTO cart( iduser, idsp, hinh_sp, ten_sp, price, soluong, size, color) VALUES ('$iduser', '$idsp', '$image', '$namesp', '$price', '$soluong', '$size', '$color')";
        pdo_execute($sql);
    }

    function loadAll_cart(){
        $sql = "SELECT * FROM `cart` ORDER BY id desc";
        return pdo_query($sql);
    }

    function update_cart($id_sp,$soluong){
        $sql = "UPDATE `cart` SET `soluong`='$soluong' WHERE idsp = $id_sp";
        // var_dump($sql);
        // die();
        pdo_execute($sql);
    }

    function load_one_cart($id_sp){
        $sql = "SELECT * FROM `cart` WHERE idsp=$id_sp";
        return pdo_query_one($sql);
    }
?>