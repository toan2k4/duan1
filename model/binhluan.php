<?php 
function load_bl_sp($id){
    $sql ="SELECT binh_luan.id_bl,image_tk, binh_luan.id_sp, ten_sp, name_tk, noi_dung, ngaybinhluan, binh_luan.danh_gia FROM binh_luan 
    JOIN taikhoan ON binh_luan.id_tk = taikhoan.id_tk
    JOIN sanpham ON binh_luan.id_sp = sanpham.id_sp
    WHERE binh_luan.id_sp=$id";

    return pdo_query($sql);
}

function xoabl($id)
{
  $sql = " DELETE FROM binh_luan  WHERE id_bl = $id";
  pdo_execute($sql);
}

function insert_bl($noi_dung, $id_sp, $id_tk, $danh_gia){
  $date = date('d-m-Y');
  $sql = "INSERT INTO binh_luan( noi_dung, id_sp, id_tk, ngaybinhluan, danh_gia) VALUES ('$noi_dung', '$id_sp', '$id_tk', '$date', '$danh_gia')";
  pdo_execute($sql);
}
?>