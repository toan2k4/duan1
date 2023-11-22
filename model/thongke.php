<?php
function thongke_sp_danhmuc()
{
    $sql = "SELECT danhmuc.id_dm, name_dm, COUNT(sanpham.id_sp) AS Tong
            FROM danhmuc
            LEFT JOIN sanpham ON sanpham.id_dm = danhmuc.id_dm
            GROUP BY danhmuc.id_dm, name_dm;";
    $dm = pdo_query($sql);
    return $dm;
}

function thongke_bl_sp()
{
    $sql = "SELECT sanpham.id_sp, ten_sp, COUNT(binh_luan.id_bl) AS Tong
    FROM sanpham
    LEFT JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp
    GROUP BY sanpham.id_sp, ten_sp;";
    $dm = pdo_query($sql);
    return $dm;
}

function load_thongke_binhluan(){
    $sql = "SELECT sanpham.id_sp 'idsp', bl.id_bl,sp.ten_sp, COUNT(bl.id_bl) 'soBinhLuan' 
            FROM sanpham sp 
            left JOIN binh_luan bl ON sp.id_sp = bl.idpro 
            left JOIN sanpham ON bl.idpro = sanpham.id 
            WHERE sanpham.trangthai = 0 and bl.trangthai = 0 
            GROUP BY sp.id 
            ORDER BY sp.id";
    return pdo_query($sql);
}
?>