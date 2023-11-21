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
?>