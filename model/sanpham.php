<?php
function loadAll_sp($id_dm = 0, $kyw = '')
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($kyw != ''){
        $sql .= " and ten_sp like '%".$kyw."%'";
    }
    if($id_dm != 0){
        $sql .= ' and id_dm = '.$id_dm.'';
    }
    $sql .= " ORDER BY id_sp desc";
    return pdo_query($sql);
}
function loadAll_splq($id_sp, $id_dm){
    $sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm and id_sp <> $id_sp";
    return pdo_query($sql);
}

function loadAll_sp_popular()
{
    $sql = "SELECT * FROM sanpham  ORDER BY so_luot_xem desc ";
    
    return pdo_query($sql);
}
function loadAll_sp_sale()
{
    $sql = "SELECT * FROM sanpham  ORDER BY giam_gia desc LIMIT 1,8";
    return pdo_query($sql);
}



function loadAll_hp($id)
{
    $sql = "SELECT * FROM hinh_anh WHERE id_sp = $id";
    return pdo_query($sql);
}

function load_one_sp($id)
{
    $sql = "SELECT * FROM sanpham WHERE id_sp=" . $id;
    return pdo_query_one($sql);
}

function add_sp($ten_sp, $hinh_sp, $giam_gia, $gia, $mo_ta, $ngay_nhap, $gioi_tinh, $id_dm, $trang_thai = 0)
{
    $sql = "INSERT INTO sanpham( ten_sp, hinh_sp, giam_gia, gia, mo_ta, ngay_nhap, gioi_tinh, id_dm, trang_thai) 
    VALUES ('$ten_sp', '$hinh_sp', '$giam_gia', '$gia', '$mo_ta', '$ngay_nhap', '$gioi_tinh', '$id_dm', '$trang_thai')";
    return pdo_execute_return_lastInsertId($sql);
    
}

function update_sp($id, $ten_sp, $hinh_sp, $giam_gia, $gia, $mo_ta, $ngay_nhap, $gioi_tinh, $id_dm, $trang_thai = 0)
{
    $sql = "UPDATE sanpham SET ten_sp='$ten_sp',hinh_sp='$hinh_sp',giam_gia='$giam_gia',gia='$gia',mo_ta='$mo_ta',ngay_nhap='$ngay_nhap',gioi_tinh='$gioi_tinh',id_dm='$id_dm',trang_thai='$trang_thai' WHERE id_sp=".$id;
    pdo_execute($sql);
}

function xoasp($id)
{
    $sql = " DELETE FROM sanpham  WHERE id_sp = $id";
    pdo_query($sql);
}
function xoaimgsp($id)
{
    $sql = " DELETE FROM hinh_anh  WHERE id_sp = $id";
    pdo_query($sql);
}

function add_img($id_sp, $hinh_anh)
{
  $sql = " INSERT INTO hinh_anh(id_sp, hinh_anh) VALUES ('$id_sp','$hinh_anh')";
  pdo_execute($sql);
}


function load_sp_ma_mau($id){
    $sql = "SELECT  id_sp
    FROM thuoc_tinh 
    JOIN giatri_thuotinh ON thuoc_tinh.id = giatri_thuotinh.id_thuoctinh 
    JOIN thong_tin_sp ON thong_tin_sp.id_color = giatri_thuotinh.id
    WHERE giatri_thuotinh.id_thuoctinh =1 and giatri_thuotinh.id=$id
    GROUP BY id_sp";
    return pdo_query($sql);
}

function load_sp_id($id){
    $sql ="SELECT * FROM sanpham WHERE id_sp in ($id)";
    return pdo_query($sql);
}

function load_sp_price($price1 , $price2){
    $sql ="SELECT * FROM sanpham WHERE gia > $price1 and gia < $price2";
    return pdo_query($sql);
}

function load_sp_sex($id){
    $sql ="SELECT * FROM sanpham WHERE gioi_tinh = $id";
    return pdo_query($sql);
}
?>