<?php 
function loadAll_dm(){
    $sql ="SELECT * FROM danhmuc";
    return pdo_query($sql);
}
function load_one_dm($id){
    $sql ="SELECT * FROM danhmuc WHERE id_dm=".$id;
    return pdo_query_one($sql);
}

function add_dm($id){
    $sql = "INSERT INTO danhmuc(name_dm) VALUES ('$id')";
    pdo_execute($sql);
}

function upload_dm($id, $name)
{
  $sql = "UPDATE danhmuc SET name_dm='$name' WHERE id_dm='$id'";
  pdo_query($sql);
}

function xoadm($id)
{
  $sql = " DELETE FROM danhmuc  WHERE id_dm = $id";
  pdo_query($sql);
}
?>