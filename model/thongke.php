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
?>