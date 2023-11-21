<?php 
function load_bl_sp($id){
    $sql ="SELECT binh_luan.id_bl, binh_luan.id_sp, ten_sp, name_tk, noi_dung, ngaybinhluan FROM binh_luan 
    JOIN taikhoan ON binh_luan.id_tk = taikhoan.id_tk
    JOIN sanpham ON binh_luan.id_sp = sanpham.id_sp
    WHERE binh_luan.id_sp=$id";
    // var_dump($sql);
    // die();
    return pdo_query($sql);
}

function xoabl($id)
{
  $sql = " DELETE FROM binh_luan  WHERE id_bl = $id";
  pdo_execute($sql);
}
?>