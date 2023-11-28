<?php 
function loadAll_tk(){
    $sql ="SELECT * FROM taikhoan WHERE 1";
    return pdo_query($sql);
}

function khoa_tk($id){
    $sql ="UPDATE `taikhoan` SET `lock`='1' WHERE id_tk = $id;";
    return pdo_query($sql);
}
function bo_khoa_tk($id){
    $sql ="UPDATE `taikhoan` SET `lock`='0' WHERE id_tk = $id;";
    return pdo_query($sql);
}

function dangnhap($email, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '$email' and pass = '$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    
}
?>