<?php
include("../model/pdo.php");
include("../model/danhmuc.php");
include("include/header.php");

$dsdm = loadAll_dm();
$isthongbao = '';
$thongbao = '';
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'danhmuc':
            if (isset($_GET['nd'])) {
                if ($_GET['nd'] == 'listdm') {
                    include('danhmuc/list.php');
                }

                if ($_GET['nd'] == 'adddm') {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $tendm = $_POST["name"];
                        if ($tendm == null || $tendm == "") {
                            $isthongbao = 0;
                            $thongbao = 'Không thành công';
                        } else {
                            $isthongbao = 1;
                            add_dm($tendm);
                            $thongbao = ' Thêm thành công';
                        }
                    }
                    include('danhmuc/add.php');
                }

                if ($_GET['nd'] == 'editdm') {
                    $dm = load_one_dm($_GET['iddm']);
                    include('danhmuc/edit.php');
                }

                if ($_GET['nd'] == 'update') {
                    if (isset($_POST['gui']) && $_POST['gui'] != "") {
                        $name = $_POST['name'];
                        $id = $_POST['id'];
                        upload_dm($id, $name);
                        // echo "  <script>alert('Đã Cập Nhật Thành Công') </script> ";
                        echo "  <script>window.location.href ='index.php?act=danhmuc&nd=listdm'</script> ";
                    }
                    break;
                }

                if ($_GET['nd'] == 'deldm') {
                    xoadm($_GET['iddm']);
                    echo "  <script>window.location.href ='index.php?act=danhmuc&nd=listdm'</script> ";
                }
            }
            break;
            

    }
} else {
    include("include/home.php");
}

include("include/footer.php");

?>