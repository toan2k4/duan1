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

function load_thongke_binhluan()
{
    $sql = "SELECT sanpham.id_sp 'idsp', bl.id_bl,sp.ten_sp, COUNT(bl.id_bl) 'soBinhLuan' 
            FROM sanpham sp 
            left JOIN binh_luan bl ON sp.id_sp = bl.idpro 
            left JOIN sanpham ON bl.idpro = sanpham.id 
            WHERE sanpham.trangthai = 0 and bl.trangthai = 0 
            GROUP BY sp.id 
            ORDER BY sp.id";
    return pdo_query($sql);
}

function thongke_danhgia_sp($id_sp)
{
    $sql = "SELECT sanpham.id_sp, binh_luan.id_tk,AVG( binh_luan.danh_gia) 'tb_star'  FROM `sanpham` JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp
    WHERE sanpham.id_sp = $id_sp
    GROUP BY sanpham.id_sp;";
    $danh_gia = pdo_query_one($sql);
    return $danh_gia['tb_star'];
}

// tính tổng thu nhập theo tháng
function tong_dt_thang(){
    $sql = "SELECT SUM(thanh_tien) as tong
    FROM `detail_bill`
    WHERE thoi_gian >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND thoi_gian <= CURDATE();";
    return pdo_query_one($sql);
}
// tính tổng thu nhập theo năm
function tong_dt_nam(){
    $sql = "SELECT SUM(thanh_tien) AS tong
    FROM `detail_bill`
    WHERE YEAR(thoi_gian) = YEAR(CURDATE())";
    return pdo_query_one($sql);
}

function tong_dt_ngay(){
    $sql = "SELECT sum(thanh_tien) as tong
    FROM `detail_bill` 
    WHERE DATE(thoi_gian) = CURRENT_DATE()";
    return pdo_query_one($sql);
}

// list 1 
// function loadall_thongke()
// {
//     $sql = "SELECT danhmuc.id_dm as id, danhmuc.name_dm as tenloai, count(sanpham.id_sp) as countsp,min(sanpham.gia) as minprice, max(sanpham.gia) as maxprice, avg(sanpham.gia) as avgprice";
//     $sql .= " FROM sanpham left join danhmuc on danhmuc.id_dm=sanpham.id_dm";
//     $sql .= " GROUP BY danhmuc.id_dm order by danhmuc.id_dm desc";
//     $listtk = pdo_query($sql);
//     return $listtk;
// }

// function thongke_ngay()
// {
//     $sql = "SELECT bill.id_ctbill , SUM(thanh_tien) as Tong , SUM(bill.so_luong)
//     AS so_luong , thoi_gian , trang_thai FROM detail_bill  JOIN bill  
//     ON detail_bill.id = bill.id_ctbill  WHERE trang_thai = 3 GROUP BY bill.id_ctbill;";
//     $thongke = pdo_query($sql);
//     return $thongke;
// }

function thongke_gio()
{
    $sql = "SELECT sum(thanh_tien) as tong,  DATE_FORMAT(thoi_gian, '%H:%i %p') AS gio_phut
    FROM `detail_bill` 
    WHERE DATE(thoi_gian) = CURRENT_DATE()
    GROUP BY DATE_FORMAT(thoi_gian, '%H:%i %p');";
    return pdo_query($sql);
}

function thongke_tuan()
{
    $sql = "SELECT SUM(thanh_tien) AS tong, DAYNAME(thoi_gian) AS thu
    FROM `detail_bill`
    WHERE  WEEK(thoi_gian) = WEEK(CURDATE())
  AND YEAR(thoi_gian) = YEAR(CURDATE())
    GROUP BY WEEK(thoi_gian), DAYNAME(thoi_gian)
    ORDER BY WEEK(thoi_gian), DAYOFWEEK(thoi_gian);";
    return pdo_query($sql);
}

function thongke_thang()
{
    $sql = "SELECT
    SUM(thanh_tien) AS tong,
    CONCAT('Tuần ', WEEK(thoi_gian) - WEEK(DATE_FORMAT(thoi_gian, '%Y-%m-01')) + 1) AS ngay,
    DATE_FORMAT(thoi_gian, '%m-%Y') AS thang
FROM `detail_bill`
WHERE YEAR(thoi_gian) = YEAR(CURDATE()) AND MONTH(thoi_gian) = MONTH(CURDATE())
GROUP BY WEEK(thoi_gian), DATE_FORMAT(thoi_gian, '%m-%Y')
ORDER BY DATE_FORMAT(thoi_gian, '%m-%Y'), WEEK(thoi_gian);";
    return pdo_query($sql);
}

function thongke_nam()
{
    $sql = "SELECT SUM(thanh_tien) AS tong, DATE_FORMAT(thoi_gian, '%m') AS thang
    FROM `detail_bill`
    WHERE YEAR(thoi_gian) = YEAR(CURDATE())
    GROUP BY DATE_FORMAT(thoi_gian, '%m')
    ORDER BY DATE_FORMAT(thoi_gian, '%m');
    ";
    return pdo_query($sql);
}

function dem_donhang_thang(){
    $sql = "SELECT COUNT(id) AS tong FROM `detail_bill` WHERE month(thoi_gian) = month(CURDATE());";
    return pdo_query_one($sql);
}

function top_sp_ban()
{
    $sql = "SELECT sanpham.id_sp as id, sanpham.ten_sp as name_sp , sanpham.hinh_sp as anh, SUM(bill.so_luong) AS tong
    FROM bill
    JOIN sanpham ON sanpham.id_sp = bill.id_sp
    GROUP BY sanpham.id_sp, sanpham.ten_sp
    ORDER BY tong DESC LIMIT 5;";
    $a = pdo_query($sql);
    return $a;
}
?>